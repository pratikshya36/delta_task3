<?php

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
	#heading
	{
		margin-top:-1%;
	}
	body
	{
		background-color:lightblue;
	}
	.tab
	{
		margin-left:37%; margin-top:11%;margin-bottom:-15%;border:50%;
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
			<td>ENTER YOUR NAME</td>
			<td><input type="text" name="name" ></td>
			</tr>
			<tr>
			
			<tr>
			<td>ENTER USERNAME</td>
			<td><input type="text" name="username" ></td>
			</tr>
			<tr>
			
			<td>ENTER PASSWORD</td>
			<td><input type="password" name="password"></td>
			</tr>
			<tr>
			<td>CONFIRM PASSWORD</td>
			<td><input type="password" name="password2"></td>
			</tr>
			<tr>
		
			<td><input type="submit" name="submit" id="submitbtn" value="REGISTER"></td>
			</tr>
		</table>
	</form>
	<h1 id="heading"><center>
	<strong>SIGN UP PAGE</strong>
	<center></h1>
	<p id="ref" >If you are an existing user then<a href="login_page.php">LOGIN</a></p>
	<?php
		if(isset($_POST['submit']))
		{
		$name=$_POST['name'];
		$user_name=$_POST['username'];
		$pass=$_POST['password'];
		$pass=md5($pass);
		$pass2=$_POST['password2'];
		$pass2=md5($pass2);
	
		if(empty($user_name)||empty($pass)||empty($pass2))
		{
			echo  '<script>alert("OOPS FIELDS CANNOT BE EMPTY!!!")</script>';
		}
		else 
		{
			if ($pass!=$pass2)
		{
			echo  '<script>alert("PASSWORDS ARE NOT MATCHING!!!")</script>';
		}
		
		else
		{  
			$sql="INSERT INTO users(owner,username,password)".
				 "VALUES('$name','$user_name','$pass')";
			$res=mysqli_query($conn,$sql);
			if (!$res)
			{
				die("Query failed!".mysqli_error($conn));
			}
			else
			{
				
				$sql2="CREATE TABLE `".$user_name."`
				       (
							id int primary key AUTO_INCREMENT,
							owner TEXT,
							snippet_name varchar(1000),
							snippet TEXT,
							snippet_url TEXT,
							options varchar(1000)
						)";
				$result=mysqli_query($conn,$sql2);
				$sql3="INSERT INTO snippets(owner)".
				 "VALUES($name)";
				$res2=mysqli_query($conn,$sql2);
				session_start();
				$_SESSION['name']=$name;
				if (!$result)
				{
					
					echo "REGISTRATION UNSUCCESSFUL!!!". mysqli_error($conn);
				}		
				else
						echo '<script>alert("REGISTRATION SUCCESSFUL!!!")</script>';
				
			}
		}
		}
		}
		?>
</body>
</html>
