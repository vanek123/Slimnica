<?php

    session_start();
    require 'connection.php';

    if(isset($_POST['submit'])) 
    {
        $epasts = $_POST['email'];
        $parole = $_POST['password'];

        $SQL_stmt = "SELECT * FROM arsti WHERE epasts = '".$epasts."' AND parole = '".$parole."' ";

        $result = $DBconnection->query($SQL_stmt);
        $row = $result->fetch();

        if (empty($epasts) || empty($parole)) {
            header("location: arsts_login_form.php?activity=login_empty");
            exit();
        }
        elseif ($row) {
                $_SESSION['arsts_id'] = $row['arsts_id'];
                $_SESSION['epasts'] = $row['epasts'];
    
            header('location: doctor_profile.php?activity=successful');
            exit();
            }    
    
            else {
                header('location: arsts_login_form.php?activity=incorrect_user_login_credentials');
                exit(); 
            }
    
        }
        else
        {
            header('location: arsts_login_form.php?activity=username_or_password_not_set');
            exit();
        }
    

?>