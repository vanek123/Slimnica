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

  $med = $DBconnection->query("SELECT mi.diagnoze, mi.arstesanas_plans, mi.receptes, p.pieraksta_datetime, a.vards, a.uzvards, a.specialitate
  FROM med_ieraksti AS mi
  INNER JOIN pieraksti AS p ON mi.pieraksts_id = p.pieraksts_id
  INNER JOIN pacienti AS pac ON mi.pacients_id = pac.pacients_id
  INNER JOIN arsti AS a ON mi.arsts_id = a.arsts_id
  WHERE mi.pacients_id = '$patient'")->fetchAll(PDO::FETCH_ASSOC);
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
      <?php if($med): ?>
        <?php foreach($med as $record): ?>
      <p>Doctor: <?= $record['vards'];?> <?= $record['uzvards'];?></p>
      <p>Specialty: <?= $record['specialitate'];?></p>
      <p>Appointment date and time: <?= $record['pieraksta_datetime']; ?> </p>    
      <p>Diagnosis: <?= $record['diagnoze']; ?></p>
      <p>Treatment plan: <?= $record['arstesanas_plans']; ?> </p>
      <p>Prescriptions: <?= $record['receptes']; ?> </p>
      <br>
        <?php endforeach;?>
      <?php endif; ?>
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