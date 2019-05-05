<?php include 'config.php';
		include 'MyDatabase.php';
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
<?php 
$DB = new MyDatabase();
$query = "SELECT * from tbl_user";
$read = $DB->select($query);
?>

<section class="mainContent">
<table class="table">
<tr>
	<th width="25%">Name</th>
	<th width="25%">Email</th>
	<th width="25%">Skill</th>
	<th width="25%">Action</th>
	
</tr>
<?php if($read){?>
<?php while($row = $read->fetch_assoc()){?>
<tr>
	<td><?php echo $row['name'];?></td>
	<td><?php echo $row['email'];?></td>
	<td><?php echo $row['skill'];?></td>
	<td><a href="update.php?id=<?php echo $row['id'];?>">Edit</a></td>
</tr>
<?php }?>
<?php } else {?>
<p> DATA Not Available!</p>
<?php }?>
</table>

</section>
<?php include 'inc/footer.php'?>
</div>
</body>
</html>