<?php 
    session_start();
    require 'connection.php';

    if(isset($_POST['submit'])) {
        $name = $_POST['first_name'];
        $surname = $_POST['last_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $specialty = $_POST['specialty'];
        $errors = array();
        
        $doctor_check_query = "SELECT * FROM arsti WHERE epasts='$email' OR talrunis='$phone_number' LIMIT 1";
        $result = $DBconnection->query($doctor_check_query);
        $doctor = $result->fetch();

        //$sql = "INSERT INTO `arsti` (`vards`, `uzvards`, `epasts`, `parole`, `talrunis`, `specialitate`) VALUES ('$first_name', '$last_name', '$email', '$password', '$phone_number', '$specialty')";
        //$result = $DBconnection->query($sql);

        if (empty($name) || empty($surname) || empty($email) || empty($phone_number) || empty($password) || empty($specialty)) {
            array_push($errors, "Some of the fields are empty!");
            header("location: add_doctor_form.php?activity=empty");
            exit();
        } elseif ($doctor) {
            if ($doctor['epasts'] === $email || $doctor['talrunis'] === $phone_number) {
                array_push($errors, "Email or phone number taken!");
                header("location: add_doctor_form.php?activity=email_or_phone_number_taken");
                exit();
                }
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Wrong email format!");
        header("location: add_doctor_form.php?activity=email_format_is_wrong");
        exit();
        }
        //Finally add if no errors
        if(COUNT($errors) === 0) {
            $passwordHash = md5($password);

            $query = "INSERT INTO `arsti` (`vards`, `uzvards`, `epasts`, `parole`, `talrunis`, `specialitate`) 
                VALUES ('$name', '$surname', '$email', '$password', '$phone_number', '$specialty')";
            $DBconnection->query($query);
            $_SESSION['email'] = $email;
            header("location: admin_panel.php?activity=new_record_created_succesfuly");
            exit();
        }
    }
    else {
        header("location: admin_panel.php?activity=canceled");
        exit();
    }

?>