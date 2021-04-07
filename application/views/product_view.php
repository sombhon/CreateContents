<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>สินค้าที่เลือก</title>
</head>

<body>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<?php $this->load->view('layout/aside-left'); ?>
			</div>
			<div class="col-lg-9" style="background-color: #e4e4e4; padding: 20px; border-radius: 20px">
				<div class="row">
					<div class="col-4">
						<img src="<?=base_url()?>assets/uploads/images/coverimage/<?=$ebook->ebookimg ?>" class="img-thumbnail"
							style="max-height: 300px" alt="">
					</div>
					<div class="col-8">
						<h5 class="">
							<b><?=$ebook->ebooktitle?></b>
						</h5>
						<p>
							รหัสสินค้า :
							<?=$ebook->ebookID ?>
							| <label style="color: orange"><?=$this->utility->numtostar($ebook->ebookstar); ?></label>
							<?= number_format($ebook->ebookstar,2) ?>
							คะแนน <br> <small>ราคาปกติ <?=$ebook->ebookprice ?> บาท
							</small> ลดราคา
							<?=$ebook->ebookpricediscount ?>
							บาท <br> <b>ราคาสุทธิ <?=$ebook->ebooknetprice ?> บาท
							</b><br>
						</p>
						<a class="btn btn-primary"
							href="<?=base_url()?>order/addCart/<?=$ebook->ebookID ?>">เพิ่มลงตะกร้า</a>
						<a href="<?=base_url()?>order/carts" class="btn btn-danger">สั่งซื้อ</a>
						<hr>
						<h6>คุณสมบัติพื้นฐาน</h6>
						<p><?=$ebook->ebookattribute ?>
						</p>
						<p>
							<b>ผู้เขียน : <?=$ebook->usernamea ?></b>
						</p>
						<small>เผยแพร่วันที่ <?=date('d-m-Y', strtotime($ebook->ebookdate)) ?>
							,เวลา : <?= date('H:i:s' ,strtotime($ebook->ebookdate)) ?></small>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
</body>

</html>
