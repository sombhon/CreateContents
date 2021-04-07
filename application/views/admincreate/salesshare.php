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
					<h2>ส่วนแบ่งยอดขายของนักเขียน</h2>
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
					<!-- ตรวจสอบการแก้ไข -->
					<?php if (!empty($this->input->get('sshareId'))) {
                            $saleshare = $this->salesshare_model->getsalesshareById($this->input->get('sshareId'));
                        ?>
					<!-- ฟอร์มแก้ไขข้อมูล -->
					<p class="alert alert-info" style="font-weight: bold">
						แก้ไขข้อมูลส่วนแบ่งยอดขาย :
						<?php echo $saleshare->ssharename ?>
					</p>
					<form action="editSalesshare_submit" method="post">
						<table>
							<tr>
								<!-- รันรหัสส่วนแบ่งยอดขาย -->
								<td>รหัสส่วนแบ่งยอดขาย</td>
								<td><input required="required" size="10" value="<?php echo $saleshare->sshareID ?>" class="input"
										type="text" name="sshareID" id="" placeholder="กรอกรหัสส่วนแบ่งยอดขาย"
										readonly="readonly"></td>
							</tr>
							<tr>
								<td>ชื่อส่วนแบ่งยอดขาย</td>
								<td><input required="required" value="<?php echo $saleshare->ssharename ?>" class="input"
										type="text" name="ssharename" id="" placeholder="กรอกชื่อส่วนแบ่งยอดขาย"></td>
							</tr>
							<tr>
								<td>เปอร์เซ็นต์ส่วนแบ่งยอดขาย</td>
								<td><input required="required" value="<?php echo $saleshare->sshareper ?>" class="input"
										type="number" step="0.01" name="sshareper" id=""
										placeholder="กรอกเปอร์เซ็นส่วนแบ่งของผู้เขียน"></td>
							</tr>
							<tr>
								<td>รายละเอียดส่วนแบ่งยอดขาย</td>
								<td><input class="input" type="text" value="<?php echo $saleshare->ssharedetail ?>"
										name="ssharedetail" id="" placeholder="กรอกรายละเอียด (ถ้ามี)"></td>
							</tr>
						</table>
						<input class="btn btn-warning" type="submit" value="แก้ไขข้อมูล">
					</form>
					<!-- สิ้นสุดฟอร์มรับข้อมูล -->
					<?php } else { ?>
					<!-- ฟอร์มรับข้อมูล -->
					<form action="insertSalesshare" method="post">
						<table>
							<tr>
								<td>รหัสส่วนแบ่งยอดขาย</td>
								<td><input required="required" size="10" value="<?php echo $this->runnum_model->getSalesshare() ?>" class="input"
										type="text" name="sshareID" id="" placeholder="กรอกรหัสส่วนแบ่งยอดขาย"
										readonly="readonly"></td>
							</tr>
							<tr>
								<td>ชื่อส่วนแบ่งยอดขาย</td>
								<td><input required="required" class="input" type="text" name="ssharename" id=""
										placeholder="กรอกชื่อส่วนแบ่งยอดขาย"></td>
							</tr>
							<tr>
								<td>เปอร์เซ็นต์ส่วนแบ่งยอดขาย</td>
								<td><input required="required" class="input" type="number" step="0.01" name="sshareper"
										id="" placeholder="กรอกเปอร์เซ็นส่วนแบ่งของผู้เขียน"></td>
							</tr>
							<tr>
								<td>รายละเอียดส่วนแบ่งยอดขาย</td>
								<td><input class="input" type="text" name="ssharedetail" id=""
										placeholder="กรอกรายละเอียด (ถ้ามี)"></td>
							</tr>
						</table>
						<input class="btn btn-primary" type="submit" value="บันทึกข้อมูล"> <input class="btn btn-danger"
							type="reset" value="รีเซ็ตข้อมูล">
					</form>
					<?php } ?>
					<!-- สิ้นสุดฟอร์มรับข้อมูล -->
					<hr>
					<table class="salesshare table table-striped table-hover table-dark">
						<thead>
							<tr>
								<th>ลำดับ</th>
								<th>ชื่อส่วนแบ่งยอดขาย</th>
								<th>เปอร์เซ็นต์ส่วนแบ่งยอดขาย</th>
								<th>รายละเอียดส่วนแบ่งยอดขาย</th>
								<th>แก้ไข</th>
								<th>ลบ</th>
							</tr>
						</thead>
						<tbody>
							<!-- //////////// ดึงข้อมูลแสดงในตาราง  -->
							<?php
                                $salesshares = $this->salesshare_model->getSalesshareAll();
                                $x           = 0;
                                foreach ($salesshares as $salesshare) {
                                ?>
							<tr class="tb-hover-row">
								<th scope="row"><?php echo ++$x ?></th>
								<td><?php echo $salesshare->ssharename ?></td>
								<td><?php echo $salesshare->sshareper ?></td>
								<td><?php echo $salesshare->ssharedetail ?></td>
								<td><a class="btn btn-warning" href="salesshare?sshareId=<?php echo $salesshare->sshareID ?>">แก้ไข</a>
								</td>
								<td><a class="btn btn-danger" href="deleteSalesshare/<?php echo $salesshare->sshareID ?>">ลบ</a>
								</td>
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
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>

	</script>
</body>

</html>
