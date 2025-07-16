<?php

function up($pdo){
    $sql="CREATE TABLE if not exists users(
    id int auto_increment primary key,
    name varlchar(20),
    email varchar(100),
    password varchar(255)
    )";
    $pdo->exec($sql);
}

?>