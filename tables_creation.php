<?php
	$host="localhost";
	$dbuser="root";
	$pass="";
	$dbname="test";
	$conn=mysqli_connect($host,$dbuser,$pass,$dbname);
	$sql2="CREATE TABLE users
	(
		id int primary key AUTO_INCREMENT,
		owner TEXT,
		username varchar(1000),
		password varchar(1000)
	)";
	$sql3="CREATE TABLE snippets
	(
		id int primary key AUTO_INCREMENT,
		owner TEXT,
		snippet_name TEXT,
		snippet TEXT,
		options varchar(1000)
		
	)";
	$res=mysqli_query($conn,$sql2);
	$res1=mysqli_query($conn,$sql3);
	if (!$res&&!$res1)
	echo '<script>alert("TABLES NOT CREATED!!!")</script>';
	else
	echo '<script>alert("TABLES CREATED!!!")</script>';
					
?>