<?php
try{
    $hostname='localhost';
    $username='root';
    $password='';
    $dbName='burger_code';
    $connStr="mysql:host=".$hostname.";dbname=".$dbName;
    $arrayExtraParam=array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
    $pdo=new PDO($connStr,  $username, $password, $arrayExtraParam);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->query("SET NAMES 'utf8'");
    $GLOBALS['connexion']=$pdo;
}catch(PDOException $e){
    $msg='ERREUR PDO dans'.$e.'L.'.$e->getLine().':'.$e->getMessage();
    die($msg);
}
?>