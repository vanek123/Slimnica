<?php
    session_start(); //Start the session.
    require_once 'connection.php'; //Require connection file to connect to database.
    
    if(isset($_POST['login']))  //if email and password are set.
    {
       $userPassword = $_POST['password'];//Get password and username
       $email = $_POST['email'];
        
       $hashedPassword = md5($userPassword);//Getting the hash to compare
        
       $SQL_stmt = "SELECT pacients_id, epasts, parole FROM pacienti WHERE epasts = '".$email."' AND parole = '".$hashedPassword."'";
        
       //$result = 0;
        
       $result = $DBconnection->query($SQL_stmt);
       $row = $result->fetch();

       if (empty($email) || empty($userPassword)) {
        header("location: pacienti_login.php?activity=login_empty");
        exit();
        }
    elseif ($row) {
            $_SESSION['pacients_id'] = $row['pacients_id'];
            $_SESSION['email'] = $row['email'];

        header('location: index.php?activity=login_successful');
        exit();
        }    

        else {
            header('location: pacienti_login.php?activity=incorrect_user_login_credentials');
            exit(); 
        }

    }
    else
    {
        header('location: pacienti_login.php?activity=username_or_password_not_set');
        exit();
    }
?>