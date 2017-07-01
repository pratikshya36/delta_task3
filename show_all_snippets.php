<?php
	session_start();
	$user_name=$_SESSION['user'];
    if (isset($_GET['id']))
	{
	$host="localhost";
	$dbuser="root";
	$pass="";
	$dbname="test";
	$conn=mysqli_connect($host,$dbuser,$pass,$dbname);
	$id=$_GET["id"];
	$sql="SELECT * FROM snippets WHERE id='$id'";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($res);
	$data=$row["snippet"];	
	$option=$row["options"];
	$owner=$row["owner"];
	if($option=="yes")
	{
	echo "CREATED BY:'".$owner."'";
	}
	}
	
	
?>
<html>
<head>
	<title>SHOW ALL SNIPPETS</title>
</head>
<style>
	#ref
	{
		margin-left:80%;font-size:110%;font-color:red;
	}
	#ref2
	{
		margin-left:80%;font-size:110%;font-color:red;margin-top:1%;
	}
	
</style>

<body>
	<p id="ref"><a href="login_page.php?">LOGOUT</a></p>
	<p id="ref2"><a href="work_page.php?">GO BACK</a></p>
	<link rel="stylesheet" href="styles/hybrid.css">
	<pre><code class="php"><?php echo htmlspecialchars($data);?></code></pre>
</body>
<script>
		window.onload = function() {
		var aCodes = document.getElementsByTagName('pre');
		$['code'].removeClass('javascript');
		$['code'].addClass('php');
		for (var i=0; i < aCodes.length; i++) {
        hljs.highlightBlock(aCodes[i]);
		}
		};
</script>
</html>	