<?php
namespace Src\Parsers;

class Colors
{
    private $sassPath;
    private $colorsFile;
    
    public function __construct($sassPath, $colorsFile)
    {
        $this->sassPath = $sassPath;
        $this->colorsFile = $colorsFile;
    }
    
    public function get()
    {
      $file = fopen($this->sassPath . $this->colorsFile, "r");
      if(!$file) {
          return false;
      }
      $colors = array();
      while(!feof($file)) {
        $line = fgets($file);
        if($line) {
          $vars = array_map('trim', explode(":", $line));
          $colors[] = array("sass"=>$vars[0], "hex"=>$vars[1], "name"=>str_replace("-", " ", str_replace("$", "", $vars[0])));
        }
      }
      fclose($file);
      return $colors;          
    }
}