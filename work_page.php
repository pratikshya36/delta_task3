<?php
	session_start();
	$user_name=$_SESSION['user'];
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
	<title>WORK PAGE</title>
</head>
<style>
	#tab
	{
		margin-left:5%;margin-top:3%;
	}
	#tab3
	{
		margin-left:20%;
	}
	#box
	{
		width:50%;height:50%;border:5%;
	}
	#btn1
	{
		margin-top:3%;cursor:pointer;background-color:black;color:white;
	}
	#btn2
	{
		margin-top:1%;cursor:pointer;margin-left:0.5%;background-color:black;color:white;
	}
	#btn3
	{
		margin-top:1%;cursor:pointer;margin-left:1%;background-color:black;color:white;
	}
	#btn4
	{
		margin-top:1%;cursor:pointer;margin-left:1.5%;background-color:black;color:white;
	}
	#u_button
	{
		margin-top:1%;cursor:pointer;background-color:black;color:white;
	}
	#upload_file
	{
		margin-left:83%;margin-top:-2%;
	}
	#ref
	{
		margin-left:80%;font-size:110%;font-color:red;
	}
	
</style>
<body>
	<p id="ref"><a href="login_page.php?">LOGOUT</a></p>
	<form method="POST" id="tab">
	<textarea rows="20" name="data" id="box" >
	</textarea><br/>
	 <table>	
	        <tr>
			<td>WHAT DO YOU WANT TO SET THE SNIPPET AS?</td>
			<td><input type="radio" name="access" value="private">PRIVATE</td>
			<td><input type="radio" name="access" value="public">PUBLIC</td>
			</tr>
		</table>
	ENTER NAME OF SNIPPET:<input type="text" name="name1" id="snippetname">
	 <table>	
	        <tr>
			<td>DO YOU WANT OTHER USERS TO SEE YOUR NAME ALONG WITH THIS SNIPPET?</td>
			<td><input type="radio" name="option" value="yes">YES</td>
			<td><input type="radio" name="option" value="no">NO</td>
			</tr>
		</table>
	<input type="submit" name="submit1" value="CREATE NEW SNIPPET" id="btn1"/>
	<input type="submit" name="submit2" value="PASTE SNIPPET" id="btn2"/>
	<input type="submit" name="submit3" value="DISPLAY ALL SNIPPETS" id="btn3"/>
	<input type="submit" name="submit4" value="DISPLAY MY SNIPPETS" id="btn4"/>
	</form>
	
	<form action="work_page.php" method="POST" enctype="multipart/form-data" id="upload_file">
	Browse file to upload:</br>
	<input name="file" type="file" id="file"><br>
	<input type="submit" id="u_button" name="submit5" value="Upload the fie">
	</form>
	
		
<?php

	if((isset($_POST['submit1']))||(isset($_POST['submit2'])))
		{
		$name1=$_POST['name1'];
		$data=$_POST['data'];
		$data1=(string)$data;
		$level=$_POST['access'];
		$option=$_POST['option'];
		
		if ($level=="private")
		{
		$sql="INSERT INTO `".$user_name."`(owner,snippet_name,snippet,options)".
				 "VALUES('$name2','$name1','$data1','$option')";
		$res=mysqli_query($conn,$sql);
	;
		}
		if ($level=="public")
		{
		$sql="INSERT INTO `".$user_name."`(owner,snippet_name,snippet,options)".
				 "VALUES('$name2','$name1','$data1','$option')";
		$res=mysqli_query($conn,$sql);
		$sql2="INSERT INTO snippets(owner,snippet_name,snippet,options)".
				 "VALUES('$name2','$name1','$data1','$option')";
		$res2=mysqli_query($conn,$sql2);
		
		}
	
		}
	if(isset($_POST['submit3']))
		{
		
			$res=mysqli_query($conn,"SELECT * FROM snippets");
			echo "<table border=1px>";
			echo "<tr>";
			echo "<th >";echo "SERIAL"; echo "</th>";
			echo "<th width=200px>";echo "SNIPPET NAME"; echo "</th>";
			
			echo "</tr>";
	
			while($row=mysqli_fetch_array($res))
			{ 
				
				echo "<tr>";
				echo "<td>";echo $row["id"]; echo "</td>";
				echo "<td>";echo "<a href='show_all_snippets.php?id=".$row["id"]."'>" .$row["snippet_name"]."</a><br>\n"; echo "</td>";
				
				echo "</tr>";
			}
		}
		if(isset($_POST['submit4']))
		{
			$res=mysqli_query($conn,"SELECT * FROM `".$user_name."` ");
			echo "<table border=1px>";
			echo "<tr>";
			echo "<th >";echo "SERIAL"; echo "</th>";
			echo "<th width=200px>";echo "SNIPPET NAME"; echo "</th>";
			
			echo "</tr>";
	
			while($row=mysqli_fetch_array($res))
			{ 
				echo "<tr>";
				echo "<td>";echo $row["id"]; echo "</td>";
				echo "<td>";echo "<a href='show_my_snippets.php?id=".$row["id"]."'>" .$row["snippet_name"]."</a><br>\n"; echo "</td>";
				
				echo "</tr>";
			}
		}
	if(isset($_POST['submit5']))
	{
			$name=$_FILES['file']['name'];
			$tmp_name=$_FILES['file']['tmp_name'];
		if (isset($name))
		{
			if (!empty($name))
			{
				$location='uploads/';
				if( move_uploaded_file($tmp_name,$location.$name))
				{
					echo '<script>alert("UPLOAD UNSUCCESSFUL!!!")</script>';
				}
			}
			else	
			{
				echo '<script>alert("PLEASE CHOOSE A FILE")</script>';
			}
		}
	}
		
?>

</body>
</html>