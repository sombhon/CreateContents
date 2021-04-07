<div class="contain header-body mb-4">
	<h2 class="text-header">Create Contents</h2>
	<h3 class="text-header">จำหน่ายหนังสืออีบุ๊ค
		และหากใครมีหนังสืออีบุ๊คสามารถนำมาจำหน่ายได้ทันที</h3>
</div>
<div class="container">
	<div class="row">
		<!-- คอลัมน์แรก -->
		<div class="col-lg-3">
			<?php $this->load->view('layout/aside-left'); ?>
		</div>
		<!-- สิ้นสุดคอลัมน์แรก -->
		<!-- คอลัมน์สอง -->
		<div id="<?php echo $name ?>" class="col-lg-9 homepage">
			<div class="container">
				<div class="card-header my-3 bg-dark text-light">
					<h2><?php echo $name ?></h2>
				</div>
				<div class="row recommend">
					<?php
                        foreach ($ebookList as $ebook) {
                        ?>
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="card">
							<div class="view overlay zoom">
								<a class="text-decoration-none text-body"
									href="<?php echo base_url() ?>product/view/<?php echo $ebook->ebookID ?>"><img
										class="card-img-top view overlay zoom" style="min-height: 260px;"
										src="<?php echo base_url() ?>assets/uploads/images/coverimage/<?php echo $ebook->ebookimg ?>"
										alt="หนังสือ"> </a>
							</div>
							<div class="card-body">
								<h5 class="card-title text-center">
									<b><?php echo $ebook->ebooktitle ?></b>
								</h5>
								<p class="card-text">
									ราคา
									<?php echo number_format($ebook->ebooknetprice, 2) ?>
									บาท
								</p>
							</div>
							<div class="card-footer">
								<p class="star-late-show">
									<?php echo $this->utility->numtoStar($ebook->ebookstar) ?>
									<small class="text-star"> <?php echo $ebook->ebookstar ?> ดาว
									</small>
								</p>
								<a href="addCart?ebookid=<?php echo $ebook->ebookID ?>&ebooknet=<?php echo $ebook->ebooknetprice ?>"
									class="fa fa-cart-plus text-center btn btn-primary w-100"></a>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<hr>
			</div>
		</div>
	</div>
	<!-- สิ้นสุดคอลัมน์สอง -->
</div>
<!-- ปิดแท๊ก container-fluit และ row -->

