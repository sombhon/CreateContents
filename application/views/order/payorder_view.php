<div class="container">
	<?php $this->load->view('order/menu_top_status'); ?>

	<div class="row">
		<div class="col-sm-12 text-light bg-dark p-3 pl-5 mb-1 shadow">
			<h3>รอการชำระ</h3>
		</div>
	</div>


	<?php
    if (!empty($this->input->get('sendPay'))) { 
        $order = $this->carts_model->getOrderById($this->input->get('sendPay'));

        ?>
	<div class="row bg-light shadow p-4 mb-2">
		<div class="col-sm-12 bg-dark py-2 mb-2">
			<h5 class="mb-0 text-light">โอนเงินเข้าระบบเพื่อชำระยอด</h5>
		</div>
		<form class="col-sm-12" action="<?=base_url()?>order/payorder_submit" method="post"
			enctype="multipart/form-data">
			<table class="table">
				<tr>
					<th width="20%">ชำระออเดอร์</th>
					<td><input class="form-control" style="background:none;border:none;" type="text" name="billorder"
							readonly value="<?=$this->input->get('sendPay')?>"></td>
				</tr>
				<tr>
					<th>เพิ่มไฟล์ใบเสร็จ</th>
					<td>
						<input class="form-control-file" type="file" name="fileimage" id="">
					</td>
				</tr>
				<tr>
					<th>เลขบัญชีที่โอนเข้า</th>
					<td>
						<input required class="form-control" type="number" name="accnumber" id="">
					</td>
				</tr>
				<tr>
					<th>ยอดชำระ</th>
					<td>
						<input required class="form-control" type="number" name="payprice"
							value="<?=$this->input->get('price')?>" id="">
					</td>
				</tr>
				<tr>
					<th>วันที่ และเวลาโอน <br>(ระบุตามใบโอน)</th>
					<td>
						<input required type="datetime-local" name="datetime" id="">
					</td>
				</tr>
				<tr>
					<th>หมายเหตุ (ไม่จำเป็น)</th>
					<td>
						<input required type="text" name="comment" id="">
					</td>
				</tr>
				<tr>
					<td class="text-center" colspan="2">
						<input class="btn btn-success" type="submit" value="บันทึกการโอนจ่าย">
					</td>
				</tr>
			</table>
		</form>
		<div class="col-sm-12 bg-dark py-2 mb-2">
			<h5 class="mb-0 text-light">เลขบัญชีโอน</h5>
		</div>
		<div class="col-sm-12">
			<div class="table-responsive">
				<table class="table align-items-center table-   flush">
					<thead class="thead-light">
						<tr>
							<th scope="col">ชื่อธนาคาร</th>
							<th scope="col">เลขที่บัญชี</th>
							<th scope="col">ชื่อบัญชี</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($accOffice as $acc) {
                        
                        ?>
						<tr>
							<th scope="row" width="30%">
								<div class="media align-items-center">
									<img style="max-width:20%" alt="Image placeholder"
										src="<?=base_url()?>assets/uploads/images/logo/<?=$acc->accBank?>.jpg">
									<div class="media-body ml-3">
										<span class="mb-0 text-sm"><?=$acc->accBankname?></span>
									</div>
								</div>
							</th>
							<td style="vertical-align:middle">
								<?=$acc->accNumber?>
							</td>
							<td style="vertical-align:middle">
								<?=$acc->accName?>
							</td>

						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<?php
        }
    ?>

	<div class="row bg-light shadow p-4 mb-5">

		<div class="col-sm-12 bg-dark py-2 mb-2">
			<h5 class="mb-0 text-light">รายการรอการชำระ</h5>
		</div>

        <?php if($this->session->flashdata('ms_success')){ ?>
		<div class="col-sm-12 alert alert-success">
			<?=$this->session->flashdata('ms_success')?>
		</div>

		<?php } ?>
		<?php if($this->session->flashdata('ms_error')){ ?>
		<div class="col-sm-12 alert alert-danger">
			<?=$this->session->flashdata('ms_error')?>
		</div>
		<?php } ?>

		<table class="table table-dark table-striped">
			<thead>
				<tr class="text-center">
					<th width="5%">ลำดับ</th>
					<th>email : ผู้รับ</th>
					<th>วันที่สั่งซื้อ</th>
					<th width="15%">ส่วนลด</th>
					<th width="15%">ยอดชำระ</th>
					<th width="15%">เมนู</th>
				</tr>
			</thead>
			<tbody>
				<?php
                $count = 0;
                foreach ($payorder as $payord) {
                ?>
				<tr>
					<td class="text-center"><?php echo ++$count ?></td>
					<td><?php echo $payord->useremail ?></td>
					<td><?php echo $payord->orderdate ?></td>
					<td><?php echo $payord->orderdiscount + $payord->orderdiscountoffice ?></td>
					<td><?php echo $payord->ordernetprice ?></td>
					<td class="text-center"><a class="btn btn-warning"
							href="<?=base_url()?>order/payorder?sendPay=<?=$payord->orderID?>&price=<?=$payord->ordernetprice?>">ชำระ</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
