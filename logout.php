<?php
    session_start();
    
    if (isset($_SESSION['pacients_id'])) {
        
        session_unset();
        session_destroy();
        header('Location: index.php?activity=logout_successful');  
    }
    if (isset($_SESSION['arsts_id'])) {
        
        session_unset();
        session_destroy();
        header('Location: arsts_login_form.php?activity=logout_successful');
    }
    if (isset($_SESSION['admin_id'])) {
        session_unset();
        session_destroy();
        header('Location: admin_login.php?activity=logout_successful');
    }
    
?>