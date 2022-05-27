<?php 
    session_start();
    session_unset();
    include 'db_functions.php';
    $username = validateData($_POST['username']);
    $password = md5(validateData($_POST['password']));

    $result = select("SELECT * from users WHERE username = '$username'");
    // var_dump($result[0]['password']);
    if ($result ) {
        if ($result[0]['password'] == $password){
            session_unset();
            $_SESSION['is_login'] = true;
            $_SESSION['user_id'] = $result[0]['id'];
            $_SESSION['name'] = $result[0]['name'];
            $_SESSION['username'] = $result[0]['username'];

            header("Location: ../../index.php");

        } else {
            $_SESSION['err_password'] = "Wrong password.";
            header("Location: ../view/login.php");
        }
    } else {
        $_SESSION['err_username'] = "There is no account with the username you entered.";
        header("Location: ../view/login.php");
    }

    function validateData($data)
    {   
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }
?>