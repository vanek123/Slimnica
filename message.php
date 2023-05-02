<?php

if (!isset($_GET['activity'])) {
    exit();
}
else {
    $activityCheck = $_GET['activity']; }
    
    /* LOGIN AND REGISTRATION ALERTS */

    if ($activityCheck == "login_empty") {
        echo "<div id='alert' class='alert'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Fill in all the fields!
        </div>";
    }
    elseif ($activityCheck == "incorrect_user_login_credentials") {
        echo "<div id='alert' class='alert'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Incorrect user login credentials!
        </div>";
    }
    elseif ($activityCheck == "wrong_first_name_format") {
        echo "<div id='alert' class='alert'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            First name can only contain letters and start with a capital letter!
        </div>";
    }
    elseif ($activityCheck == "wrong_last_name_format") {
        echo "<div id='alert' class='alert'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Last name can only contain letters and start with a capital letter!
        </div>";
    }
    elseif ($activityCheck == "wrong_phone_number_format") {
        echo "<div id='alert' class='alert'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Wrong phone number format!
        </div>";
    }
    elseif ($activityCheck == "personal_code_wrong_format") {
        echo "<div id='alert' class='alert'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Wrong personal code format!
        </div>";
    }
    elseif ($activityCheck == "email_format_is_wrong") {
        echo "<div id='alert' class='alert'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Email format is wrong - it should be example@example.com!
        </div>";
    }
    elseif ($activityCheck == "passwords_do_not_match") {
        echo "<div id='alert' class='alert'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Passwords do not match!
        </div>";
    }
    elseif ($activityCheck == "invalid_dob") {
        echo "<div id='alert' class='alert'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Invalid date of birth - go away hacker!
        </div>";
    }
    elseif ($activityCheck == "wrong_dob") {
        echo "<div id='alert' class='alert'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Wrong date of birth!
        </div>";
    }
    elseif ($activityCheck == "age_not_18") {
        echo "<div id='alert' class='alert'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            You must be 18+ years old!
        </div>";
    }
    elseif ($activityCheck == "pers_code_or_email_or_phone_number_taken") {
        echo "<div id='alert' class='alert'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Personal code, email or phone number taken!
        </div>";
    }
    elseif ($activityCheck == "reg_empty") {
        echo "<div id='alert' class='alert'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Fill in all the fields!
        </div>";
    }
    elseif ($activityCheck == "tr_added_successfully") {
        echo "<div id='alert' class='alert_login'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Treatment added successfully!
        </div>";
    }
    elseif ($activityCheck == "tr_updated_successfully") {
        echo "<div id='alert' class='alert_login'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Treatment updated successfully!
        </div>";
    }
    elseif ($activityCheck == "tr_deleted_successfully") {
        echo "<div id='alert' class='alert_login'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Treatment deleted successfully!
        </div>";
    }
    elseif ($activityCheck == "reg_success") {
        echo "<div id='alert' class='alert_login'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Signed up successfully!
        </div>";
    }
    elseif ($activityCheck == "login_success") {
        echo "<div id='alert' class='alert_login'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Logged in successfully!
        </div>";
    }

    /* ADMIN PANEL ALERTS */
    elseif ($activityCheck == "doctor_deleted_successfully") {
        echo "<div id='alert' class='alert_su'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Doctor deleted successfully!
        </div>";
    }
    elseif ($activityCheck == "doctor_updated_successfully") {
        echo "<div id='alert' class='alert_su'>
            <span class='closebtn' onclick='closeAlert()'>&times;</span>
            Doctor updated successfully!
        </div>";
    } elseif ($activityCheck == "new_record_created_succesfuly") {
        echo "<div id='alert' class='alert_su'>
        <span class='closebtn' onclick='closeAlert()'>&times;</span>
        Doctor created successfully!
        </div>";
    }
    
?>