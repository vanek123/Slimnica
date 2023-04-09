<?php
    include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/admin_panel.css">
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #4070f4">
        Hello, Admin!
    </nav>
    <div class="container">
        <button class="btn btn-primary my-2"><a href="add_doctor_form.php" class="text-light">Add doctor</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Password</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Specialty</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>

            <?php

            $SQL = "SELECT * FROM `arsti` ";
            $result = $DBconnection->query($SQL);
            if($result) {
                while($row = $result->fetch()) {
                    $id = $row['arsts_id'];
                    $vards = $row['vards'];
                    $uzvards = $row['uzvards'];
                    $epasts = $row['epasts'];
                    $parole = $row['parole'];
                    $talrunis = $row['talrunis'];
                    $specialitate = $row['specialitate'];
                    echo '<tr>
                            <th scope="row">'.$id.'</th>
                            <td>'.$vards.'</td>
                            <td>'.$uzvards.'</td>
                            <td>'.$epasts.'</td>
                            <td>'.$parole.'</td>
                            <td>'.$talrunis.'</td>
                            <td>'.$specialitate.'</td>
                            <td> 
                            <button class="btn btn-primary"><a href="update_doctor.php?updateid='.$id.'" class="text-light">Update</a></button>
                            <button class="btn btn-danger"><a href="delete_doctor.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                            </td>
                           </tr> ';
                }
            }

            ?>

            </tbody>
        </table>
    </div>

    

</body>
</html>