<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$conn=mysqli_connect("localhost","root","","first_db")or die(mysqli_error());
mysqli_select_db($conn,'firstdb');
$sql="SELECT *FROM ordering";
$record=mysqli_query($conn,$sql);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order Inventory</title>
<style> 
body{
background-color:#e8eeeb
}
input[type=text] {
    width:50%;
    padding: 2px 8px;
    box-sizing: border-box;
}
</style>
</head>
<body>
<center>
<h1><strong>DESA MART Parit Raja<strong></h1></center> <p text align="right"><a href="login.php">Click here to logout</a>
</p>

<h3 align="center">Inventory Management syetem</h3>

<table border="1px"width="100%">
   <tr>
   	<th height="23"> <a href="home.php"><p style=color:#0d0e0c>Home</a></th>
    <th><a href="category.php">   <p style=color:#0d0e0c>Product</a></th>
    <th><a href="order.php"><p style=color:#0d0e0c>Order</a></th>
    <th><a href="salesreport.php"><p style=color:#0d0e0c>Sales Record</a></th>
   </tr>
   </table></br>
<form action="searchinvoice.php" method="POST">
Search: <input type="text" name="search" placeholder=" Search invoice ... "/>
<input type="submit" value="Submit" />

</form>
<center><h2>Order Form<h2>
</center>
<form action="ordering.php"method="POST">
Date:<input type="date"name="Date"required="required"/>
Invoice No:<input type="text"name="Invoice_No"required="required"/></br></br>
Product ID:<input type="text"name="Product_ID"required="required"/></br></br>
Quantity:<input type="number"name="quantity"required="required"/></br></br>
Supplier ID:<input type="text"name="Supplier_ID"required="required"/></br></br>
Product Price:<input type="text"name="Product_Price"required="required"maxlength="50"/></br></br>
Total Price:<input type="text"name="Total Price"required="required"/></br></br>
<center>
<p>
  <input type="submit"value="Confirm"/>
  <input type="reset"value="Reset"/>
  <br>
  </p>
<p text align=right><a href=newsupplier.php>Add/Update New Supplier</a>
<h2>List of Invoice</h2></center>
<table border="1px"width="100%"style=\"font-family:Times New Roman;color:#333333;\>
   <tr>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Date</th>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Invoice No</th>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Product ID</th>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Quantity</th>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Supplier ID</th>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Product Price</th>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Total Price</th>
   </tr>
 <?php
 while($row=mysqli_fetch_assoc($record))
 {
	echo"<tr>";
	echo"<td>".$row['Date']."</td>";
	echo"<td>".$row['Invoice_No']."</td>";
	echo"<td>".$row['Product_ID']."</td>";
	echo"<td>".$row['quantity']."</td>";
	echo"<td>".$row['Supplier_ID']."</td>";
	echo"<td>".$row['Product_Price']."</td>";
	echo"<td>".$row['Total_Price']."</td>";
	echo"</tr>";
 }
 if (!$record) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
?>   
   
</body>
</html>