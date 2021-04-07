<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ประวัติส่วนตัว</title>
</head>

<body>

	<div class="container my-4">
		<div class="row">
			<h3> <em class="fa fa-user"></em> ประวัติส่วนตัว</h3><a class="ml-3 mb-3 btn btn-warning"
				href="">แก้ไขข้อมูลส่วนตัว</a>
		</div>
		<div class="row">
			<div class="col-sm-4 ">
				<div class="card bg-light shadow">
					<h5 class="p-2 text-center">ข้อมูลส่วนตัว</h5>
					<div class="card-header">
						<img class="img-fluid"
							src="<?php echo base_url() ?>assets/uploads/images/profiles/<?php echo $user->userimg ?>"
							alt="ภาพโปรไฟล์" srcset="">
					</div>
					<div class="card-body">
						<style>
							#aboutUs th,
							td {
								padding-top: 7px;
								padding-bottom: 7px;
							}

						</style>
						<table id="aboutUs" width="100%" cellspacing="10px">
							<tr>
								<th class="px-2" width="25%">ชื่อ</th>
								<td><?php echo $user->usernamea ?></td>
							</tr>
							<tr>
								<th class="px-2">อายุ</th>
								<td><?php echo $user->username."&nbsp&nbsp". $user->userlastname ?></td>
							</tr>
							<tr>
								<th class="px-2">เพศ</th>
								<td><?php echo $user->sextypename ?></td>
							</tr>
							<tr>
								<th class="px-2">อายุ</th>
								<td><?php echo $this->utility->getAge($user->userbirthday);?></td>
							</tr>
							<tr>
								<th class="px-2">เบอร์โทร</th>
								<td><?php echo $user->usertelophone ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="ml-3 card shadow p-3 mb-4">
					<div class="card-body h3">
						เกี่ยวกับเรา
					</div>
					<hr>
					<div class="card-body">
						<table id="aboutUs" width="100%" cellspacing="10px">
							<tr>
								<th class="px-2" width="15%">E-mail</th>
								<td width="35%"><?php echo $user->useremail?></td>
							</tr>
							<tr>
								<th class="px-2" width="15%">ชื่อ-สกุล</th>
								<td width="35%"><?php echo $user->username ."  ".$user->userlastname ?></td>
								<th class="px-2" width="15%">นามแฝง</th>
								<td width="35%"><?php echo $user->usernamea ?></td>
							</tr>
							<tr>
								<th class="px-2">วันเกิด</th>
								<td><?php echo $user->userbirthday ?></td>
								<th class="px-2">อายุ</th>
								<td><?php echo $this->utility->getAge($user->userbirthday) ?></td>
							</tr>
							<tr>
								<th class="px-2">เพศ</th>
								<td><?php echo $user->sextypename ?></td>
							</tr>
							<tr>
								<th class="px-2">เบอร์โทร</th>
								<td><?php echo $user->usertelophone ?></td>
							</tr>
							<tr>
								<th class="px-2" style="vertical-align:top;">ที่อยู่</th>
								<td colspan="3">
									<?php echo $user->useraddress . " " . $user->useradistrict ." " .$user->userprovince; ?>
								</td>
							</tr>
						</table>


						<?php if($user->usertypeID == 'UT01') {?>
						<hr>

						<div id="btn-change_typeUser" class="btn text-light bg-secondary">เปิดการใช้งานสถานะผู้เขียน
						</div>
						<form id="frm-changeTypeUser" action="<?=base_url()?>user/change_type_user" method="post">
							<input name="pwu" type="hidden" id="changeTypeUser">
						</form>
						<?php } ?>
					</div>
				</div>

				<?php if($user->usertypeID == 'UT02') {?>
				<div class="ml-3 card shadow p-3">
					<div class="card-body h3">
						ข้อมูลสำหรับผู้เขียน
					</div>
					<hr>
					<div class="card-body">
					</div>
				</div>
				<?php }?>
			</div>
		</div>
	</div>

	<script>
		$('#btn-change_typeUser').click(function () {
			Swal.fire({
				title: 'ต้องการเปลี่ยนสถานะเป็นผู้เขียนจริง หรือไม่ ? <br>กรุณากรอกรหัสผ่านเพื่อยืนยัน',
				input: 'text',
				showCancelButton: true,
				confirmButtonText: 'ใช่',
			}).then((result) => {
				if (result.isConfirmed) {
					if (result.value !== '' && result.value !== null) {
						$('#changeTypeUser').val(result
							.value)
						$('#frm-changeTypeUser').submit()
					} else {
						Swal.fire('ไม่ได้กรอกรหัสผ่าน', 'กรุณากรอกรหัสผ่านให้เรียบร้อย', "error");
					}
				} else {}
			})
		})

	</script>
</body>

</html>
