<?php
namespace Src\Parsers;

class Components
{
    private $componentsPath;
    private $sassPath;
    private $file;
    
    public function __construct($componentsPath, $sassPath)
    {
        $this->componentsPath = $componentsPath;
        $this->sassPath = $sassPath;        
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
        
    private function parseTitle($fileName)
    {
        return str_replace("_", " ", str_replace("-", " ", str_replace(".php", "", $fileName)));            
    }
    
    private function parseFile($file)
    {
        $returnData = array();
        
        // NAME AND CONTENT
        $title = $this->parseTitle($file->getFilename());
        $returnData["class"] = $title;
        $returnData["title"] = ucfirst($title);
        $filename = $file->getFilename();
        
        $contents = file_get_contents($this->componentsPath . $filename);
        
        // COMMENT SECTION
        $tokens = token_get_all($contents);
        $comments = array();
        foreach($tokens as $token) {
            if($token[0] == T_COMMENT || $token[0] == T_DOC_COMMENT) {
                $returnData["comments"] = $token[1];
                break;
            }
        }
        
        // GET THE SAMPLE DATA       
        preg_match("/data: {(.+)}/s", $returnData["comments"], $matches);
        $data = "{" . $matches[1] . "}";
        $returnData["data"] = json_decode($data, true);
        
        // COMPONENT CODE        
        preg_match("/\<\!-- component --\>(.+)\<\!-- \/component --\>/s", $contents, $matches);
        $returnData["markup"] = $matches[1];
        $returnData["evalMarkup"] = $this->evalMarkup($returnData["data"], $returnData["markup"]);
        $returnData["c5Include"] = $this->getC5Include($filename);
        
        // MODIFIERS        
        $modifiers = $this->parseSass($title);        
        foreach($modifiers as $modifier) {            
            $modifierClasses = $title . "--" . $modifier;            
            $c5Include = $this->getC5Include($filename, $modifier);
            $evalMarkup = $this->evalMarkup($returnData["data"], $returnData["markup"], $modifierClasses);            
            $returnData["modifiers"][] = array("modifier"=>$modifier, "evalMarkup"=>$evalMarkup, "c5Include"=>$c5Include);
        }
        return $returnData;
    }
    
    private function parseSass($file)
    {
        $modifiers = array();
        $sass = file_get_contents($this->sassPath . $file . ".sass");
        preg_match_all("/\&--(.+)/", $sass, $matches);
        foreach($matches[1] as $match) {
            $modifier = trim(str_replace("&", "", $match));
            $modifiers[$modifier] = $modifier;
        }
        return $modifiers;
    }
    
    private function evalMarkup($data, $markup, $modifier_classes="")
    {
        foreach($data as $componentElementVar=>$componentElementValue) {
            $$componentElementVar = $componentElementValue;
        }
        ob_start();
        eval(' ?>' . $markup . '<?php ');
        return ob_get_clean();
    }
    
    private function getC5Include($filename, $modifier=false)
    {
        return '<?php $this->inc("' . $this->componentsPath . $filename . '"' . ($modifier ? ', array("modifiers"=>array("' . $modifier . '"))' :'') . '); ?>';
    }

}