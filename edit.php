<?php
	session_start();
	if($_SESSION["password"] != $_SESSION["required_password"])
	{
		?>
		<script>url="index.php";window.location.href=url;</script>
		<?php
	}
	include "functions.php";
	$connection = establish_connection();
	$label_name_map;
	$products = get_types($connection, "drink_types");
	while($row = mysqli_fetch_row($products)) $label_name_map[$row[1]] = $row[0];
?>
<!DOCTYPE html>
<html>
<?php include 'header.php' ?>
<section class="section">
	<div class="row py-3">
		<div class="col-sm-4">
			<div class="card shadow">
				<div class="card-body">
					<form id="change_users" action="change_users.php" method="post">
						<div class="text-center">
							<h2> 待审核用户 </h2>
						</div>
						<hr>
						<?php $unconfirmed_user_list = get_unconfirmed($connection, "users"); ?>
						<div class="col">
						<?php
							while($row = mysqli_fetch_array($unconfirmed_user_list))
							{
								?>
									<div class="mb-3 mt-5">
										<text class="font-weight-bold">
											<?php echo($row['reg_time']); ?>
											<?php echo(" · "); ?>
											<?php echo($row['name']); ?>
										</text>
									</div>
									<button type="submit" name="edit_user" value="<?php echo($row['id']); ?> accept" class="btn btn-primary">
										Accept
									</button>
									<button type="submit" name="edit_user" value="<?php echo($row['id']); ?> reject" class="btn btn-warning">
										Reject
								</button>
								<?php
							}
						?>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card shadow">
				<div class="card-body">
					<form id="change_requests1" action="change_requests.php" method="post">
						<div class="text-center">
							<h2> 订单队列 </h2>
						</div>
						<hr>
						<?php $unconfirmed_user_list = get_unconfirmed($connection, "requests", 10, 0); ?>
						<div class="col">
							<?php
								while($row = mysqli_fetch_array($unconfirmed_user_list))
								{
									?>
										<div class="mt-5 mb-1">
											<text class="font-weight-bold">
												<?php echo($row['request_time']); ?>
												<?php echo(" · "); ?>
												<?php echo($row['user_name']); ?>
											</text>
										</div>
										<div class="mt-1 mb-1">
											<text class="font-weight-bold">
												<?php echo($label_name_map[$row['product_label']]); ?>
												<?php echo(" · "); ?>
												<?php echo($row['product_temperature']); ?>
											</text>
										</div>
										<div class="mt-1 mb-1">
											<text class="text-primary">
												<?php echo('备注: '); ?>
												<?php if(empty($row['product_addition'])) echo('无'); else echo($row['product_addition']); ?>
											</text>
										</div>
										<button type="submit" name="edit_request" value="<?php echo($row['request_id']); ?> accept" class="btn btn-primary">
											Accept
										</button>
										<button type="submit" name="edit_request" value="<?php echo($row['request_id']); ?> reject" class="btn btn-warning">
											Reject
									</button>
									<?php
								}
							?>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card shadow">
				<div class="card-body">
					<form id="change_requests2" action="change_requests.php" method="post">
						<div class="col">
							<div class="text-center">
								<h2> 订单队列 </h2>
							</div>
							<hr>
							<?php $undelivered_user_list = get_unconfirmed($connection, "requests", 10, 1); ?>
							<?php
								while($row = mysqli_fetch_array($undelivered_user_list))
								{
									?>
										<div class="mt-5 mb-1">
											<text class="font-weight-bold">
												<?php echo($row['request_time']); ?>
												<?php echo(" · "); ?>
												<?php echo($row['user_name']); ?>
											</text>
										</div>
										<div class="mt-1 mb-1">
											<text class="font-weight-bold">
												<?php echo($label_name_map[$row['product_label']]); ?>
												<?php echo(" · "); ?>
												<?php echo($row['product_temperature']); ?>
											</text>
										</div>
										<div class="mt-1 mb-1">
											<text class="text-primary">
												<?php echo('备注: '); ?>
												<?php if(empty($row['product_addition'])) echo('无'); else echo($row['product_addition']); ?>
											</text>
										</div>
										<button type="submit" name="edit_request" value="<?php echo($row['request_id']); ?> delivered" class="btn btn-primary">
											Delivered
										</button>
										<button type="submit" name="edit_request" value="<?php echo($row['request_id']); ?> missed" class="btn btn-warning">
											Missed
									</button>
									<?php
								}
							?>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include 'footer.php' ?>