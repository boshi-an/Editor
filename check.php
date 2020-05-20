<?php
	session_start();
	include "functions.php";
	$_SESSION["password"] = $_POST["password1"];
	$connection = establish_connection();
?>
<?php
	$mysql_command = "SELECT * FROM `flags` WHERE `name` LIKE 'editor_password'";
	$result = mysqli_fetch_array(mysqli_query($connection, $mysql_command));
	$_SESSION["required_password"] = $result["var"];
	# echo("required : "); print_r($_SESSION['required_password']);
	# echo("inputed : "); print_r($_SESSION['password']);
	
	if($_SESSION["password"] == $_SESSION["required_password"])
	{
		?>
		<script>alert("登陆成功"); location.href="edit.php";</script>
		<?php
	}
	else
	{
		?>
		<script>alert("登陆失败"); location.href="index.php";</script>
		<?php
	}
?>