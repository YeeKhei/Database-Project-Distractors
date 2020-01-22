<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$Date=$_POST['Date'];
	$Invoice_No=$_POST['Invoice_No'];
	$Product_ID=$_POST['Product_ID'];
	$quantity=$_POST['quantity'];
	$Supplier_ID=$_POST['Supplier_ID'];
	$Product_Price=$_POST['Product_Price'];
	$Total_Price=$_POST['Total_Price'];
	$bool=true;
$conn =mysqli_connect("localhost","root","")or die(mysqli_error());//connect to server
	mysqli_select_db($conn,"first_db") or die("Cannot connect to db");
	$query=mysqli_query($conn,"Select * FROM ordering WHERE Date='$Date'");

while($row=mysqli_fetch_array($query))
{
	$table_ordering=$row['Date'];
	if($quantity<=0||$Invoice_No==$row['Invoice_No'])
	{
		$bool=false;
		Print'<script>alert("INVALID Insert OR REPEATED Invoice No");</script>';
		Print'<script>window.location.assign("order.php");</script>';
	}
}
	if($bool)
	{
		mysqli_query($conn,"INSERT INTO ordering(Date,Invoice_No,Product_ID,quantity,Supplier_ID,Product_Price,Total_Price)VALUES('$Date','$Invoice_No','$Product_ID','$quantity','$Supplier_ID','$Product_Price','$Total_Price')");
		mysqli_query($conn,"UPDATE inventory SET Stock=(inventory.Stock+'$quantity') WHERE inventory.Product_ID = '$Product_ID'");
		Print'<script>alert("Stock Update");</script>';
		Print'<script>window.location.assign("order.php");</script>';
	}
}
mysqli_close($link);
?>
