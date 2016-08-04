<?php
namespace Src\Parsers;

class Components
{
    private $componentsPath;
    private $sassPath;
    private $file;
    private $excludeVars = ['modifier_classes'];
    
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
        preg_match("/assetHoundData: {(.+)}/s", $returnData["comments"], $matches);
        $data = "{" . $matches[1] . "}";
        $returnData["data"] = json_decode($data, true);

        // GET COLUMNS
        preg_match("/assetHoundColumns: ([0-9])/", $contents, $results);
        $returnData["columns"] = $results[1] === null ? 1 : intval($results[1]);
        
        // COMPONENT CODE        
        preg_match("/\<\!-- component --\>(.+)\<\!-- \/component --\>/s", $contents, $matches);
        $returnData["markup"] = $matches[1];
        $returnData["evalMarkup"] = $this->evalMarkup($returnData["data"], $contents);
        $returnData["c5Include"] = $this->getC5Include($filename);

        // GET ALL THE VARS
        $pattern = '/\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)/';
        preg_match_all($pattern, $returnData["markup"], $matches);
        foreach($matches[1] as $key=>$var) {
        	if(!in_array($var, $this->excludeVars)) {
        		$varsList[$var] = $matches[0][$key];
        	}
        }
        $returnData["vars"] = $varsList;
        
        // MODIFIERS        
        $modifiers = $this->parseSass($title);        
        foreach($modifiers as $modifier) {            
            $modifiers = $modifier;            
            $c5Include = $this->getC5Include($filename, $modifier);
            $evalMarkup = $this->evalMarkup($returnData["data"], $contents, $modifiers);          
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
    
    private function evalMarkup($data, $markup, $modifierName="")
    {
        foreach($data as $componentElementVar=>$componentElementValue) {
            $$componentElementVar = $componentElementValue;
        }
        if(isset($data["modifiers"][$modifierName])) {
            foreach($data["modifiers"][$modifierName] as $componentElementVar=>$componentElementValue) {
                $$componentElementVar = $componentElementValue;
            }
        }
        $modifiers = array($modifierName);
        ob_start();
        eval(' ?>' . $markup . '<?php ');
        return ob_get_clean();
    }
    
    private function getC5Include($filename, $modifier=false)
    {
        return '<?php $this->inc("' . $this->componentsPath . $filename . '"' . ($modifier ? ', array("modifiers"=>array("' . $modifier . '"))' :'') . '); ?>';
    }

}