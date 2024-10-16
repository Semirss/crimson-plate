<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username =$_POST["username"];
    $email =$_POST["email"];
    $password = $_POST["password"];
    try{
        require_once'connection.php';
        require_once'signupmodel.php';
        require_once'signupmod.php';
//error handlers
$error=[];
        if(is_input_empty($username,$email,$password)){
            $errors["empty_input"]="fill in all fields !";
        }
        if(is_email_invalid($email)){
            $errors["invalid_email"]="Invalid Email!";
        }  
        if( is_username_taken($pdo,$username)){
            $errors["username_taken"]="username already taken!";
        }
        if( is_email_registered($pdo,$email)){
            $errors["email_used"]="email already registered!";
        }
        require_once'session.php';
        if($errors){
            $_SESSION["errors_signup"]=$errors;
            header("Location: sign up.php");
            die();
        }
        $query ="insert into users(username,email,pass) VALUES (:username,:email,:password);";
        $stmt =$pdo->prepare($query);
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":password",$password);
        $stmt->execute();
        $pdo =null;
        $stmt =null;
        header("location: sign in.php");
        die();

    }
    catch(PODEXCEPTION $e){
        die("Query failed:".$e->getMessage("failed"));

    }

}
else {
    header("Location: index.php");
    die();
}