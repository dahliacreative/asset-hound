<?php
namespace Src\Parsers;

class Components
{
    private $componentsPath;
    private $returnData;
    private $data;
    private $matches;
    private $modifiers;
    private $file;
    private $title;
    
    public function __construct($componentsPath)
    {
        $this->componentsPath = $componentsPath;
    }
    
    public function get()
    {
        $fileSystemIterator = new \FileSystemIterator($this->componentsPath);
        $components = array();
        foreach($fileSystemIterator as $file) {
            $components[] = $this->parseFile($file);
        }
        return $components;             
    }
    
    public function getModifiers()
    {
        return $this->$modifiers;
    }
    
    private function parseTitle($fileName)
    {
        return str_replace("_", " ", str_replace("-", " ", str_replace(".php", "", $fileName)));            
    }
    
    private function parseFile($file)
    {
        $this->returnData = array();
        
        $this->title = $this->parseTitle($file->getFilename());
        $this->returnData["class"] = $this->title;
        $this->returnData["title"] = ucfirst($this->title);
        $this->file = $file->getFilename();
        
        $this->contents = file_get_contents($this->componentsPath . $this->file);
       
        preg_match("/data: {(.+)}/s", $this->contents, $this->matches);
        $data = "{" . $this->matches[1] . "}";
        $this->returnData["data"] = json_decode($data, true);
        
        preg_match("/\<\!-- component --\>(.+)\<\!-- \/component --\>/s", $this->contents, $this->matches);
        $this->returnData["markup"] = $this->matches[1];
        
        foreach($this->returnData["data"] as $componentElementVar=>$componentElementValue) {
            $$componentElementVar = $componentElementValue;
        }
        $modifier_classes = '';
        
        ob_start();
        eval(' ?>' . $this->returnData["markup"] . '<?php ');
        $evalMarkup = ob_get_clean();
        $this->returnData["evalMarkup"] = $evalMarkup;
        
        $this->returnData["c5Include"] = '<?php $this->inc("' . $this->componentsPath . $this->file . '"); ?>';

        preg_match("/modifiers: (.+)/", $this->contents, $this->matches);
        $this->modifiers = json_decode($this->matches[1], true);
        
        foreach($this->modifiers as $modifier) {
            
            $modifier_classes = $this->title . "--" . $modifier;            
            $c5Include = '<?php $this->inc("' . $this->componentsPath . $this->file . '", array("modifier_classes"=>"' . $modifier . '")); ?>';
            
            ob_start();
            eval(' ?>' . $this->returnData["markup"] . '<?php ');
            $evalMarkup = ob_get_clean();
            
            $this->returnData["modifiers"][] = array("modifier"=>$modifier, "evalMarkup"=>$evalMarkup, "c5Include"=>$c5Include);
        }
        return $this->returnData;
    }

}