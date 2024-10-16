<?php

declare(strict_types=1);

function  check_signup_errors(){
    if(isset($_SESSION['errors_signup'])){
        $errors =$_SESSION['errors_signup'];
        echo "<br>";
        foreach ($errors as $error){
            echo '<p class="form-error">' .$error .'</P>';
        }
        unset($_SESSION['errors_signup']);
    }
    elseif(isset($_Get["sign up"])&& $_Get["sign up"]==="success"){
        echo '<br>';
        echo '<p class="form-error">signup success</P>';
    }
    
}