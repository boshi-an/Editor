<?php
	session_start();
	include "functions.php";
	$connection = establish_connection();
?>
<!DOCTYPE html>
<html>
<?php
	$operation = explode(" ", $_POST['edit_user']);
	if($operation[1] == 'accept') $sql_operation = "UPDATE `users` SET `confirmed`=1 WHERE id=$operation[0]";
	else if($operation[1] == 'reject') $sql_operation = "UPDATE `users` SET `confirmed`=2 WHERE id=$operation[0]";
	else die("unidentified change_users parameter!");
	mysqli_query($connection, $sql_operation);
?>
<script type='text/javascript'>location.href='edit.php';</script>
</html>