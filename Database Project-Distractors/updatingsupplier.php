<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "first_db");

$Supplier_ID=$_POST['Supplier_ID'];
$Status=$_POST['status'];

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt delete query execution
$sql = "UPDATE supplier SET Status='$Status' WHERE Supplier_ID='$Supplier_ID'";

if(mysqli_query($link, $sql)){
    Print'<script>alert("Succefully Update");</script>';
	Print'<script>window.location.assign("newsupplier.php");</script>';
} else if($Supplier_ID!=$row['Supplier_ID']){
    Print'<script>alert("Invalid Input");</script>';
	Print'<script>window.location.assign("newsupplier.php");</script>';
}
 
// Close connection
mysqli_close($link);
?>