<?php 
    session_start();
    require 'connection.php';

    if(isset($_POST['save'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $specialty = $_POST['specialty'];
        
        $sql = "INSERT INTO arsti (vards, uzvards, epasts, parole, talrunis, specialitate) VALUES ('$first_name', '$last_name', '$email', '$password', '$phone_number', '$specialty')";

        $result = $DBconnection->query($sql);

        if($result) {
            header("location: admin_panel.php?msg=New record created succesfuly");
        }
        else {
            echo "Failed: ". $ex->getMessage();
        }
    }
?>