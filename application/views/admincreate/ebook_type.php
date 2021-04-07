<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="icon" type="image/png" href="../icon/icon.ico" />
	<link rel="stylesheet" href="css/dashboard.css">
	<link rel="stylesheet" href="css/ad_ebook_type.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ระบบจัดการเบื้อหลังระบบ</title>
</head>

<body>
	<div class="container-fluit">
		<div class="dashboard">
			<div class="sidebar">
				<?php $this->load->view('admincreate\layout\aside_menu');?>
			</div>
			<div class="body-dashboard">
				<div class="ebook_type">
					<!-- ทำงานเมมื่อคลิ๊แก้ไขข้อมูล -->
					<?php
						if (!empty($this->input->get("etypeid"))) {
							$etype = $this->ebook_model->getETypeById($this->input->get('etypeid'));
					?>
					<h2>
						<b>แก้ไขข้อมูลประเภท E-book</b>
					</h2>
					<br>
					<form class="input_etype" action="<?=base_url()?>admin/create/ebook_type_update" method="post">
						<table>
							<tr>
								<td>รหัสประเภท E-book</td>
								<td><input class="input" type="text" name="ebooktypeID" id="ebooktypeID"
										value="<?=$etype->ebooktypeID?>"
										placeholder="รหัสประเภท E-bookอัตโนมัติ (2ตัวอักษร)" readonly="readonly"></td>
							</tr>
							<tr>
								<td>ชื่อประเภท E-book</td>
								<td><input class="input" type="text" name="ebooktypename" id="ebooktypename"
										value="<?=$etype->ebooktypename?>" placeholder="กรอกชื่อประเภท E-book"></td>
							</tr>
							<tr>
								<td>รายละเอียด</td>
								<td><input class="input" type="text" name="ebooktypedetail" id="ebooktypedetail"
										value="<?=$etype->ebooktypedetails?>" placeholder="กรอกรายละเอียด (ถ้ามี)">
								</td>
							</tr>
						</table>
						<input class="btn btn-primary" type="submit" value="บันทึกการแก้ไข">
					</form>
					<br>
					<!-- ทำงานเมื่อเปิดรันมาปกติ -->
					<?php
						} else {
						$rnetype = $this->runnum_model->getRunEtype();
					?>
					<h2>
						<b>เพิ่มข้อมูลประเภท E-book</b>
					</h2>
					<br>
					<?php
							if ($this->session->flashdata("ms_etype_error")) {
								$this->utility->error_box($this->session->flashdata("ms_etype_error"));
							}
							if ($this->session->flashdata("ms_etype_success")) {
							$this->utility->success_box($this->session->flashdata("ms_etype_success"));
							}
						?>
					<form class="input_etype" action="<?=base_url()?>admin/create/ebook_type_insert" method="post">
						<table>
							<tr>
								<td>รหัสประเภท E-book</td>
								<td><input class="input" type="text" name="ebooktypeID" id="ebooktypeID"
										value="<?=$rnetype?>" placeholder="รหัสประเภท E-bookอัตโนมัติ (2ตัวอักษร)"
										readonly="readonly"></td>
							</tr>
							<tr>
								<td>ชื่อประเภท E-book</td>
								<td><input class="input" type="text" name="ebooktypename" id="ebooktypename"
										placeholder="กรอกชื่อประเภท E-book"></td>
							</tr>
							<tr>
								<td>รายละเอียด</td>
								<td><input class="input" type="text" name="ebooktypedetail" id="ebooktypedetail"
										placeholder="กรอกรายละเอียด (ถ้ามี)"></td>
							</tr>
						</table>
						<input class="btn btn-primary" type="submit" value="บันทึกข้อมูล"> <input class="btn btn-danger"
							type="reset" value="รีเซ็ตข้อมูล">
					</form>
					<?php
						}
					?>
					<table class="showtbetype table table-striped table-hover table-dark">
						<thead>
							<tr>
								<th>ลำดับ</th>
								<th>รหัสประเภท E-book</th>
								<th>ชื่อประเภท E-book</th>
								<th>รายละเอียด</th>
								<th>แก้ไข</th>
								<th>ลบ</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$etypes = $this->ebook_model->getEbookType();
								$x = 0;
								foreach ($etypes as $etype) {
							?>
							<tr class="tb-hover-row" id="tb-hover-row<?=++$x?>">
								<th scope="row"><?=$x?></th>
								<td id="etypeId<?=$x?>"><?=$etype->ebooktypeID?></td>
								<td id="etypeName<?=$x?>"><?=$etype->ebooktypename?></td>
								<td id="etypeDetail<?=$x?>"><?=$etype->ebooktypedetails?></td>
								<td><a class="btn btn-warning"
										href="ebook_type?etypeid=<?=$etype->ebooktypeID?>">แก้ไข</a>
								</td>
								<td><a class="btn btn-danger"
										href="deleteEbooktype?etypeid=<?=$etype->ebooktypeID?>">ลบ</a></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div> <!-- <body-DashBoard> -->
		</div>
	</div>
</body>
</html>