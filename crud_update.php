<?php include 'config.php';
		include 'MyDatabase.php';
?>

<?php 
	$id=$_GET['id'];
	$DB = new MyDatabase();
	$query = "SELECT * from tbl_user WHERE id=$id";
	$getData = $DB->select($query)->fetch_assoc();
	if(isset($_POST['submit'])){
		$name = mysqli_real_escape_string($DB->link, $_POST['name']);
		$email = mysqli_real_escape_string($DB->link, $_POST['email']);
		$skill = mysqli_real_escape_string($DB->link, $_POST['skill']);
		if($name=='' || $email=='' || $skill==''){
				$error = "Fields must not be empty!";
		}else{
			$query = "UPDATE tbl_user
			SET
			name = '$name',
			email = '$email',
			skill = '$skill'
			WHERE
			id = $id;
			";
			
			$create = $DB->update($query);
		}
	}
?>
<?php
	if(isset($_POST['delete'])){
		$query = "DELETE from tbl_user WHERE id=$id";
		$deleteData = $DB->delete($query);
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
<form action="crud_update.php?id=<?php echo $id;?>" method="post">
<table class="table">
<tr>
	<td>Name</td>
	<td><input type="text" name="name" value="<?php echo $getData['name'];?>"/></td>
</tr>
<tr>
	<td>Email</td>
	<td><input type="text" name="email" value="<?php echo $getData['email'];?>"/></td>
</tr>
<tr>
	<td>Skill</td>
	<td><input type="text" name="skill" value="<?php echo $getData['skill'];?>"/></td>
</tr>
<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Update"/>
	<input type="submit" name="delete" value="Delete"/>
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