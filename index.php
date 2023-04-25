<?php
session_start();
require_once 'doctor_repository.php';

/*$patient = $_SESSION['pacients_id'];

if (is_array($patient)) {
    echo 'that is array';// handle the array data accordingly
  } else {
    echo $patient; // assuming it's a string or other scalar value
  } */

?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    <title>Rīgas Lux Slimnīca</title>
    <link rel="stylesheet" href="css/index.css">
    <script defer src="js/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
    <!-- Navbar-->
    <header>
        <div class="logo">Rīgas Lux Slimnīca</div>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <nav class="nav-bar">
            <ul>
                <li>
                    <a href="" class="active">Home</a>
                </li>
                <li>
                    <a href="#about" class="">About</a>
                </li>
                <li>
                    <a href="" class="">Service</a>
                </li>
                <li>
                    <a href="" class="">Doctor</a>
                </li>
                <li>
                    <!-- <a href="#booking" class="">Book</a> -->
                    <?php
                    if (isset($_SESSION['pacients_id'])) {
                        echo "<a href='#booking' class=''>Book</a>";
                    }
                    else {
                        echo "<a href='pacienti_forms.php' class='' >Book</a>";
                    }
                ?>
                </li>
                <li>
                    <a href="#footer" class="">Contact</a>
                </li>
                <li>
                <?php
                    if (isset($_SESSION['pacients_id'])) {
                        echo "<a href='patient_profile.php' class=''>Profile</a>";
                    }
                ?>
                </li>
                <li>
                    <!-- <a href="pacienti_forms.php" class="">Login</a> -->
                <?php
                    if (isset($_SESSION['pacients_id'])) {
                        echo "<a href='logout.php' class=''>Logout</a>";
                    }
                    else {
                        echo "<a href='pacienti_forms.php' class='' >Login</a>";
                    }
                ?>
                </li>

            </ul>
        </nav>
    </header>

    <!-- Main-->
    <div class="img-container">
        <img src="https://www.nwphysicians.com/wp-content/uploads/2019/12/AdobeStock_219914874.jpeg" alt="">
        <div class="img-text">
            <h1>We Take Care Of Your</h1>
            <h1>Healthy Health</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
            <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span></a>
        </div>
    </div>
    <div class="cards">
        <div class="card1">
            <h1>Best Treatment</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        </div>
        <div class="card2">
            <h1>Emergency Help</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        </div>
        <div class="card3">
            <h1>Medical Staff</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. </p>
        </div>
        <div class="card4">
            <h1>Qualified Doctors</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>
    
    <?php if (isset($_SESSION['pacients_id'])): ?>
        <section id="booking">
            <h1 class="heading"> <span>Appointment</span> Booking</h1>

    <form action="make-appointment.php" method="POST">
        <?php if (isset($_GET['appointment']) && $_GET['appointment'] === 'success'): ?>
            <div class="success-msg">Paldies par pierakstu!</div>
        <?php endif; ?>
        <input type="hidden" name="patient-id" value="<?= $_SESSION['pacients_id']; ?>">
        <label for="appointmentDate">Appointment Date and Time:</label>
        <input type="datetime-local" name="appoint-datetime" required><br><br>

        <label for="doctor">Doctor:</label>
        <select name="doctor-id" required>
            <?php foreach (getAllDoctors() as $doctor): ?>
                <option value="<?= $doctor['arsts_id'];?>">
                    <?= $doctor['vards'];?> <?= $doctor['uzvards'];?> - <?= $doctor['specialitate']?>
                </option>
            <?php endforeach; ?>
            <!-- Add more doctor options as needed -->
        </select><br><br>

        <label for="notes">Notes:</label>
        <textarea name="appoint-comment"></textarea><br><br>
    
        <input type="submit" value="Reserve appointment">
    </form>
    </section>

    <?php endif; ?>
    <!-- About Us start -->

    <section class="about" id="about">

        <h1 class="heading"> <span>about</span> us </h1>

        <div class="about_row">

            <div class="about_image" alt="">
                <img src="img/bed.svg">
            </div>

            <div class="about_content">
                <h3>we take care of your healthy life</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo atque tempore cum saepe ipsa pariatur error, ipsam nobis recusandae dolor quaerat cupiditate perferendis, omnis animi libero voluptatum amet doloribus tenetur?</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat odio accusantium asperiores soluta laudantium deserunt saepe. Quaerat iure provident reprehenderit!</p>
                <a href="#" class="btn"> learn more <span class="fas fa-chevron-right"></span></a>
            </div>

        </div>

    </section>


    <!-- About Us end -->

    <div class="services">

    </div>

    <div class="doctors">

    </div>

    <!-- Footer -->

        <div class="footer" id="footer">
            <div class="footer_logo">
                <img src="img/RLS-1.png" alt="">
            </div>
            <div class="under_logo">
                <ul>
                    <li>Contact our specialist doctor at any time for any of your aliments</li>
                </ul>
            </div>
            <div class="quick_links">
                <h3>Quick links</h3>
                <ul>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">Doctor</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="contact_info">
                <h3>Contact info</h3>
                <ul>
                    <li>(111) 222-3333</li>
                    <li>(111) 222-3333</li>
                    <li>rigasluxslimnica@example.com</li>
                    <li>Lielā džupelnieka iela 27, Rīga, LV-1023</li>
                </ul>
            </div>
            <div class="all_rights_reserved">
                <p>© SIA "Rīgas Lux Slimnīca" | All rights reserved</p>
            </div>
        </div>

</body>
</html>
