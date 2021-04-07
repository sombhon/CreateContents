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
				<?php $this->load->view('admincreate\layout\aside_menu');?>
			</div>
			<div class="body-dashboard">
				<div class="container-fluit">
					<div class="row">
						<div class="card-header bg-dark text-light col-sm-12 mb-2">
							<h5>เมนู</h5>
						</div>
						<div class="card-body shadow bg-light mb-4">
							<a href="<?=base_url()?>admin/create/recommend" class="btn btn-info">แนะนำสินค้า</a>
							<a href="<?=base_url()?>admin/create/user" class="btn btn-info">ข้อมูลสมาชิก</a>
							<a href="<?=base_url()?>admin/create/recommend" class="btn btn-info">แนะนำสินค้า</a>
							<a href="<?=base_url()?>admin/create/orderwait_for_approval" class="btn btn-primary">ยืนยันโอนจ่าย</a>
							<a href="<?=base_url()?>admin/create/report" class="btn btn-success">รายงาน</a>
						</div>
						<div class="card-header bg-dark text-light col-sm-12 mb-2">
							<h5>รายงานผลรวม</h5>
						</div>
						<table class="table table-light table-striped mb-4 shadow">
							<tr>
								<th>ยอดค้างชำระ</th>
								<th>ยอดรอการอนุมัติ</th>
								<th>ยอดรวมส่วนลดผู้เขียน</th>
								<th>ยอดรวมส่วนลดบริษัท</th>
								<th>ยอดขายรวม</th>
							</tr>
							<tr>
								<td><?=$this->report_model->getSumWaitpay()->ordernetprice?></td>
								<td><?=$this->report_model->getSumwaitapproval()->ordernetprice?></td>
								<td><?=$this->report_model->getSumDiccountuser()->orderdiscount?></td>
								<td><?=$this->report_model->getSumDiccountoffice()->ordernetprice?></td>
								<td><?=$this->report_model->getSumCompleted()->ordernetprice?></td>
							</tr>
						</table>
						<div class="card-header bg-dark text-light col-sm-12 mb-2">
							<h5>รายงานผลกราฟ</h5>
						</div>
					</div>
				</div>

				<p>ยอดขายปี 2562</p>
				<div class="report-graph">
					<div class="graph">
						<div id="chart">
							<ul id="numbers">
								<li><span>100%</span></li>
								<li><span>90%</span></li>
								<li><span>80%</span></li>
								<li><span>70%</span></li>
								<li><span>60%</span></li>
								<li><span>50%</span></li>
								<li><span>40%</span></li>
								<li><span>30%</span></li>
								<li><span>20%</span></li>
								<li><span>10%</span></li>
								<li><span>0%</span></li>
							</ul>
							<ul id="bars">
								<li>
									<div data-percentage="56" class="bar"></div>
									<span>เดือนที่ 1</span>
								</li>
								<li>
									<div data-percentage="33" class="bar"></div>
									<span>เดือนที่ 2</span>
								</li>
								<li>
									<div data-percentage="54" class="bar"></div>
									<span>เดือนที่ 3</span>
								</li>
								<li>
									<div data-percentage="94" class="bar"></div>
									<span>เดือนที่ 4</span>
								</li>
								<li>
									<div data-percentage="44" class="bar"></div>
									<span>เดือนที่ 5</span>
								</li>
								<li>
									<div data-percentage="23" class="bar"></div>
									<span>เดือนที่ 6</span>
								</li>
								<li>
									<div data-percentage="23" class="bar"></div>
									<span>เดือนที่ 7</span>
								</li>
								<li>
									<div data-percentage="23" class="bar"></div>
									<span>เดือนที่ 8</span>
								</li>
								<li>
									<div data-percentage="23" class="bar"></div>
									<span>เดือนที่ 9</span>
								</li>
								<li>
									<div data-percentage="23" class="bar"></div>
									<span>เดือนที่ 10</span>
								</li>
								<li>
									<div data-percentage="23" class="bar"></div>
									<span>เดือนที่ 11</span>
								</li>
								<li>
									<div data-percentage="23" class="bar"></div>
									<span>เดือนที่ 12</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!--report-graph-->
			</div>
			<!--body-dashboard-->
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script>
		$(function () {
			$("#bars li .bar").each(function (key, bar) {
				var percentage = $(this).data('percentage');
				$(this).animate({
					'height': percentage + '%'
				}, 1000);
			});
		});

	</script>
</body>

</html>
