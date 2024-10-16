<?php
$dsn ="mysql:host=localhost;dbname=crimsonplate";
$dbusername="root";
$dbpassword ="";
try{
    $pdo = new PDO($dsn,$dbusername,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (PODEXCEPTION $e){
    echo "connection failed:" .$e->getMessage();
}