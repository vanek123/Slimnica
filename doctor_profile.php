<?php
    session_start();
    require 'connection.php';
    $arsts_id = $_SESSION['arsts_id'];
    $doc = $DBconnection->query("SELECT vards, uzvards FROM arsti WHERE arsts_id = '$arsts_id' ")->fetch();

    $appointment = $DBconnection->query("SELECT pac.pacients_id, pie.pieraksts_id, pie.pieraksta_datetime, pac.vards, pac.uzvards 
    FROM pieraksti AS pie
    INNER JOIN pacienti AS pac ON pac.pacients_id = pie.pacients_id
    INNER JOIN arsti AS a ON a.arsts_id = pie.arsts_id
    WHERE pie.arsts_id = '$arsts_id' ")->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
    <link rel="stylesheet" href="css/doctor_profile.css">
</head>
<body>
    <header>
        <h1>Dr. <?= $doc['vards'] . ' ' . $doc['uzvards']; ?></h1>
    </header>
    <nav>
        <ul>
            <li><a href="#doctor-profile">Profile</a></li>
            <li><a href="#appointments">Appointments</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <section id="appointments">
        <h3>Appointments</h3>
        <table>
            <tr>
                <th> Appointment ID </th>
                <th>Date and Time:</th>
                <th> Patient ID </th>
                <th>Patient:</th>
                <th>Treatment Plan</th>
            </tr>

        <?php 
        $med_rec = $DBconnection->query("SELECT diagnoze, arstesanas_plans, receptes FROM med_ieraksti WHERE arsts_id = '$arsts_id'")->fetch();
        ?>
              
        <?php if($appointment): ?>
            <?php  ?>
            <?php foreach($appointment as $app): ?>
            <tr>
                <td><?= $app['pieraksts_id']; ?></td>
                <td><?= $app['pieraksta_datetime']; ?></td>
                <td><?= $app['pacients_id']; ?></td>
                <td><?= $app['vards'] . ' ' . $app['uzvards']; ?></td>
                <?php if($med_rec): ?>
                    <td><?= $med_rec['diagnoze']; ?></td>
                    <td><?= $med_rec['arstesanas_plans']; ?></td>
                    <td><?= $med_rec['receptes']; ?></td>
                <?php else: ?>
                <td><button><a href="treatment.php?updateid=<?= $app['pieraksts_id']; ?>">ADD TREATMENT</a></button></td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        
           
            <!-- Additional rows for appointments go here -->
        </table>
    </section>
    <footer>
        <p>&copy; 2023. All rights reserved.</p>
    </footer>
</body>
</html>