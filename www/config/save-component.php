<?php 

$componentName = $_POST['componentName'];
$content = $_POST['config'];
$handle = fopen('components/'.$componentName.'.json', 'w') or die('Cannot create '.$componentName.'.json, check permissions.');
fwrite($handle, $content);
fclose($handle);
header('Content-type: application/json');
echo json_encode(["status"=>"200"]);