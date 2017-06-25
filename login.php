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
	margin-left:37%; margin-top:10%;margin-bottom:-15%;border:50%;padding:
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
			<td>ARE YOU A</td>
			<td><input type="radio" name="access" value="professor">PROFESSOR</td>
			<td><input type="radio" name="access" value="student">STUDENT</td>
			</tr>
			<tr>
			<tr>
			<td>USERNAME/STUDENT ID</td>
			<td><input type="text" name="username" ></td>
			</tr>
			<tr>
			
			<td>PASSWORD</td>
			<td><input type="password" name="password"></td>
			</tr>
			<tr>
			
		
			<td><input type="submit" name="submit" id="submitbtn"></td>
			</tr>
		</table>
	</form>
	<h1><center>
	<strong>LOGIN PAGE</strong>
	<center></h1>
		<p id="ref">If you are a new user then<a href="index.php?">REGISTER</a></p>
	<?php
		if(isset($_POST['submit']))
		{
		$user_name=$_POST['username'];
		$pass=$_POST['password'];
		$pass=base64_encode($pass);
		$level=$_POST['access'];
		
	
		if(empty($user_name)||empty($pass))
		{
			echo  '<script>alert("OOPS FIELDS CANNOT BE EMPTY!!!")</script>';
		}
		
		else
		{ 
			if ($level=="professor")
			{
			$sql="SELECT * FROM admins_registration WHERE username='$user_name'&&password='$pass'";
			$res=mysqli_query($conn,$sql);
			if (!$res)
			{
				echo  '<script>alert("LOGIN UNSUCCESSFUL!!!")</script>';
			}
			else
			{
				$c=0;
				while($row=mysqli_fetch_array($res))
				{
					$c=$c+1;break;
					
				}
				if ($c==0)
					echo '<script>alert("EITHER USERNAME OR PASSWORD NOT MATCHING OR YOU ARE NOT REGISTERED")</script>';
				else
						header("Location:http://localhost/online_board2.php");;
			
			}
		}
			else
				if ($level=="student")
			{
			$sql="SELECT * FROM student_registration WHERE student_id='$user_name'&&password='$pass'";
			$res=mysqli_query($conn,$sql);
			if (!$res)
			{
				echo  '<script>alert("LOGIN UNSUCCESSFUL!!!")</script>';
			}
			else
			{
				$c=0;
				while($row=mysqli_fetch_array($res))
				{
					$c=$c+1;break;
					
				}
				if ($c==0)
					echo '<script>alert("EITHER USERNAME OR PASSWORD NOT MATCHING")</script>';
				else
					header("Location:http://localhost/online_board.php");
			
			}
		}
		}
			
		}
	?>
		
</body>
</html>