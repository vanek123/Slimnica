<?php

require_once 'connection.php';

function getAllDoctors() {
    global $DBconnection;
    $result = $DBconnection->query("SELECT * FROM arsti");

    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function makeAppointment($patientId, $appointDateTime, $appointComment, $doctorId) {
    global $DBconnection;
    $query = "INSERT INTO `pieraksti` (`pieraksta_datetime`, `piezimes`, `pacients_id`, `arsts_id`) 
                VALUES ('$appointDateTime', '$appointComment', '$patientId', '$doctorId')";
    $result = $DBconnection->query($query);
    if ($result !== false) {
        return $result;
    }
}