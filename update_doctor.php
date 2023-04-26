<?php
include 'connection.php';
$id = $_GET['updateid'];
$sql="SELECT * FROM `arsti` WHERE arsts_id=$id LIMIT 1";
$result = $DBconnection->query($sql);
$row = $result->fetch();
$name = $row['vards'];
$surname = $row['uzvards'];
$email = $row['epasts'];
$phone_number = $row['talrunis'];
$specialty = $row['specialitate'];

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <title>Update doctor form</title>
    <link rel="stylesheet" href="css/add_doctor_form.css">
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #4070f4">
        Hello, Admin!
    </nav>

    <div class="container">

        <div class="text-center mb-4">
            <h3>Update Doctor</h3>
            <p class="text-muted">Complete the form below to update a doctor</p>
        </div>
    

    <div class="container d-flex justify-content-center">
    
        <form action="" method="POST" style="width: 20vw; min-width: 300px;">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">First Name:</label>
                    <input type="text" class="form-control" name="first_name" placeholder="" value=<?php echo $name;?>>
                </div>

                <div class="col">
                    <label class="form-label">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" placeholder="" value=<?php echo $surname;?>>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">E-mail:</label>
                    <input type="text" class="form-control" name="email" placeholder="" value=<?php echo $surname;?>>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Phone Number:</label>
                    <input type="number" class="form-control" name="phone_number" placeholder="" value=<?php echo $phone_number;?>>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Password:</label>
                    <input type="text" class="form-control" name="password" placeholder="">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Specialty:</label>
                    <input type="text" class="form-control" name="specialty" placeholder="" value=<?php echo $specialty;?>>
                </div>
            </div>

            <div>
                <button type="submit" name="submit" class="btn btn-success">Update</button>
                <button name="cancel" class="btn btn-danger">Cancel</button>
            </div>
        </form>
    </div>

    </div>
</body>
</html>