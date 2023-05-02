<?php
   include 'connection.php';
   if(isset($_GET['deleteid'])) {
       $id = $_GET['deleteid'];
   
       $sql = "DELETE FROM `med_ieraksti` WHERE pieraksts_id = $id";
       $result = $DBconnection->query($sql);
       if($result) {
           echo "Deleted successfully";
           header('location: doctor_profile.php?activity=tr_deleted_successfully');
       }
       else {
           echo "Exception error: " . $ex->getMessage();
           die($ex->getMessage());
       }
   }
   
?>