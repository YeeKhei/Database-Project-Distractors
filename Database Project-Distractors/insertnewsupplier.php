<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "first_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Supplier_ID = mysqli_real_escape_string($link, $_REQUEST['Supplier_ID']);
$Supplier_Name = mysqli_real_escape_string($link, $_REQUEST['Supplier_Name']);
$Category = mysqli_real_escape_string($link, $_REQUEST['Category']);
$Status = mysqli_real_escape_string($link, $_REQUEST['status']);
 
// attempt insert query execution
$sql = "INSERT INTO supplier (Supplier_ID,Supplier_Name,Category,Status) VALUES ('$Supplier_ID','$Supplier_Name','$Category','$Status')";
if(mysqli_query($link, $sql)){
    Print'<script>alert("New Supplier Insert");</script>';
	Print'<script>window.location.assign("newsupplier.php");</script>';
} else{
    Print'<script>alert("REPEATED Supplier");</script>';
	Print'<script>window.location.assign("newsupplier.php");</script>';
}
 
// close connection
mysqli_close($link);
?>