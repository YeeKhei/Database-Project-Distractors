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
$query = $pdo->prepare("SELECT *FROM salesreport WHERE Date LIKE '%$search%' OR Receipt_No LIKE '%$search%'OR Product_ID LIKE '%$search%'  LIMIT 0 , 10");
$query->bindValue(1, "%$search%", PDO::PARAM_STR);
$query->execute();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
    <th><a href="category.php">   <p style=color:#0d0e0c>Product</a>
    </th><th><a href="order.php"><p style=color:#0d0e0c>Order</a></th>
     <th><a href="salesreport.php"><p style=color:#0d0e0c>Sales Record</a></th>
   </tr>
   </table></br>
<form action="searchsales.php" method="POST">
Search: <input type="text" name="search" placeholder=" Search receipt... "/>
<input type="submit" value="Submit" />
</form></br>
<?php
// Display search result
         if (!$query->rowCount() == 0) {
			 	
		 		echo "Search found :<br/>";
				echo "<table style=\"font-family:Times New Roman;color:#333333;\">";	
                echo "<tr>
				<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Date</td>
				<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Receipt No</td>
				<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Product ID</td>
				<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Quantity</td>
				<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Product Price</td>
				<td style=\"border-style:solid;border-width:1px;border-color:#98bf21;background:#98bf21;\">Total Price</td>
				</tr>";				
            while ($results = $query->fetch()) {
				echo "<tr><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";			
                echo $results['Date'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
				echo $results['Receipt_No'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['Product_ID'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['Quantity'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['Product_Price'];
				echo "</td><td style=\"border-style:solid;border-width:1px;border-color:#98bf21;\">";
                echo $results['Total'];
				echo "</td></tr>";				
            }
				echo "</table>";		
        } else {
            echo 'Nothing found';
        }
?>
</body>
</html>