<?php

require_once 'doctor_repository.php';

//APPOINTMENT
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $patientId = $_POST['patient-id'];
    $appointDateTime = $_POST['appoint-datetime'];
    $appointComment = $_POST['appoint-comment'];
    $doctorId = $_POST['doctor-id'];

    $available = "SELECT pieraksta_datetime, arsts_id FROM pieraksti
    WHERE pieraksta_datetime = '$appointDateTime' AND arsts_id = $doctorId "; 
    $sql = $DBconnection->query($available);
    $rezultats = $sql->fetch();

    if (empty($patientId) || empty($appointDateTime) || empty($doctorId)) {
        array_push($errors, "The fields are empty!");
        header("location: index.php?activity=empty");
        exit();
    } elseif ($rezultats) {
        if ($rezultats['pieraksta_datetime'] === $appointDateTime && $rezultats['arsts_id'] === $doctorId) {
            array_push($errors, "This time is taken!");
            header("location: index.php?activity=appointment_time_is_taken");
            exit();
        }
    } elseif (!empty($appointComment)) {
        if (!preg_match("/^([a-zA-Z0-9' ]+)$/", $appointComment))
        array_push($errors, "Comment can contain only letter ands digits!");
        header("location: index.php?activity=wrong_comment_format");
        exit();
    }

    //FInally, make appointment if there are no
    if (COUNT($errors) === 0) {
        makeAppointment($patientId, $appointDateTime, $appointComment, $doctorId);
        header('location: index.php?appointment=success');
        exit();
    } else {
        header('location: index.php?activity=appointment_canceled'); //cancel registration
        exit();
    }
}




