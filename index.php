<?php
	session_start();
	include "functions.php";
?>
<!DOCTYPE html>
<html>
<?php include 'header.php' ?>

<?php
	function verify()
	{
		?>
		<section class="section">
			<div class="row justify-content-center">
				<div class="col-lg-6 align-items-center">
					<div class="card shadow">
						<div class="card-body">
							<div class="tab-content" id="myTabContent">
								<form action="check.php" method="post" name="register">
									<div class="col">
										<div class="row justify-content-center mb-3">
											<h1 class="font-weight-bold">验证管理员身份</h1>
										</div>
										<div class="row mb-3">
											<h5 class="font-weight-bold">密码：</h5>
											<input type="password" name="password1" placeholder="比如: zyfzyfzyf" class="form-control form-control-alternative" required="required">
										</div>
										<div class="row justify-content-center">
											<button type="submit" class="btn btn-primary">确认</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
?>

<?php
	verify();
?>

<?php include 'footer.php' ?>