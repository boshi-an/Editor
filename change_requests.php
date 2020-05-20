<?php
	session_start();
	include "functions.php";
	$connection = establish_connection();
?>
<!DOCTYPE html>
<html>
<?php
	$operation = explode(" ", $_POST['edit_request']);
	$change_time = date("Y-m-d H:i:s");
	if($operation[1] == 'accept') $sql_operation = "UPDATE `requests` SET `confirmed`=1, `confirm_time`='$change_time' WHERE `request_id`=$operation[0]";
	else if($operation[1] == 'reject') $sql_operation = "UPDATE `requests` SET `confirmed`=-1, `confirm_time`='$change_time' WHERE `request_id`=$operation[0]";
	else if($operation[1] == 'missed') $sql_operation = "UPDATE `requests` SET `confirmed`=-2, `confirm_time`='$change_time' WHERE `request_id`=$operation[0]";
	else if($operation[1] == 'delivered') $sql_operation = "UPDATE `requests` SET `confirmed`=2, `confirm_time`='$change_time' WHERE `request_id`=$operation[0]";
	else die("unidentified change_requests parameter!");
	mysqli_query($connection, $sql_operation);
?>
<script type='text/javascript'>location.href='edit.php';</script>
</html>