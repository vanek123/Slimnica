<?php

require_once 'doctor_repository.php';

//REGISTER USER
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $patientId = $_POST['patient-id'];
    $appointDateTime = $_POST['appoint-datetime'];
    $appointComment = $_POST['appoint-comment'];
    $doctorId = $_POST['doctor-id'];

    //form validation: ensure that the form is correctly filled...
    //by adding (array_push()) corresponding errors into $errors array
    if (empty($patientId)) { array_push($errors, "Name is required");}
    if (empty($appointDateTime)) { array_push($errors, "Surname is required");}
    if (empty($appointComment)) { array_push($errors, "Personal code is required");}
    if (empty($doctorId)) { array_push($errors, "Dob is required");}


    if (empty($patientId) || empty($appointDateTime) || empty($appointComment) || empty($doctorId)) {
        array_push($errors, "The fields are empty!");
        header("location: pacienti_forms.php?activity=empty");
        exit();
    } elseif (!preg_match("/^([a-zA-Z0-9' ]+)$/", $appointComment)) {
        array_push($errors, "Comment can contain only letter ands digits!");
        header("location: pacienti_forms.php?activity=wrong_comment_format");
        exit();
    }

    //FInally, register user if there are no earrors in the form
    if (COUNT($errors) === 0) {
        makeAppointment($patientId, $appointDateTime, $appointComment, $doctorId);
        header('location: index.php?appointment=success');
        exit();
    } else {
        header('location: index.php?activity=appointment_canceled'); //cancel registration
        exit();
    }
}




