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
            header("location: arsts_login.php?activity=login_empty");
            exit();
        }
        elseif ($row) {
                $_SESSION['arsts_id'] = $row['arsts_id'];
                $_SESSION['epasts'] = $row['epasts'];
                $_SESSION['parole'] = $row['parole'];
    
            header('location: doctor_logged.html?activity=successful');
            exit();
            }    
    
            else {
                header('location: arsts_login.php?activity=incorrect_user_login_credentials');
                exit(); 
            }
            
        
    
        }
        else
        {
            header('location: arsts_login.php?activity=username_or_password_not_set');
            exit();
        }
    

?>