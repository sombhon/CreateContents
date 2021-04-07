<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
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
			<div class="body-dashboard container-fluit">
				<div class="row">
					<div class="bg-dark text-light p-2 col-sm-12 mb-2">
						<h4 class="m-0 pl-4">รายงานยอดขาย</h4>
					</div>
					<div class="shadow bg-light pl-2 py-2 col-sm-12 mb-2">
						<table id=Datatable class="table table-dark table-striped table-hover">
							<thead>
								<tr>
									<th>ลำดับ</th>
									<th>วันที่ขาย</th>
									<th>ราคาก่อนลด</th>
									<th>ส่วนลดผู้ขาย</th>
									<th>ส่วนลดบริษัท</th>
									<th>ราคาสุทธิ</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($reports)) {
									$count = 0;
									foreach ($reports as $report) {
									}
                                ?>
								<tr>
									<td><?=++$count?></td>
									<td><?=$report->orderdate?></td>
									<td><?=$report->ordertotalprice?></td>
									<td><?=$report->orderdiscount?></td>
									<td><?=$report->orderdiscountoffice?></td>
									<td><?=$report->ordernetprice?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
	<script>
		$(document).ready(function () {
			$('#Datatable').DataTable();
		});

	</script>
</body>

</html>
