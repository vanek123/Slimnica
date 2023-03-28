<?php

    session_start();
    require 'connection.php';

    if(isset($_POST['login'])) 
    {
        $epasts = $_POST['epasts'];
        $parole = $_POST['parole'];

        $SQL_stmt = "SELECT * FROM admin WHERE epasts = '".$epasts."' AND parole = '".$parole."' ";

        $result = $DBconnection->query($SQL_stmt);
        $row = $result->fetch();

        if (empty($epasts) || empty($parole)) {
            header("location: admin_login.php?activity=login_empty");
            exit();
        }
        elseif ($row) {
                $_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['epasts'] = $row['epasts'];
                $_SESSION['parole'] = $row['parole'];
    
            header('location: admin_panel.php?activity=successful');
            exit();
            }    
    
            else {
                header('location: admin_login.php?activity=incorrect_user_login_credentials');
                exit(); 
            }
            
        
    
        }
        else
        {
            header('location: admin_login.php?activity=username_or_password_not_set');
            exit();
        }
    

?>