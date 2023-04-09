<?php
include 'connection.php';
if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `arsti` WHERE arsts_id = $id";
    $result = $DBconnection->query($sql);
    if($result) {
        echo "Deleted successfully";
        header('location: admin_panel.php?activity=deleted_successfully');
    }
    else {
        echo "Exception error: " . $ex->getMessage();
        die($ex->getMessage());
    }
}

?>