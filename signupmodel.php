<?php

declare(strict_types=1);
function get_username(object $pdo,string $username)
{
    $query ="select username from users where username =:username;";
    $stmt =$pdo->prepare($query);
    $stmt->bindParam(":username",$username);
    $stmt->execute();
    $result =$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_email(object $pdo,string $email)
{
    $query ="select username from users where email =:email;";
    $stmt =$pdo->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    $result =$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}