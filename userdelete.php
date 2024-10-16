<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username =$_POST["username"];
    
    $password = $_POST["password"];
    try{
        require_once"connection.php";
        $query ="delete from users where username =:username and pass=:password;";
        $stmt =$pdo->prepare($query);

        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":password",$password);
        $stmt->execute();
        $pdo =null;
        $stmt =null;
        header("location: sign in.php");
        die();

    }
    catch(PODEXCEPTION $e){
        die("Query failed:".$e->getMessage());

    }

}
else {
    header("Location: index.php");
}