<?php
	session_start();
	$name2=$_SESSION['name'];
	$host="localhost";
	$dbuser="root";
	$pass="";
	$dbname="test";
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
	<form  method="POST" >
		<table class="tab" >
			<tr>
			<td>USERNAME</td>
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
	<p id="ref">If you are a new user then<a href="registration_page.php?">REGISTER</a></p>
	<?php
		if(isset($_POST['submit']))
		{
		$user_name=$_POST['username'];
		$pass=$_POST['password'];
		$pass=md5($pass);
		if(empty($user_name)||empty($pass))
		{
			echo  '<script>alert("OOPS FIELDS CANNOT BE EMPTY!!!")</script>';
		}
		else
		{ 
			$rawQuery="SELECT * FROM users WHERE username='%s' && password='%s'";
			$sql=sprintf($rawQuery,mysqli_real_escape_string($conn,$user_name),mysqli_real_escape_string($conn,$pass));
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
					$name=$row["owner"];$c=$c+1;break;
					
				}
				if ($c==0)
					echo '<script>alert("EITHER USERNAME OR PASSWORD NOT MATCHING OR YOU ARE NOT REGISTERED")</script>';
				else
				{	session_start();
					$_SESSION['user']=$user_name;
					header("Location:http://localhost/work_page.php?");
			      
				}
			
			}
		}
		}
	
		
			
		
	?>
		
</body>
</html>