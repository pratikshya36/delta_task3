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
	<title>REGISTER AND LOGIN</title>
</head>
<style>
	body
	{
		background-color:lightblue;
	}
	.tab
	{
		margin-left:37%; margin-top:10%;margin-bottom:-15%;border:50%;
	}
	#submitbtn
	{
		margin-left:80%;margin-top:10%;cursor:pointer;padding:3% 3%;background-color:red;
	}
	#ref
	{
		margin-left:40%;margin-top:20%;font-size:110%;
	}
</style>
<body>
	<form  method="POST">
		<table class="tab" >
			<tr>
			<td>STUDENT ID</td>
			<td><input type="text" name="username" ></td>
			</tr>
			<tr>
			
			<td>PASSWORD</td>
			<td><input type="password" name="password"></td>
			</tr>
			<tr>
			<td>RE-TYPE PASSWORD</td>
			<td><input type="password" name="password2"></td>
			</tr>
			<tr>
		
			<td><input type="submit" name="submit" id="submitbtn" value="REGISTER"></td>
			</tr>
		</table>
	</form>
	<h1><center>
	<strong>STUDENT REGISTRATION PAGE</strong>
	<center></h1>
	<p id="ref" >If you are an existing user then<a href="login.php">LOGIN</a></p>
	<?php
		if(isset($_POST['submit']))
		{
		$user_name=$_POST['username'];
		$pass=$_POST['password'];
		$pass=base64_encode($pass);
		$pass2=$_POST['password2'];
		$pass2=base64_encode($pass2);
	
		if(empty($user_name)||empty($pass)||empty($pass2))
		{
			echo  '<script>alert("OOPS FIELDS CANNOT BE EMPTY!!!")</script>';
		}
		else 
		{if ($pass!=$pass2)
		{
			echo  '<script>alert("PASSWORDS ARE NOT MATCHING!!!")</script>';
		}
		
		else
		{
			$sql="INSERT INTO student_registration(student_id,password)".
				 "VALUES('$user_name','$pass')";
			$res=mysqli_query($conn,$sql);
			if (!$res)
			{
				die("Query failed!".mysqli_error($conn));
			}
			else
			{
				echo '<script>alert("REGISTRATION SUCCESSFUL!!!")</script>';
			}
		}
		}
		}
		?>
</body>
</html>