<?php
ob_start();
?>
<?php

include "display.php"; // Using database connection file here

$rollno = $_GET['rollno']; // get id through query string

$del = mysqli_query($db,"delete from attendance where rollno = '$rollno'"); // delete query

if($del)
{
 mysqli_close($db);
header("location:login.php");
ob_enf_fluch();
exit;
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>
