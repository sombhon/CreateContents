<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="../icon/icon.ico" />
	<link rel="stylesheet" href="css/dashboard.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ระบบจัดการเบื้อหลังระบบ</title>
</head>

<body>
	<div class="container-fluit">

		<div class="dashboard">

			<div class="sidebar">
				<?php $this->load->view('admincreate\layout\aside_menu'); ?>
			</div>


			<div class="body-dashboard">
				<div class="discount_member">
					<div class="bg-dark col-sm-12 py-2 pl-5 mb-3 shadow">
						<h2 class="m-0 text-light">จัดการข้อมูลสมาชิก</h2>
					</div>
					<div class="row mb-4">
						<div class="col-sm-12">
							<?php if(!empty($this->input->get('userID'))){ 
								$user = $this->user_model->getUserDetails($this->input->get('userID'));
								?>
							<div class="card shadow">
								<div class="card-body h3 pb-2 m-0">
									ข้อมูลผู้ใช้
								</div>
								<hr>
								<div class="card-body">
									<table id="aboutUs" width="100%" cellspacing="10px">
										<tr>
											<th colspan="4" class="pb-4 text-center img">
												<img style="max-height:150px"
													src="<?=base_url()?>assets/uploads/images/profiles/<?=$user->userimg?>"
													alt="รูปภาพประจำตัว">
											</th>
										</tr>
										<tr>
											<th class="px-2" width="15%">E-mail</th>
											<td width="35%"><?=$user->useremail?></td>
										</tr>
										<tr>
											<th class="px-2" width="15%">ชื่อ-สกุล</th>
											<td width="35%"><?=$user->username . '  '. $user->userlastname?></td>
											<th class="px-2" width="15%">นามแฝง</th>
											<td width="35%"><?=$user->usernamea?></td>
										</tr>
										<tr>
											<th class="px-2">วันเกิด</th>
											<td><?=$user->userbirthday?></td>
											<th class="px-2">อายุ</th>
											<td><?=$this->utility->getAge($user->userbirthday)?></td>
										</tr>
										<tr>
											<th class="px-2">เพศ</th>
											<td><?=$user->sextypename?></td>
										</tr>
										<tr>
											<th class="px-2">เบอร์โทร</th>
											<td><?=$user->usertelophone?></td>
										</tr>
										<tr>
											<th class="px-2" style="vertical-align:top;">ที่อยู่</th>
											<td colspan="3"><?php echo $user->useraddress . " " . $user->useradistrict ." " .$user->userprovince; ?></td>
										</tr>
									</table>
								</div>
							</div>
							<?php } else { ?>
							<div class="card shadow">
								<div class="card-body h3 pb-2 m-0">
									ข้อมูลผู้ใช้
								</div>
								<hr>
								<div class="card-body">
									<table id="aboutUs" width="100%" cellspacing="10px">
										<tr>
											<th colspan="4" class="pb-4 text-center img">
												<img style="max-height:150px"
													src="https://eitrawmaterials.eu/wp-content/uploads/2016/09/person-icon.png"
													alt="รูปภาพประจำตัว">
											</th>
										</tr>
										<tr>
											<th class="px-2" width="15%">E-mail</th>
											<td width="35%">...</td>
										</tr>
										<tr>
											<th class="px-2" width="15%">ชื่อ-สกุล</th>
											<td width="35%">...</td>
											<th class="px-2" width="15%">นามแฝง</th>
											<td width="35%">...</td>
										</tr>
										<tr>
											<th class="px-2">วันเกิด</th>
											<td>...</td>
											<th class="px-2">อายุ</th>
											<td>...</td>
										</tr>
										<tr>
											<th class="px-2">เพศ</th>
											<td>...</td>
										</tr>
										<tr>
											<th class="px-2">เบอร์โทร</th>
											<td>...</td>
										</tr>
										<tr>
											<th class="px-2" style="vertical-align:top;">ที่อยู่</th>
											<td colspan="3">...</td>
										</tr>
									</table>
								</div>
							</div>

							<?php } ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card-body bg-dark py-2 mb-2 text-light">
								<h4 class="m-0">ข้อมูลผู้ใช้</h4>
							</div>
							<div class="card shadow">
								<div class="card-body pt-3">
									<div class="table-responsive">
										<table id="aboutUs" width="100%" cellspacing="10px"
											class="table table-dark table-striped">
											<thead>
												<tr class="text-center">
													<th class="" width="3%">ลำดับ</th>
													<th width="">นามแฝง</th>
													<th width="">ชื่อ-สกุล</th>
													<th class="">email</th>
													<th width="10%">วันเกิด</th>
													<th width="8%">สถานะผู้ใช้</th>
													<th width="5%">อายุ</th>
													<th width="12%">เบอร์ติดต่อ</th>
													<th>เมนู</th>
												</tr>
											</thead>
											<tbody>

												<?php 
												$count = 0;
												$variable = array(4,44,44,44,4,4);
												if(isset($userall)){
													foreach ($userall as $user) {
														$user
													?>
												<tr>
													<td width="" class="text-center"><?=++$count?></td>
													<td width=""><?=$user->usernamea?></td>
													<td width=""><?=$user->username."  ".$user->userlastname ?></td>
													<td width=""><?=$user->useremail?></td>
													<td width=""><?=$user->userbirthday?></td>
													<td width=""><?=$user->usertypename?></td>
													<td width=""><?=$this->utility->getAge($user->userbirthday)?></td>
													<td width=""><?=$user->usertelophone?></td>
													<td width="">
														<a class="btn btn-primary" href="<?=base_url()?>admin/create/user?userID=<?=$user->userID?>">ดู</a>
														<a class="btn btn-warning" href="">แก้ไข</a>
														<a class="btn btn-danger" href="">แบน</a>
													</td>
												</tr>
												<?php 
												} }?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>

	</script>
</body>

</html>
