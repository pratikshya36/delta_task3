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
	#ref
	{
		margin-left:80%;font-size:110%;font-color:red;
	}
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
		border-radius:10%;margin-left:50%;padding:1% 1%;background-color:yellow;cursor:pointer;margin-top:30%;
	}
	#submitbtn2
	{
		border-radius:10%;margin-left:20%;padding:1% 1%;background-color:yellow;cursor:pointer;margin-top:10%;
	}
	#submitbtn3
	{
		border-radius:10%;margin-left:15%;padding:1% 1%;background-color:yellow;cursor:pointer;margin-top:20%;
	}
	#instructions
	{
	   position:fixed; 
       margin-bottom:10%;margin-left:4.5%;   
       text-align: center;    
       bottom: 0%; 
       width: 100%;text-align:left;
   }
     #instructions1
	{
	   position:fixed; 
	   margin-top:5%;
       margin-bottom:5%;	   
       text-align: center;margin-left:3%;   
       bottom:0%; 
       width: 100%;text-align:left;
	}
	#heading
	{
		margin-top:-6%;margin-left:40%;
	}
</style>
<body>
	<p id="ref"><a href="login.php?">LOGOUT</a></p>		
	<p id="ref"><a href="accesspage.php?">GO TO ACCESS LEVEL PAGE</a></p>
	<h1 id="heading">BULLETIN BOARD</h1>
	<p id="instructions"><strong>SOME INSTRUCTIONS</strong></p>
	<ul id ="instructions1">
		<li>ENTER THE DATA IN THE RESPECTIVE FIELDS AND THEN CLICK "ADD" TO ADD THE ROW TO THE TABLE</li>
		<li>CLICK ON DISPLAY BUTTON TO DISPLAY NOTES' TABLE</li>
		<li>ENTER THE DATA IN THE RESPECTIVE FIELDS AND THEN CLICK "DELETE" TO DELETE THE ROW</li>
	</ul>
	<form  method="POST">
		<table class="tab" >
			<tr>
			<td>SUBJECT</td>
			<td><input type="text" name="subject" ></td>
			</tr>
			<tr>
			<td>NOTE</td>
			<td ><input type="text" name="note"></td>
			</tr>
			<tr>
			<td><input type="submit" name="submit1" id="submitbtn1" value="ADD"></td>
			<td><input type="submit" name="submit2" id="submitbtn2" value="DISPLAY THE TABLE"></td>
			<td><input type="submit" name="submit3" id="submitbtn3" value="DELETE NOTE"></td>
			</tr>
		</table>
	</form>
<?php
		if(isset($_POST['submit1']))
		{
			$subject=$_POST['subject'];
			$note=$_POST['note'];
			$sql="INSERT INTO student_notes(subject,note)".
			"VALUES('$subject','$note')";
			$res=mysqli_query($conn,$sql);
			if (!$res)
			{
				die("Query failed!".mysqli_error($conn));
			}	
		}
		if(isset($_POST['submit2']))
		{
			$res=mysqli_query($conn,"SELECT * FROM student_notes");
			echo "<table border=1 width=100px>";
			echo "<tr>";
			echo "<th width=10px>";echo "SERIAL"; echo "</th>";
			echo "<th width=40px>";echo "SUBJECT"; echo "</th>";
			echo "<th height=30px >";echo "NOTE"; echo "</th>";
			echo "</tr>";
	
			while($row=mysqli_fetch_array($res))
			{
				echo "<tr>";
				echo "<td>";echo $row["id"]; echo "</td>";
				echo "<td>";echo $row["subject"]; echo "</td>";
				echo "<td height=50px>";echo $row["note"]; echo "</td>";
				echo "</tr>";
			}
		}
		if(isset($_POST['submit3']))
		{
			$subject=$_POST['subject'];
			$note=$_POST['note'];
			$sql="DELETE FROM student_notes WHERE subject='$subject'&& note='$note'";
			$res=mysqli_query($conn,$sql);
			if (!$res)
			{
				die("Query failed!".mysqli_error($conn));
			}	
		}
		
?>
</body>
</html>