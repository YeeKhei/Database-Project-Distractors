<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "first_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Product_ID = mysqli_real_escape_string($link, $_REQUEST['Product_ID']);
$Product_Name = mysqli_real_escape_string($link, $_REQUEST['Product_Name']);
$Category_ID = mysqli_real_escape_string($link, $_REQUEST['Category_ID']);
$Product_Price = mysqli_real_escape_string($link, $_REQUEST['Product_Price']);
$Product_Supplier = mysqli_real_escape_string($link, $_REQUEST['Product_Supplier']);
$Stock = mysqli_real_escape_string($link, $_REQUEST['Stock']);
$Status = mysqli_real_escape_string($link, $_REQUEST['Status']);
 
// attempt insert query execution
$sql = "INSERT INTO inventory (Product_ID,Product_Name,Category_ID,Product_Price,Product_Supplier,Stock,Status) VALUES ('$Product_ID','$Product_Name', '$Category_ID','$Product_Price','$Product_Supplier','$Stock','$Status')";
if(mysqli_query($link, $sql)){
    Print'<script>alert("New Stock Insert");</script>';
	Print'<script>window.location.assign("category.php");</script>';
} else{
    Print'<script>alert("REPEATED Product");</script>';
	Print'<script>window.location.assign("newstock.php");</script>';
}
 
// close connection
mysqli_close($link);
?>