<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$conn=mysqli_connect("localhost","root","","first_db")or die(mysqli_error());
mysqli_select_db($conn,'firstdb');
$sql="SELECT *FROM supplier";
$record=mysqli_query($conn,$sql);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Stock</title>
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
<form action="searchresult.php" method="POST">
Search: <input type="text" name="search" placeholder=" Search product ... "/>
<input type="submit" value="Search" />
</form>
<h3>Category ID</h3>
<p>1-Cat Food<br>
2-Chicken Food<br>
3-Duck Food<br>
4-Rabbit Food</p>

<center><h2>Add New Supplier<h2>
</center>
<form action="insertnewsupplier.php"method="POST">
Supplier ID:
<input type="text"name="Supplier_ID"required="required"/></br></br>
Supplier Name:<input type="text"name="Supplier_Name"required="required"/></br></br>
Category ID:<input type="text"name="Category"required="required"/></br></br>
Status:<input type="text"name="status"required="required"/></br></br>
</br></br>
<center>
<input type="submit"value="Add Supplier"/>
<input type="reset"value="Reset"/>
<br>
<br>
<p text align=right><a href=updatesupplier.php>Update Supplier Status</a><br>
</p>
<h3>Supplier List</h3>
<table border="1px"width="100%"style=\"font-family:Times New Roman;color:#333333;\>
   <tr>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Product ID</th>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Product Name</th>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Category</th>
   <th style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\>Status</th>
   </tr>
<?php
 while($row=mysqli_fetch_assoc($record))
 {
	echo"<tr>";
	echo"<td>".$row['Supplier_ID']."</td>";
	echo"<td>".$row['Supplier_Name']."</td>";
	echo"<td>".$row['Category']."</td>";
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