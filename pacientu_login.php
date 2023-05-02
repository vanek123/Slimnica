<?php
    session_start(); //Start the session.
    require_once 'connection.php'; //Require connection file to connect to database.
    
    if(isset($_POST['login']))  //if email and password are set.
    {
       $userPassword = $_POST['password'];//Get password and username
       $email = $_POST['email'];
        
       $hashedPassword = md5($userPassword);//Getting the hash to compare
        
       $SQL_stmt = "SELECT pacients_id, vards, uzvards, talrunis, dzimums, dzimdiena, personas_kods, epasts, parole FROM pacienti WHERE epasts = '".$email."' AND parole = '".$hashedPassword."'";
        
       //$result = 0;
        
       $result = $DBconnection->query($SQL_stmt);
       $row = $result->fetch();

       if (empty($email) || empty($userPassword)) {
        header("location: pacienti_forms.php?activity=login_empty");
        exit();
        }
    elseif ($row) {
            $_SESSION['pacients_id'] = $row['pacients_id'];
            $_SESSION['vards'] = $row['vards'];
            $_SESSION['uzvards'] = $row['uzvards'];
            $_SESSION['talrunis'] = $row['talrunis'];
            $_SESSION['dzimums'] = $row['dzimums'];
            $_SESSION['dzimdiena'] = $row['dzimdiena'];
            $_SESSION['personas_kods'] = $row['personas_kods']; 
            $_SESSION['epasts'] = $row['epasts'];

        header('location: index.php?activity=login_success');
        exit();
        }    

        else {
            header('location: pacienti_forms.php?activity=incorrect_user_login_credentials');
            exit(); 
        }

    }
    else
    {
        header('location: index.php?activity=username_or_password_not_set');
        exit();
    }
?>