<?php

if (!isset($_GET['activity'])) {
    exit();
}
else {
    $activityCheck = $_GET['activity']; }
    
    if ($activityCheck == "doctor_deleted_successfully") {
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