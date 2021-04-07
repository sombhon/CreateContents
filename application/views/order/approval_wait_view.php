<div class="container">
	<?php $this->load->view('order/menu_top_status'); ?>

	<div class="row">
		<div class="col-sm-12 text-light bg-dark p-3 pl-5 mb-1 shadow">
			<h3>รอการอนุมัติ</h3>
		</div>
	</div>

	<div class="row bg-light shadow p-4 mb-5">
		<div class="col-sm-12 bg-dark py-2 mb-2">
			<h5 class="mb-0 text-light">รายการรอการอนุมัติจากผู้ดูแลระบบ</h5>
		</div>

		<table class="table table-dark table-striped text-center">
			<thead>
				<tr class="text-center">
					<th width="5%">ลำดับ</th>
					<th>email:ผู้รับ</th>
					<th width="30%">สถานะ</th>
				</tr>
			</thead>
			<tbody>
				<?php
                $count = 0;
                foreach ($approval as $appr) {
                ?>
				<tr>
					<td class="text-center"><?php echo ++$count ?></td>
					<td><?php echo $appr->useremail ?></td>
					<td>รอการยืนยัน</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
