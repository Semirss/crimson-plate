<?php
    include('connection2.php');
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "select * from users where username = '$username' and password_hash = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            header("Location: menu.html");
        }  
        else{  
            echo  '<script>
                        window.location.href = "sign in.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
    ?>