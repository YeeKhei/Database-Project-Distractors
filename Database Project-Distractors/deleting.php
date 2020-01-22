<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "first_db");

$Product_ID=$_POST['delete'];

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt delete query execution
$sql = "DELETE FROM inventory WHERE Product_ID='$Product_ID'";
if(mysqli_query($link, $sql)){
    Print'<script>alert("Succefully Delete");</script>';
	Print'<script>window.location.assign("category.php");</script>';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>