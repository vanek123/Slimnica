<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/admin_panel.css">
</head>
<body>
    <div class="container doc-table">
        <div class="headers">
            <h2 class="table-title">Manage Doctors</h2>
            <button class="btn add">Add doctor</button>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th> Name </th>
                    <th> Surname </th>
                    <th> E-pasts </th>
                    <th> Parole </th>
                    <th> Talrunis </th>
                    <th> Specialitate </th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> Real me 8</td>
                    <td> 18000</td>
                    <td> 8g</td>
                    <td> 64gb</td>
                    <td> 8gb</td>
                    <td> 64gb</td>
                    <td><button class="btn btn-primary"> edit</button></td>
                    <td><button class="btn btn-danger"> Delete</button></td>
                </tr>
            </tbody>

        </table>

    </div>
</body>
</html>