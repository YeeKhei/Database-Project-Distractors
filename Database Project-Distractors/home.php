<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Page</title>
</head>
<?php
session_start();
if($_SESSION['user']){}
else
{
	header("location:login.php");
}
?>
<style>
body{
background-color:#e8eeeb
}
</style>

<body>
<center>
  <h1><strong>DESA MART Parit Raja</strong></h1> <p text align="right"><a href="login.php">Click here to logout</a><br>
</p>
</center>
    <!--Display Inventory-->
<h3 align="center">Inventory Management syetem</h3>
<table border="1px"width="100%">
   <tr>
   	<th height="23"> <a href="home.php"><p style=color:#0d0e0c>Home</a></th>
    <th><a href="category.php">   <p style=color:#0d0e0c>Product</a>
    </th><th><a href="order.php"><p style=color:#0d0e0c>Order</a></th>
    <th><a href="salesreport.php"><p style=color:#0d0e0c>Sales Record</a></th>
   </tr>
   </table>
<p>&nbsp;</p>
<center>
<img src="image/untitled.png" width="1200" height="600" longdesc="image/untitled.png" />
</center>
</body>
</html>