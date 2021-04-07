<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="<?=base_url()?>assets/uploads/images/icon/CC_admin_logo.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

	<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/style.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/ad_ebook_type.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/admin/css/dashboard.css?t=<?=time()?>">
	<title></title>
</head>

<body>
	<header>
		<div class="container-fluit">
			<div class="row">
				<div class="col-lg-4 d-flex" style="align-items:center">
					<div class="logo">
						<a href="<?=base_url()?>admin/create">Create Contents</a>
					</div>
					
				</div>
				<div class="col-lg-8">
					<ul class="logoutmenu">
						<?php if(!empty($this->session->userdata("admin_login"))){
                            $emp = $this->session->userdata("admin_login");
                        ?>
						<li><?=$emp->empname . "  " . $emp->emplastname?></li>
						<li><a href="<?=base_url()?>admin/authen/logout">logout</a></li>
						<?php  } ?>
					</ul>
				</div>
			</div>
		</div>
	</header>
</body>

</html>
