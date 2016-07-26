<?php
namespace Src\Parsers;

class Typography
{
    private $typographyFile;
    private $sassPath;
    
    public function __construct($typographyFile, $sassPath)
    {
        $this->typographyFile = $typographyFile;
        $this->sassPath = $sassPath;
    }
    
    public function get()
    {
        $typograghyList = array();
        $contents = file_get_contents($this->sassPath . $this->typographyFile);
        preg_match_all("/\.(.+)/", $contents, $matches);
        
        $modifiers = preg_split("/\.(.+)/", $contents);

        foreach($matches[0] as $key=>$item) {           
            $matchString = "/\&--(.+)/";
            preg_match_all($matchString, $modifiers[$key+1], $modifiersMatches);
            $modifiersList = array();
            foreach($modifiersMatches[1] as $modifier) {
                $modifiersList[] = trim($modifier);
            }
            $typograghyList[] = array("class"=>str_replace("\n", "", trim($item)), "name"=>str_replace("\n", "", trim($matches[1][$key])), "modifiers"=>$modifiersList);
        }
        return $typograghyList;
    }
}