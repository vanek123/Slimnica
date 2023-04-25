<?php
    session_start();
    require 'connection.php';
    $arsts_id = $_SESSION['arsts_id'];
    $doc = $DBconnection->query("SELECT vards, uzvards FROM arsti WHERE arsts_id = '$arsts_id' ") -> fetch();

    $appointment = $DBconnection->query("SELECT pieraksti.pieraksta_datetime, pacienti.vards, pacienti.uzvards FROM pieraksti
    INNER JOIN pacienti ON pieraksti.pacients_id = pacienti.pacients_id
    INNER JOIN arsti ON pieraksti.arsts_id = arsti.arsts_id 
    WHERE pieraksti.arsts_id = '$arsts_id' ") -> fetchAll(PDO::FETCH_ASSOC);

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
                <th>Date and Time:</th>
                <th>Patient:</th>
                <th>Reason for Visit</th>
                <th>Treatment Plan</th>
            </tr>
        <?php if($appointment): ?>
            <?php foreach($appointment as $app): ?>
            <tr>
                <td><?= $app['pieraksta_datetime']; ?></td>
                <td><?= $app['vards'] . ' ' . $app['uzvards']; ?></td>
                <td>
                    <textarea></textarea>
                </td>
                <td>
                    <textarea></textarea>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
            <tr>
                <td>April 26, 2023</td>
                <td>Jane Doe</td>
                <td>Shortness of breath</td>
                <td>
                    <textarea></textarea>
                </td>
            </tr>
            <!-- Additional rows for appointments go here -->
        </table>
    </section>
    <footer>
        <p>&copy; 2023. All rights reserved.</p>
    </footer>
</body>
</html>