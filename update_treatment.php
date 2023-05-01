<?php
    include 'connection.php';
    $id = $_GET['updateid'];

    $query = $DBconnection->query("SELECT p.arsts_id, p.pacients_id, p.pieraksts_id, p.pieraksta_datetime, pac.vards, pac.uzvards, 
    mi.diagnoze, mi.arstesanas_plans, mi.receptes
    FROM med_ieraksti AS mi
    INNER JOIN pacienti AS pac ON mi.pacients_id = pac.pacients_id
    INNER JOIN arsti as a ON mi.arsts_id = a.arsts_id
    INNER JOIN pieraksti AS p ON mi.pieraksts_id = p.pieraksts_id
    WHERE p.pieraksts_id = '$id' LIMIT 1")->fetch();

    $patient_id = $query['pacients_id'];
    $doctor_id = $query['arsts_id'];

    $app_datetime = $query['pieraksta_datetime'];
    $name = $query['vards'];
    $surname = $query['uzvards'];
    $diagnosis = $query['diagnoze'];
    $tr_plan = $query['arstesanas_plans'];
    $prescr = $query['receptes'];

    if(isset($_POST['submit'])) {
    
        $diagnosis = $_POST['diagnosis'];
        $treatment_plan = $_POST['treatment_plan'];
        $prescription = $_POST['prescription'];
    
        $sql = "UPDATE `med_ieraksti` SET ieraksts_id = '$id', diagnoze = '$diagnosis', arstesanas_plans = '$tr_plan', receptes = '$prescr', pacients_id = '$patient_id', arsts_id = '$doctor_id', pieraksts_id = '$id' WHERE pieraksts_id=$id";
        $result = $DBconnection->query($sql);
    
        if($result) {
            header('location: doctor_profile.php?activity=updated_successfully');
        }
        else {
            echo "Exception error: " . $ex->getMessage();// for testing purposes.
            die($ex->getMessage());
        }
    }
    elseif(isset($_POST['cancel'])) {
        header('location: doctor_profile.php?activity=canceled');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <title>Add doctor form</title>
    <link rel="stylesheet" href="css/add_doctor_form.css">
</head>
<body>

    <div class="container">

        <div class="text-center mb-4 my-4">
            <h3>Add New Treatment</h3>
            <p class="text-muted">Complete the form below to update a treatment for patient </p>
        </div>
    

    <div class="container d-flex justify-content-center">
    
        <form action="" method="POST" style="width: 20vw; min-width: 300px;">

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Date and Time:</label>
                    <input type="text" class="form-control" name="email" readonly placeholder="" value=<?= $app_datetime; ?> >
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Patient:</label>
                    <input type="text" class="form-control" name="email" readonly placeholder="" value="<?= $name; ?> <?= $surname;?>" >
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Diagnosis:</label>
                    <input type="text" class="form-control" name="diagnosis" placeholder="" value="<?= $diagnosis; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Treatment Plan:</label>
                    <input type="text" class="form-control" name="treatment_plan" placeholder="" onkeypress="this.value=this.value.substring(0,499)" value="<?= $tr_plan;?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Prescription:</label>
                    <input type="text" class="form-control" name="prescription" placeholder="" value="<?= $prescr?>">
                </div>
            </div>

            <div>
                <button type="submit" name="submit" class="btn btn-success">Save</button>
                <button name="cancel" class="btn btn-danger">Cancel</button>
            </div>
        </form>
    </div>

    </div>
</body>
</html>