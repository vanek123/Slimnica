<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pacienti_login.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Login</title>
    <script defer src="js/pacienti_login_registracija.js"></script>
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="#">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>

                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="button" value="Login Now">
                    </div>
                </form>
                
                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="#" class="text signup-link">Signup now</a>
                    </span>
                </div>
            </div>
            
            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Registration</span>

                <form action="pacientu_registracija.php" method="POST">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" name="name">
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your surname" name="surname">
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="number" placeholder="Enter your personal code" name="personas_kods" onkeypress="this.value=this.value.substring(0,11)" id="personalCode">
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="date" placeholder="Enter your DOB" name="dob">
                        <i class="uil uil-calendar-alt"></i>
                    </div>
                    <div class="input-field">
                        <select class="select" placeholder="Choose your gender" name="gender">
                            <option value="" disabled selected hidden>Choose your gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <i class="uil uil-mars"></i>
                    </div>
                    <div class="input-field" >
                        <input type="number" name="phone_num" placeholder="Enter your phone number" onkeypress="this.value=this.value.substring(0,7)" id="phoneNumber">
                        <i class="uil uil-phone"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" name="email">
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password" name="password">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Confirm your password" name="confirm_pass">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="sigCheck">
                            <label for="sigCheck" class="text">Remember me</label>
                        </div>

                        <a href="#" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="register" value="Register Now">
                    </div>
                </form>
                
                <div class="login-signup">
                    <span class="text">Have an account?
                        <a href="#" class="text login-link">Log in now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

</body>
</html>