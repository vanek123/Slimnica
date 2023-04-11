<?php 
    session_start();
    require_once 'connection.php';
    
    
// initializing variables
$name = "";
$surname = "";
$person_kods = "";
$dob = "";
$gender = "";
$email = "";
$phone_num = "";
$errors = array();

//REGISTER USER
if (isset($_POST['register'])) {
    //receive all input values from the form
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $personas_kods = $_POST['personas_kods'];
    $dob = $_POST['dob'];
    $dobYear = date('Y', strtotime($dob));
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone_num = $_POST['phone_num'];
    $password = $_POST['password'];
    $confirm_pass = $_POST['confirm_pass'];

 

    //form validation: ensure that the form is correctly filled...
    //by adding (array_push()) corresponding errors into $errors array
    if (empty($name)) { array_push($errors, "Name is required");}
    if (empty($surname)) { array_push($errors, "Surname is required");}
    if (empty($personas_kods)) { array_push($errors, "Personal code is required");}
    if (empty($dob)) { array_push($errors, "Dob is required");}
    if (empty($gender)) { array_push($errors, "Gender is required");}
    if (empty($email)) { array_push($errors, "Email is required");}
    if (empty($phone_num)) { array_push($errors, "Phone number is required");}
    if (empty($password)) { array_push($errors, "Password is required");}
    if (empty($confirm_pass)) { array_push($errors, "Password confirm is required");}

    
    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $patient_check_query = "SELECT * FROM pacienti WHERE personas_kods='$personas_kods' OR epasts='$email' OR talrunis='$phone_num' LIMIT 1";
    //$result = mysqli_query($DBconnection, $user_check_query);
    $result = $DBconnection->query($patient_check_query);
    $patient = $result->fetch();

    if (empty($name) || empty($surname) || empty($personas_kods) || empty($dob) || empty($gender) || empty($email) || empty($phone_num) || empty($password) || empty($confirm_pass)) {
        array_push($errors, "The fields are empty!");
        header("location: pacienti_forms.php?activity=empty");
        exit();
    } elseif ($patient) {
        if ($patient['personas_kods'] === $personas_kods || $patient['epasts'] === $email || $patient['talrunis'] === $phone_num) {
            array_push($errors, "Personal code, email or phone number taken!");
            header("location: pacienti_forms.php?activity=pers_code_or_email_or_phone_number_taken");
            exit();
            }
    } elseif (preg_match('/^[0-9]{9}+$/', $phone_num)) {
        array_push($errors, "Wrong phone number format!");
        header("location: pacienti_forms.php?activity=wrong_phone_number_format");
        exit();
    } elseif (preg_match('/^[0-9]{12}+$/', $personas_kods)) {
        array_push($errors, "Wrong personal code format!");
        header("location: pacienti_forms.php?activity=personal_code_wrong_format");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Wrong email format!");
        header("location: pacienti_forms.php?activity=email_format_is_wrong");
        exit();
    } elseif ($_POST['password'] != $_POST['confirm_pass']) {
        array_push($errors, "Passwords do not match!");
        header("location: pacienti_forms.php?activity=passwords_do_not_match");
        exit();
        // check is user input date correct
    } elseif (strtotime($dob) === false) {
        array_push($errors, "Invalid date!");
        header("location: pacienti_forms.php?activity=invalid_dob");
        exit();
    } elseif ($dobYear < 1900 || $dobYear > 2200) {
        array_push($errors, "Too old or too young!");
        header("location: pacienti_forms.php?activity=wrong_dob");
        exit();
    } elseif (time() < strtotime('+18 years', strtotime($dob))) {
        array_push($errors, "Not 18+ years!");
        header("location: pacienti_forms.php?activity=age");
        exit();
    }

   




    //FInally, register user if there are no earrors in the form
        if (COUNT($errors) === 0) {
            $passwordMD5 = md5($password); //encrypt the password beofre saving in the database

            $query = "INSERT INTO pacienti (vards, uzvards, epasts, parole, talrunis, dzimums, dzimdiena, personas_kods)
                  VALUES('$name', '$surname', '$email', '$passwordMD5', '$phone_num', '$gender', '$dob', '$personas_kods')";
            $DBconnection->query($query);
            $_SESSION['email'] = $email;
            header('location: index.php?activity=success');
            exit();
        
        }
    
}

    
    
else 
{
    header('location: index.php?activity=registration_canceled'); //cancel registration
    exit();
}



?>