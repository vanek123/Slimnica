<?php
   include 'connection.php';
   if(isset($_GET['cancelid'])) {
       $id = $_GET['cancelid'];
   
       $sql = "DELETE FROM `pieraksti` WHERE pieraksts_id = $id";
       $result = $DBconnection->query($sql);
       if($result) {
           echo "Deleted successfully";
           header('location: patient_profile.php?activity=app_deleted_successfully');
       }
       else {
           echo "Exception error: " . $ex->getMessage();
           die($ex->getMessage());
       }
   }
   
?>