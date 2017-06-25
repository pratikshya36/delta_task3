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
	<title>ACCESS PAGE</title>
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
	.tab
	{
		margin-left:37%; margin-top:5%;margin-bottom:-15%;border:50%;
	}
	#submitbtn1
	{
		border-radius:10%;margin-left:80%;padding:1% 1%;background-color:yellow;cursor:pointer;margin-top:10%;
	}
	#submitbtn2
	{
		border-radius:10%;margin-left:90%;padding:1% 1%;background-color:yellow;cursor:pointer;margin-top:10%;
	}
	#ins
	{
		font-size:110%;margin-left:35%;
	}
</style>

<body>

	<p id="ref"><a href="login.php?">LOGOUT</a></p>
	<p id="ref"><a href="online_board2.php?">GO BACK TO BULLETIN BOARD</a></p>
	<h1><center>ACCESS LEVEL PAGE</center></h1>
	<p id="ins">Enter the id of the student whose access level has to be upgraded</p>
	<form  method="POST">
		<table class="tab" >
			<tr>
			<td>ENTER STUDENT ID </td>
			<td ><input type="text" name="studentid"></td>
			</tr>
			<tr>
			<td><input type="submit" name="submit1" id="submitbtn1" value="UPGRADE ACCESS LEVEL"></td>
			<td><input type="submit" name="submit2" id="submitbtn2" value="DISPLAY STUDENTS' DATABASE"></td>
			</table>
	</form>

	<?php
	if(isset($_POST['submit2']))
	{
	$res=mysqli_query($conn,"SELECT * FROM student_registration");
	echo "<table border=1 >";
	echo "<tr>";
	echo "<th>";echo "SERIAL"; echo "</th>";
	echo "<th>";echo "STUDENT ID"; echo "</th>";
	echo "</tr>";
	
		while($row=mysqli_fetch_array($res))
		{
			echo "<tr>";
			echo "<td>";echo $row["id"]; echo "</td>";
			echo "<td>";echo $row["student_id"]; echo "</td>";	
			echo "</tr>";
		}
	}
	if(isset($_POST['submit1']))
	{
		$student_id=$_POST['studentid'];
		$sql="SELECT * FROM student_registration WHERE student_id='$student_id'";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);
		$pass=$row["password"];
		$pass=base64_decode($pass);
		$pass1= base64_encode($pass);
		$sql1="INSERT INTO admins_registration(username,password)".
			"VALUES('$student_id','$pass1')";
		$res=mysqli_query($conn,$sql1);
		$sql2="DELETE FROM student_registration WHERE student_id='$student_id'";
		$res2=mysqli_query($conn,$sql2);
	}
	
	?>
	</body>
	</html>