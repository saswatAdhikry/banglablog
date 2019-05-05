<?php include 'config.php';
		include 'MyDatabase.php';
?>
<?php 
	$DB = new MyDatabase();
	if(isset($_POST['submit'])){
		$name = mysqli_real_escape_string($DB->link, $_POST['name']);
		$email = mysqli_real_escape_string($DB->link, $_POST['email']);
		$skill = mysqli_real_escape_string($DB->link, $_POST['skill']);
		if($name=='' || $email=='' || $skill==''){
				$error = "Fields must not be empty!";
		}else{
			$query = "INSERT into tbl_user(name, email, skill) VALUES('$name','$email','$email')";
			$create = $DB->insert($query);
		}
	}
?>
<!doctype html>
<html>
<head>
<head>
	<title>PHP Syntax</title>
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class= "phpcoding">
<?php include 'inc/header.php';?>


<section class="mainContent">
<?php
	if(isset($error)){
		echo "<span style='color: red'>ERROR MESSEGE: ".$error."</span>";
	}
?>
<form action="crud_create.php" method="post">
<table class="table">
<tr>
	<td>Name</td>
	<td><input type="text" name="name" placeholder="Enter Your Name.."/></td>
</tr>
<tr>
	<td>Email</td>
	<td><input type="text" name="email" placeholder="Enter Your email"/></td>
</tr>
<tr>
	<td>Skill</td>
	<td><input type="text" name="skill" placeholder="Enter Your Skill"/></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Submit"/>
	<input type="reset" value="cancel" />
	</td>
</tr>
</table>
</form>
<a href="index.php">Go Back</a>
</section>
<?php include 'inc/footer.php'?>
</div>
</body>
</html>