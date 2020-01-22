<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
$conn=mysqli_connect("localhost","root","","first_db")or die(mysqli_error());
mysqli_select_db($conn,'firstdb');
$sql="SELECT *FROM inventory";
$record=mysqli_query($conn,$sql);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
</head>
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
<body>
<center>
<h1><strong>DESA MART Parit Raja<strong></h1></center> <p text align="right"><a href="login.php">Click here to logout</a>
</p>

<h3 align="center">Inventory Management syetem</h3>

<table border="1px"width="100%">
   <tr>
   	<th height="23"> <a href="home.php"><p style=color:#0d0e0c>Home</a></th>
    <th><a href="category.php">   <p style=color:#0d0e0c>Product</a>
    </th><th><a href="order.php"><p style=color:#0d0e0c>Order</a></th>
    <th><a href="salesreport.php">
    <p style=color:#0d0e0c>Sales Record</a></th>
   </tr>
   </table></br>
      
<form action="searchresult.php" method="post">
Search: <input type="text" name="search" placeholder=" Search product... "/>
<input type="submit" value="Search" />
</form>

<h3>Category ID</h3>
<p>1-Cat Food<br>
2-Chicken Food<br>
3-Duck Food<br>
4-Rabbit Food
<p text align="right"><a href="newstock.php">Add New Stock</a>   <a href="update.php">Update Stock</a>
  <a href="delete.php">Delete Stock</a></p>

<table border="1px"width="100%"style=\"font-family:Times New Roman;color:#333333;\>
   <tr>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Product ID</th>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Product Name</th>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Category</th>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Product Price</th>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Product Supplier</th>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Stock</th>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Status</th>
   </tr>
 <?php
 while($row=mysqli_fetch_assoc($record))
 {
	echo"<tr>";
	echo"<td>".$row['Product_ID']."</td>";
	echo"<td>".$row['Product_Name']."</td>";
	echo"<td>".$row['Category_ID']."</td>";
	echo"<td>".$row['Product_Price']."</td>";
	echo"<td>".$row['Product_Supplier']."</td>";
	echo"<td>".$row['Stock']."</td>";
	echo"<td>".$row['Status']."</td>";
	echo"</tr>";
 }
 if (!$record) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
?>
</body>
</html>