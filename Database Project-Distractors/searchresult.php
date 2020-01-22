<?php
//load database connection
    $host = "localhost";
    $user = "root";
    $password = "";
    $database_name = "first_db";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
// Search from MySQL database table
$search=$_POST['search'];
$query = $pdo->prepare("SELECT *FROM inventory WHERE Product_ID LIKE '%$search%' OR Product_Name LIKE '%$search%'OR Product_Supplier LIKE '%$search%'  LIMIT 0 , 10");
$query->bindValue(1, "%$search%", PDO::PARAM_STR);
$query->execute();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
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
<style>
body{
background-color:#e8eeeb
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
        <th><a href="salesreport.php"><p style=color:#0d0e0c>Sales Record</a></th>
   </tr>
   </table></br>
   <form action="searchresult.php" method="post">
Search: <input type="text" name="search" placeholder=" Search product... "/>
<input type="submit" value="Submit" />
</form>
</br>

<h3>Category ID</h3>
<p>1-Cat Food<br>2-Chicken Food<br>
3-Duck Food<br>
4-Rabbit Food </p>
</br>
</body>


<?php
// Display search result
         if (!$query->rowCount() == 0) {
			 	
		 		echo "Search found :<br/>";
				echo "<table style=\"font-family:Times New Roman;color:#333333;\">";	
                echo "<tr>
				<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Product ID</td>
				<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Product Name</td>
				<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Category ID</td>
				<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Product Price</td>
				<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Product Supplier</td>
				<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Stock</td>
				<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Status</td>
				</tr>";				
            while ($results = $query->fetch()) {
				echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";			
                echo $results['Product_ID'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['Product_Name'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['Category_ID'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['Product_Price'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['Product_Supplier'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['Stock'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['Status'];
				echo "</td></tr>";				
            }
				echo "</table>";		
        } else {
            echo 'Nothing found';
        }
?>
</html>
