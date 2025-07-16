<?php
// require '../env.php';
// loadenv(');
$host=$_ENV['HOST'];
$db=$_ENV['DB'];
$user=$_ENV['USERNAME'];
$pass=$_ENV['PASSWORD'];
$charset='utf8mb4';
$dsn="mysql:host=$host;dbname=$db";
try{
    $pdo=new PDO($dsn,$user,$pass,);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    die("connection failed");
}
?>