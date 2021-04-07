<!DOCTYPE html>
<html lang="th">

<head>
	<meta charset="UTF-8">
	<title>ระบบใหม่</title>
</head>

<body>
	<section class="container">
	<?php $this->load->view('order/menu_top_status');?>
	<div class="row">
		<div class="col-sm-12 text-light bg-dark p-3 pl-5 mb-1 shadow">
           <h3>ตะกร้าสินค้า</h3> 
        </div>
	</div>
		
		<!--Grid row-->
		<form action="<?=base_url()?>order/carts_submit" method="post">
			<div class="row">
				<!--Grid column-->
				<div class="col-lg-8">
					<!-- Card -->
					<div class="mb-3">
						<div class="pt-4 wish-list">
							<?php
                                    $count    = 1;
                                    $Discount = 0;
                                    $Price    = 0;
                                    $Net      = 0;

                                    foreach ($cartdetails as $cartdetail) {
                                        $ebook = $this->ebook_model->getEbookById($cartdetail->ebookID);
                                    ?>
							<div class="row mb-4">
								<div class="col-sm-5 col-md-4 col-lg-2 col-xl-2">
									<img class="img w-100" src="<?php echo base_url() ?>assets/uploads/images/coverimage/
									<?php echo $ebook->ebookimg ?>" alt="หนังสือ">
								</div>
								<div class="col-sm-7 col-md-8 col-lg-10 col-xl-10">
									<div class="d-flex justify-content-between">
										<div>
											<h5><?php echo $ebook->ebooktitle ?></h5>
											<p class="mb-3 text-muted text-uppercase small">
												<?php echo $ebook->ebookID ?></p>
										</div>
										<div>
											<ul class="mb-0 w-100 list-group">
												<li class="list-item mb-3"><input class="btn btn-dark"
														id="<?php echo $cartdetail->ebookID ?>" name="ebookId[]"
														value="<?php echo $cartdetail->ebookID ?>"
														checked type="checkbox" /> <label
														class="mb-0 btn btn-primary"
														for="<?php echo $cartdetail->ebookID ?>">เลือก</label>
												</li>
												<li class="list-item text-right"><a class="btn btn-danger"
														href="<?=base_url()?>order/deleteCartselected/<?php echo $cartdetail->cartdID ?>">ลบ</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="d-flex justify-content-end">
										<div class="d-inline text-right">
											<p class="mb-0">
												<sub><del>
														ปกติ
														<?php echo $ebook->ebookprice ?>
														บาท
													</del></sub> <span style="color: red;"> ลด
													<?php echo $ebook->ebookpricediscount ?>
													บาท
												</span>
											</p>
											<p class="mb-0">
												<strong id="summary">ราคาสุทธิ <?php echo $ebook->ebooknetprice ?>
													บาท
												</strong>
											</p>
										</div>
									</div>
								</div>
							</div>
							<hr class="mb-4">
							<?php
                                    $Price += $ebook->ebookprice;
                                        $Discount += $ebook->ebookpricediscount;
                                        $Net += $ebook->ebooknetprice;
                                    }
                                ?>
						</div>
					</div>
					<!-- Card -->
				</div>
				<!--Grid column-->
				
			<!--Grid column-->
			<div class="col-lg-4 mb-5">
				<!-- Card -->
				<div class="pt-4">
					<h5 class="mb-3">เลือกผู้รับสินค้า</h5>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" checked
							name="buyme" value="me" id="buyme"> <label
							for="buyme">ซื้อให้ตัวเอง</label>
					</div>
					<p class="mb-0">กรอก Email ผู้รับสินค้า</p>
					<input disabled class="form-control" placeholder="someone@email.com" name="email" id="email">



				</div>
				<div class="pt-4">
					<h5 class="mb-3">คำนวณยอดสั่งซื้อ</h5>
					<ul class="list-group list-group-flush">
						<li
							class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
							ยอดรวม <span> <span id="price"><?php echo $Price ?></span> บาท
							</span>
						</li>
						<li class="list-group-item px-3">
							<p class="mb-0 bold">เลือกส่วนลด</p>
							<?php foreach ($scordiscount as $scoreDis) {
                                        ?>
							<div class="mb-0 row">
								<div class="form-check col-sm-6 d-flex">
									<input class="form-check-input" name="discount" type="radio" onclick="calcDiscount(this)"
										name="discount" value="<?php echo $this->utility->encode($scoreDis->scoreID) ?>"
										id="<?php echo $scoreDis->scoreper ?>"> <label
										for="<?php echo $scoreDis->scoreper ?>"><?php echo $scoreDis->scorename ?></label>
								</div>
								<div class="col-sm-6 d-flex justify-content-end">
									<span>ใช้ <?php echo number_format($scoreDis->scorenum,0) ?> คะแนน
									</span>
								</div>
							</div>
							<?php
                                        }
                                    ?>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center px-0">
							ส่วนลด
							<div>
								<span id="Discount"><?php echo $Discount ?></span> บาท
							</div>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center px-0">
							ส่วนลดพิเศษ
							<span> <span id="Discount2">0</span> บาท
							</span>
						</li>
						<li
							class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
							<div>
								<b>ยอดรวมสุทธิ</b>
							</div> <span><b id="netPrice"><?php echo $Net ?> บาท</b></span>
						</li>
					</ul>
					<button type="submit" class="btn btn-primary btn-block">สั่งซื้อ</button>
				</div>
				<!-- Card -->
			</div>
			</div>

		</form>
		<!-- Grid row -->
		<script type="text/javascript">
			let price = parseInt($('#price').html())
			let discount = parseInt($('#Discount').html())
			let discount2 = $('#Discount2')
			let netPrice = $('#netPrice')
			function calcDiscount(element) {
				discountadd = calcper(price, element.getAttribute('id'))
				discount2.html(discountadd)
				netPrice.html((price - discount - discountadd) + "บาท")
			}


			function calcper(value, per) {
				return value * per / 100
			}

			function calcDeleteper(value, per) {
				(value - (value * per / 100))
				return (value - (value * per / 100))
			}

			var chkrecieve = true;
			$('#buyme').click(function(ele) {
				if (chkrecieve) {
					$('#email').removeAttr('disabled')
					chkrecieve = false
				} else {
					$('#email').val("")
					$('#email').prop('disabled', "true")
					chkrecieve = true
				}
			})

		</script>
	</section>
</body>

</html>
