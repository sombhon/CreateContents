<!DOCTYPE html>
<html lang="en">

<head>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	<link rel="shortcut icon" href="<?=base_url()?>assets/uploads/images/icon/icon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
	<script src="<?=base_url()?>assets/js/script.js"></script>

</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<!-- Brand -->
			<a class="navbar-brand" href="<?=base_url() ?>">Create Contents</a>
			<!-- toggle symbol -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- main-menu -->
			<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
				<ul class="navbar-nav navbar-dark ">
					<?php 
					if($this->session->userdata("user_login") != null) {
						$user = $this->session->userdata("user_login");
					?>
					<li class="nav-item"><a class="nav-link" href="<?=base_url()?>addebook">เพิ่มหนังสือ</a></li>
					<li class="nav-item"><a class="nav-link" href="<?=base_url()?>library">หนังสือของฉัน</a></li>
					<li class="nav-item nav-link">|</li>
					<li class="nav-item"><a class="nav-link"
							href="<?=base_url()?>user"><?=$user->username . "   " . $user->userlastname?>
						</a></li>
					<li class="nav-item"><a class="nav-link bg-primary text-light"
							href="<?=base_url()?>authen/logout">ออกจากระบบ</a></li>
					<?php
						} else {
					?>
					<li class="nav-item"><a class="nav-link btn-primary color-white" style="border-radius:5px;color:white;margin-right:5px" href="<?=base_url()?>authen/login">เข้าสู่ระบบ</a></li>
					<li class="nav-item"><a class="nav-link btn-danger register" href="<?=base_url()?>authen/register">สมัครสมาชิก</a>
					</li>
					<?php
						}
					?>
				</ul>
			</div>
		</nav>
	</header>
	<div class="menu">
		<ul class="nav justify-content-center">
			<li class="nav-item"><a class="nav-link" href="<?=base_url()?>">หน้าแรก</a></li>
			<li class="nav-item"><a class="nav-link" href="<?=base_url()?>packread">แพ็คเหมาอ่าน</a></li>
		</ul>
	</div>
	</head>
</body>

</html>
