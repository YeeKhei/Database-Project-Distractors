<?php

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "first_db");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Date = mysqli_real_escape_string($link, $_REQUEST['Date']);
$Receipt_No = mysqli_real_escape_string($link,$_REQUEST['Receipt_No']);
$Product_ID = mysqli_real_escape_string($link, $_REQUEST['Product_ID']);
$Quantity = mysqli_real_escape_string($link, $_REQUEST['Quantity']);
$Product_Price = mysqli_real_escape_string($link, $_REQUEST['Product_Price']);
$Total = mysqli_real_escape_string($link, $_REQUEST['Total']);
 
// attempt insert query execution
$sql = "INSERT INTO salesreport (Date, Receipt_No, Product_ID,Quantity,Product_Price,Total) VALUES ('$Date','$Receipt_No','$Product_ID','$Quantity', '$Product_Price', '$Total')";
if(mysqli_query($link, $sql)){
	mysqli_query($link,"UPDATE inventory SET Stock=(inventory.Stock-'$Quantity') WHERE inventory.Product_ID = '$Product_ID'");
    Print'<script>alert("Sales Recorded");</script>';
	Print'<script>window.location.assign("salesreport.php");</script>';
} else{
    Print'<script>alert("INVALID Insert OR REPEATED Receipt No");</script>';
	Print'<script>window.location.assign("salesreport.php");</script>';
}
 
// close connection
mysqli_close($link);
?>