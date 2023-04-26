<?php

require_once 'doctor_repository.php';

//REGISTER USER
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $patientId = $_POST['patient-id'];
    $appointDateTime = $_POST['appoint-datetime'];
    $appointComment = $_POST['appoint-comment'];
    $doctorId = $_POST['doctor-id'];

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




