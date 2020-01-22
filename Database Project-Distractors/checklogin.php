<?php
session_start();
mysqli_connect("localhost","root","","first_db")or die(mysqli_error());//connect to server
$conn = mysqli_connect("localhost","root","","first_db");
$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$bool=true;
$query=mysqli_query($conn,"Select * from user WHERE username='$username'");//Query the users table
$exists=mysqli_num_rows($query);//check if the username exists
$table_user="";
$table_password="";
if($exists>0)
{
while($row=mysqli_fetch_assoc($query))//display all rows from query
	{
		$table_user=$row['username'];
		$table_password=$row['password'];
	}
if(($username==$table_user)&&($password==$table_password))
	{
		if($password==$table_password)
		{
			$_SESSION['user']=$username;
			header("location:home.php");
		}
	}
	else
	{
		Print'<script>alert("Incorrect Password!");</script>';//Prompt user
		Print'<script>window.location.assign("login.php");</script>';//redicts to login.php
	}
}
	else
	{
		Print'<script>alert("Incorrect Username!");</script>';//Prompt user
		Print'<script>window.location.assign("login.php");</script>';//redicts to login.php
	}

?>
