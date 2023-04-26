<?php
session_start();
require 'connection.php';

$patient = $_SESSION['pacients_id'];

if (isset($patient)) {
  
  $patient_check_query = "SELECT * FROM pacienti WHERE pacients_id = '$patient'";
  $patient_query = $DBconnection->query($patient_check_query);
  $patient_info = $patient_query->fetch();

  $appoint_check_query = "SELECT arsti.vards, arsti.uzvards, pieraksti.pieraksta_datetime, arsti.specialitate 
  FROM pieraksti 
  INNER JOIN arsti ON pieraksti.arsts_id = arsti.arsts_id
  WHERE pieraksti.pacients_id = '$patient' ";
  $appoint_query = $DBconnection->query($appoint_check_query);
  $appointment_info = $appoint_query->fetchAll(PDO::FETCH_ASSOC); 

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/patient_profile.css">
</head>
<body>
    <header>
      <h1>Patient Profile</h1>
    </header>
    <nav>
      <ul>
        <li><a href="index.php?activity=home">Back</a></li>
        <li><a href="#personal-info">Personal Information</a></li>
        <li><a href="#medical-records">Medical Records</a></li>
        <li><a href="#appointments">Appointments</a></li>
        <li><a href="logout.php">Log out</a></li>
      </ul>
    </nav>
    <section id="personal-info">
      <h2>Personal Information</h2>
      <p>First Name: <?= $patient_info['vards']?></p>
      <p>Last Name: <?= $patient_info['uzvards']; ?></p>
      <p>Gender: <?= $patient_info['dzimums']; ?> </p>
      <p>Personal code: <?= $patient_info['personas_kods']; ?> </p>
      <p>Date of Birth: <?= $patient_info['dzimdiena']; ?></p>
      <p>Contact Number: <?= $patient_info['talrunis']; ?></p>
      <p>Email: <?= $patient_info['epasts']; ?></p>
    </section>
    <section id="medical-records">
      <h2>Medical Records</h2>
      <p>Allergies: None</p>
      <p>Medical Conditions: Hypertension</p>
      <p>Medications: Lisinopril</p>
    </section>
    <section id="appointments">
      <h2>Appointments</h2>
      <ul>
        
      <?php if($appointment_info): ?>
          <?php foreach($appointment_info as $appoint_info): ?>
        <li>
          <p>Doctor: <?= $appoint_info['vards'] . ' ' . $appoint_info['uzvards']; ?> </p>
          <p>Date and Time: <?= $appoint_info['pieraksta_datetime']; ?> </p>
          <p>Specialty: <?= $appoint_info['specialitate']; ?> </p>
        </li>
        <?php endforeach; ?>
      <?php endif;?>
      </ul>
    </section>
  </body>
</html>