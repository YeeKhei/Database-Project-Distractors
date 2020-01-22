<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "first_db");

$Product_ID=$_POST['Product_ID'];
$Stock=$_POST['update'];
$Status=$_POST['status'];

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt delete query execution
$sql = "UPDATE inventory SET Stock='$Stock',Status='$Status' WHERE Product_ID='$Product_ID'";

if(mysqli_query($link, $sql)){
    Print'<script>alert("Succefully Update");</script>';
	Print'<script>window.location.assign("category.php");</script>';
} else if($Product_ID!=$row['Product_ID']){
    Print'<script>alert("Invalid Input");</script>';
	Print'<script>window.location.assign("category.php");</script>';
}
 
// Close connection
mysqli_close($link);
?>