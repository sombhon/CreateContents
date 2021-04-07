<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/dashboard.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ระบบจัดการเบื้อหลังระบบ</title>
</head>

<body>
	<div class="container-group-dash">
		<div class="dashboard">
			<div class="sidebar">
				<?php $this->load->view('admincreate\layout\aside_menu');?>
			</div>
			<div class="body-dashboard">
				<div class="discount_member">
					<h2>
						<b>กำหนดส่วนลดให้กับผู้ใช้งาน</b>
					</h2>
					<br>
					<!-- แจ้งสถานะจากเซิฟเวอร์ -->
					<?php
						if ($this->session->flashdata("ms_success")) {
						echo "<p class=\"alert alert-info\" style=\"font-weight:bold\">" . $this->session->flashdata("ms_success") . "</p>";
					}

					if ($this->session->flashdata("ms_error")) {
						echo "<p class=\"alert alert-danger\" style=\"font-weight:bold\">" . $this->session->flashdata("ms_error") . "</p>";
					}
					?>
					<!-- สิ้นสุดแจ้งสถานะจากเซิฟเวอร์ -->
					<?php
						if(!empty($this->input->get("scoreid"))) {
						$scdis = $this->scorediscount_model->getScoreDiscountById($this->input->get("scoreid"));
					?>
					<!-- ฟอร์มรับข้อมูลแก้ไขข้อมูล -->
					<p class="alert alert-info" style="font-weight: bold">
						แก้ไขข้อมูลส่วนลด :
						<?=$scdis->scorename?>
					</p>
					<form class="discout-mem" action="./editScorediscount" method="post">
						<input type="hidden" class="form-control" id="scoreid" name="scoreid"
							value="<?=$scdis->scoreID?>">
						<table>
							<tr>
								<td>ชื่อคะแนนส่วนลด</td>
								<td><input required="required" class="input" type="text" name="scorename" id=""
										placeholder="กรอกชื่อคะแนนส่วนลด เช่น ส่วนลด 15 %"
										value="<?=$scdis->scorename?>"></td>
							</tr>
							<tr>
								<td>จำนวนคะแนน</td>
								<td><input required="required" class="input" type="text" name="scorenum" id=""
										placeholder="กรอกจำนวนคะแนนขั้นต่ำสำหรับการลดราคา"
										value="<?=$scdis->scorenum?>"></td>
							</tr>
							<tr>
								<td>เปอร์เซ็นต์ลดราคา</td>
								<td><input required="required" class="input" type="text" name="scoreper" id=""
										placeholder="กรอกเปอร์เซ็นสำหรับส่วนลด เช่น 15.00"
										value="<?=$scdis->scoreper?>"></td>
							</tr>
							<tr>
								<td>รายละเอียดคะแนนส่วนลด</td>
								<td><input class="input" type="text" name="scorediscountdetail"
										id="" placeholder="กรอกรายละเอียด (ถ้ามี)"
										value="<?=$scdis->scoredetails?>">
								</td>
							</tr>
						</table>
						<input class="btn btn-primary" type="submit" value="แก้ไขข้อมูล">
					</form>
					<br>
					<!-- สิ้นสุดฟอร์มรับข้อมูลแก้ไขข้อมูล -->
					<?php
						} else {
					?>
					<!-- ฟอร์มรับข้อมูลเพิ่มข้อมูล -->
					<form class="discout-mem" action="<?=base_url()?>admin/create/insertScorediscount" method="post">
						<table>
							<tr>
								<td>ชื่อคะแนนส่วนลด</td>
								<td><input required="required" class="input" type="text" name="scorename" id=""
										placeholder="กรอกชื่อคะแนนส่วนลด เช่น ส่วนลด 15 %"></td>
							</tr>
							<tr>
								<td>จำนวนคะแนน</td>
								<td><input required="required" class="input" type="text" name="scorenum" id=""
										placeholder="กรอกจำนวนคะแนนขั้นต่ำสำหรับการลดราคา"></td>
							</tr>
							<tr>
								<td>เปอร์เซ็นต์ลดราคา</td>
								<td><input required="required" class="input" type="text" name="scoreper" id=""
										placeholder="กรอกเปอร์เซ็นสำหรับส่วนลด เช่น 15.00"></td>
							</tr>
							<tr>
								<td>รายละเอียดคะแนนส่วนลด</td>
								<td><input required="required" class="input" type="text" name="scoredetails"
										id="" placeholder="กรอกรายละเอียด (ถ้ามี)"></td>
							</tr>
						</table>
						<input class="btn btn-primary" type="submit" value="บันทึกข้อมูล"> <input class="btn btn-danger"
							type="reset" value="ยกเลิก">
					</form>
					<br>
					<?php
						}
					?>
					<!-- สิ้นสุดฟอร์มรับข้อมูลเพิ่มข้อมูล -->
					<table class="showtbetype table table-striped table-hover table-dark">
						<thead>
							<tr>
								<th>ลำดับ</th>
								<th>ชื่อคะแนนส่วนลด</th>
								<th>คะแนนขั้นต่ำ</th>
								<th>อัตราส่วนลด</th>
								<th>รายละเอียด</th>
								<th>แก้ไข</th>
								<th>รายลบ</th>
							</tr>
						</thead>
						<tbody>
							<!-- //////////// ดึงข้อมูลแสดงในตาราง  -->
							<?php
								$scdisList = $this->scorediscount_model->getScdiscountAll();
								$x = 0;
								foreach ($scdisList as $Scdis) {
							?>
							<tr class="tb-hover-row">
								<th scope="row"><?=++$x?></th>
								<td><?=$Scdis->scorename?></td>
								<td><?=$Scdis->scorenum?></td>
								<td><?=$Scdis->scoreper?></td>
								<td><?=$Scdis->scoredetails?></td>
								<td><a class="btn btn-warning"
										href="discount_member?scoreid=<?=$Scdis->scoreID?>">แก้ไข</a></td>
								<td><a class="btn btn-danger"
										href="deleteScorediscount/<?=$Scdis->scoreID?>">ลบ</a></td>
							</tr>
							<?php
								}
							?>
							<!-- ////////// สิ้นสุดดึงข้อมูลแสดงในตาราง -->
						</tbody>
					</table>
				</div>
			</div>

		</div>
		<div class="forfooter-dash"></div>
	</div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>

	</script>
</body>

</html>
