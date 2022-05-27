<?php 
    session_start();
    include 'db_functions.php';

    $name = validateData($_POST['name']);
    $username = usernameCheck(validateData($_POST['username']));
    $password = md5(validateData($_POST['password']));
    $confirm_password = md5(validateData($_POST['confirm_password']));

    if ($password !== $confirm_password){
        $_SESSION['err_password'] = true;
        // header("Location: ../view/register.php");
    } else {
        unset($_SESSION['err_password']);
    }

    if(insert()){
        $_SESSION['message'] = "Your account has been created!";
        header("Location: ../view/login.php");
    } else {
        $_SESSION['error'] = "Registration Failed!";
        header("Location: ../view/register.php"); 
    }
    
    function validateData($data)
    {   
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }

    function usernameCheck($username)
    {
        $query = "SELECT username FROM users WHERE username = $username";
        $result = select($query);
        if ($result){
            $error = "Username has been taken.";
            $_SESSION['err_username'] = $error;
            header("Location: ../view/register.php");
        }
        return $username;
    }

    function insert()
    {
        global $mysqli, $name, $username, $password;
        $query = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";
        $result = $mysqli->query($query);
        if ($result){
            return 1;
        } else {
            $error = "Username has been taken.";
            $_SESSION['err_username'] = $error;
            return 0;
        }
    }
?>