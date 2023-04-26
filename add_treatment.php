<?php
include 'connection.php';
$id = $_GET['updateid'];
$sql="SELECT * FROM `med_ieraksti` WHERE pieraksts_id=$id LIMIT 1";
$result = $DBconnection->query($sql);
$row = $result->fetch();
$diagnosis = $row['diagnoze'];
$treatment_plan = $row['arstesanas_plans'];
$prescription = $row['receptes'];

if(isset($_POST['submit'])) {
    $name = $_POST['first_name'];
    $surname = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $specialty = $_POST['specialty'];

$sql = "UPDATE `arsti` SET arsts_id = '$id', vards = '$name', uzvards = '$surname', epasts = '$email', talrunis = '$phone_number', parole = '$password', specialitate = '$specialty' WHERE arsts_id=$id";
$result = $DBconnection->query($sql);

if($result) {
    header('location: admin_panel.php?activity=updated_successfully');
}
else {
    echo "Exception error: " . $ex->getMessage();// for testing purposes.
    die($ex->getMessage());
}

}
?>