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
            $this->title = $this->parseTitle($file->getFilename());
            $component["class"] = $this->title;
            $component["title"] = ucfirst($this->title);            
            $this->file = $file->getFilename();
            $data = $this->parseFile($file->getFilename());
            $component = $component + $data;
            
            $components[] = $component;
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
    
    private function parseFile()
    {
        $this->returnData = array();
        $this->contents = file_get_contents($this->componentsPath . $this->file);
       
        preg_match("/data: {(.+)}/s", $this->contents, $this->matches);
        $data = "{" . $this->matches[1] . "}";
        $this->returnData["data"] = json_decode($data, true);
        
        preg_match("/\<\!-- component --\>(.+)\<\!-- \/component --\>/s", $this->contents, $this->matches);
        $this->returnData["markup"] = $this->matches[1];
        
        foreach($this->returnData["data"] as $componentElementVar=>$componentElementValue) {
            $$componentElementVar = $componentElementValue;
        }
        ob_start();
        eval(' ?>' . $this->returnData["markup"] . '<?php ');
        $this->returnData["evalMarkup"] = ob_get_clean();

        preg_match("/modifiers: (.+)/", $this->contents, $this->matches);
        $this->modifiers = json_decode($this->matches[1], true);
        
        foreach($this->modifiers as $modifier) {
            $modifier_classes = $this->title . "--" . $modifier;
            ob_start();
            eval(' ?>' . $this->returnData["markup"] . '<?php ');
            $this->returnData["modifiers"][] = array("modifier"=>$modifier, "evalMarkup"=>ob_get_clean());
        }
        return $this->returnData;
    }

}