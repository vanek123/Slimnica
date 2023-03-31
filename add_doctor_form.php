<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <title>Add doctor form</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #4070f4">
        Hello, Admin!
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New Doctor</h3>
            <p class="text-muted">Complete the form below to add a new doctor</p>
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <form action="add_doctor.php" method="POST" style="width: 20vw; min-width: 300px;">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">First Name:</label>
                    <input type="text" class="form-control" name="first_name" placeholder="John">
                </div>

                <div class="col">
                    <label class="form-label">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" placeholder="Jones">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">E-mail:</label>
                    <input type="text" class="form-control" name="email" placeholder="example@rls.lv">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Phone Number:</label>
                    <input type="text" class="form-control" name="phone_number" placeholder="22345678">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Password:</label>
                    <input type="text" class="form-control" name="password" placeholder="*******">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Specialty:</label>
                    <input type="text" class="form-control" name="specialty" placeholder="Dentist">
                </div>
            </div>

            <div>
                <button type="submit" name="save" class="btn btn-success">Save</button>
                <a href="admin_panel.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>