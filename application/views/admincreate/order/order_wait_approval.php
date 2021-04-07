<div class="container-fluit">
	<div class="dashboard">
		<div class="sidebar">
			<?php $this->load->view('admincreate\layout\aside_menu');?>
		</div>
		<div class="body-dashboard container-fluit">
			<?php $this->load->view('admincreate/order/menu_order_top'); ?>
			<div class="row">
				<div class="bg-dark text-light p-2 col-sm-12 mb-2">
					<h4 class="m-0 pl-4">รายการรอการยืนยัน</h4>
				</div>
			</div>
			<div class="row">
				<div class=" text-light col-sm-8">
					<div class="bg-light card-body m-1">
						<table class="table table-dark table-striped text-center">
							<thead>
								<tr class="text-center">
									<th width="5%">ลำดับ</th>
									<th>email:ผู้รับ</th>
									<th>รหัสออเดอร์</th>
									<th width="30%">สถานะ</th>
									<th width="15%">เมนู</th>
								</tr>
							</thead>
							<tbody>
								<?php
                                    $count = 0;
                                    foreach ($approval as $appr) {
                                    ?>
								<tr>
									<td class="text-center"><?php echo ++$count ?></td>
									<td><a class="text-info" href="<?=base_url()?>admin/create/user?userID=<?=$appr->userID?>" target="_blank" rel="noopener noreferrer"><?php echo $appr->useremail?></a></td>
									<td><a class="text-info"
											href="<?=base_url()?>admin/create/orderWait_for_approval?orderID=<?=$appr->orderID?>"><?php echo $appr->orderID ?></a>
									</td>
									<td><?php echo $appr->operationID ?></td>
									<td><a class="btn btn-success" href="<?=base_url()?>admin/create/orderWait_for_approva_confirm/<?=$appr->orderID?>"
											onclick="return confirm('ต้องการยืนยันออเดอร์จริงหรือไม่?')">ยืนยัน</a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="bg-light card-body m-1 pb-2">
					<h5 class="alert alert-primary">เลือกรหัสออเดอร์ เพื่อดูหลักฐานการโอน</h5>
						<?php if(!empty($this->input->get('orderID'))){ 
                            if(count($proof = $this->carts_model->getProofpayByorderID($this->input->get('orderID'))) > 0){
                            ?>
						<table class="table table-dark table-striped">
							<tr class="text-center">
								<th colspan=2> ภาพใบเสร็จ </th>
							</tr>
							<tr class="text-center">
								<th colspan=2 class="text_center">
									<a href="<?=base_url()?>assets/uploads/images/bill_transform/<?=$proof[0]->proofpmimg?>" target="_bank">
										<img class="img-fluid"
											src="<?=base_url()?>assets/uploads/images/bill_transform/<?=$proof[0]->proofpmimg ?>"
											alt="ภาพใบเสร็จ">
									</a> </th>
							</tr>
							<tr>
								<th class="p-2" width="40%">OrderID</th>
								<td class="p-2"><?=$proof[0]->orderID?></td>
							</tr>
							<tr>
								<th class="p-2">วันเวลาโอน</th>
								<td class="p-2"><?=$proof[0]->proofpmdate?></td>
							</tr>
							<tr>
								<th class="p-2">ยอดชำระ</th>
								<td class="p-2"><?=$proof[0]->proofpmPrice?></td>
							</tr>
							<tr>
								<th class="p-2">หมายเหตุ</th>
								<td class="p-2"><?=$proof[0]->proofpmdetails?></td>
							</tr>
						</table>
						<!-- <table class="table table-dark table-striped text-center">

							<caption class="p-0 pt-2">กรณีบันทึกการโอนหลายรอบ</caption>
							<thead>
								<th width="60%">เวลาโอน</th>
								<th>ยอดชำ</th>
							</thead>
							<tbody>
								<?php
                                    foreach ($proof as $prf) {
                                    ?>
								<tr class="text-center">
									<td><?=$prf->proofpmdate?></td>
									<td><?=$prf->proofpmPrice?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table> -->

						<?php }else { ?>
						ไม่พบข้อมูลการโอน
						<?php }
                    } ?>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
