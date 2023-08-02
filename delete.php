<?php
include("connect.php");

$id2 = $_GET['id1'];

$query = "DELETE FROM form WHERE id = '$id2' ";
$data = mysqli_query($conn,$query);

    if($data){
        echo "<script>alert('Record Updated')</script>";
        ?>
            <meta http-equiv="refresh" content= "0; url = http://localhost/aadi/display.php"/>
        <?php
    }
    else{
        echo "Failed";
    }
?>