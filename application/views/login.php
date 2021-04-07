<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="icon/icon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Contents : login to website</title>
</head>

<body>
	<div class="container-group">
		<div class="container">
			<div class="row">
				<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
					<div class="card card-signin my-5">
						<div class="card-body">
							<h5 class="card-title text-center">เข้าสู่ระบบ</h5>
							<form class="form-signin" action="<?=base_url()?>authen/login_check" method="post">
								<div class="form-label-group mb-3">
									<label for="inputEmail">อีเมล์</label>
									<input type="email" id="inputEmail" name="email" class="form-control"
										placeholder="Email address" required="" autofocus="">
								</div>
								<div class="form-label-group mb-3">
									<label for="inputPassword">รหัสผ่าน</label>
									<input type="password" id="inputPassword" class="form-control" name="password"
										placeholder="Password" required="required">
								</div>
								<?php
									if ($this->session->flashdata("login_error") != null) {
										$this->utility->error_box($this->session->flashdata("login_error"));
									}
								?>
								<div class="mb-3">
									<a href="" style="text-decoration:underline">ลืมรหัสผ่าน</a>
								</div>
								<button class="btn btn-lg btn-primary btn-block text-uppercase"
									type="submit">เข้าสู่ระบบ</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
