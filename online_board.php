<?php
	$host="localhost";
	$dbuser="prof_admin";
	$pass="prof1234";
	$dbname="md5_password";
	$conn=mysqli_connect($host,$dbuser,$pass,$dbname);
?>
<!DOCTYPE html>
<html>
<head>
	<title>ONLINE NOTICE BOARD FOR STUDENTS</title>
</head>
<style>
	body
	{
		background-color:lightgreen;
	}
	#ref
	{
		margin-left:80%;font-size:110%;font-color:red;
	}
</style>
<body>
	<p id="ref"><a href="login.php?">LOGOUT</a></p>
	<h1><center>BULLETIN BOARD</center></h1>
<?php
	$res=mysqli_query($conn,"SELECT * FROM student_notes");
	echo "<table border=1 >";
	echo "<tr>";
	echo "<th>";echo "SERIAL"; echo "</th>";
	echo "<th>";echo "SUBJECT"; echo "</th>";
	echo "<th height=50px>";echo "NOTE"; echo "</th>";
	echo "</tr>";
	
	while($row=mysqli_fetch_array($res))
	{
		echo "<tr>";
		echo "<td>";echo $row["id"]; echo "</td>";
		echo "<td>";echo $row["subject"]; echo "</td>";
		echo "<td height=150px>";echo $row["note"]; echo "</td>";
		echo "</tr>";
	}
?>
</body>
</html>