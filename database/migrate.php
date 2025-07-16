<?php
require './database.php';
$migrationdir=__DIR__.'/migrations';
$migarationfiles=glob($migrationdir.'/*.php');
// var_dump($migarationfiles);
foreach($migarationfiles as $file){
    echo "Running migration".basename($file);
    require_once $file;
    if(function_exists('up')){
        try{
            up($pdo);
            echo 'migration completed';
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }else{
        echo 'no up function';
    }

}
?>