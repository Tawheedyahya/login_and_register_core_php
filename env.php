<?php
function loadenv($path){
    try{
    if(!file_exists($path)){
        throw new Exception('env file not found');
    }
    $files=file($path,FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
    // print_r($files);
    foreach($files as $line){
        if(strpos(trim($line),'#')===0)continue;
        list($name,$value)=explode('=',$line);
        $name=trim($name);
        $value=trim($value);
        // echo $value."<br>";

        $_ENV[$name]=$value;

    }
}
    catch(Exception $e){
        echo $e->getMessage();
        return;
    }}


?>
