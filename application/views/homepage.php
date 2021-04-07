</div>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="icon/icon.ico" type="image/x-icon">
	<title>Create Contents : ซื้อหนังสืออีบุ๊คได้ในราคาพิเศษ</title>
</head>

<body>
	<!-- ส่วนหัวเว็บไซต์ -->
	<jsp:include page="header.jsp" />
	<div class="contain header-body">
		<h2 class="text-header">Create Contents</h2>
		<h3 class="text-header">จำหน่ายหนังสืออีบุ๊ค
			และหากใครมีหนังสืออีบุ๊คสามารถนำมาจำหน่ายได้ทันที</h3>
	</div>
	<div class="container content-body">
		<div class="row">
			<!-- คอลัมน์แรก -->
			<div class="col-lg-3">
				<?php $this->load->view('layout/aside-left') ?>
				<jsp:include page=".jsp" />
			</div>
			<!-- สิ้นสุดคอลัมน์แรก -->
			<!-- คอลัมน์สอง -->
			<div class="col-lg-9 homepage">
				<!-- 
<% //if(session.getAttribute("viewProduct") != null ){
%>
	<h1>ประเภทหนังสือ</h1>
	<p>รายละเอียดประเภท</p>
	<div class="row typeEbook">

<% 
	/*ArrayList<tbrecommend> tbrecom = ;
	CalculateESclass cs = new CalculateESclass();
	DecimalFormat df = new DecimalFormat("#,###,###.00");
	for(tbrecommend recom:tbrecom){
		tbebook ebook = ebookDAO.getEbook(recom.getEbookId());*/
	%>
<div class="col-lg-3 col-md-4 col-sm-6">
<div class="card">
<a class="text-decoration-none text-body" href=" "> <img
class="card-img-top" src="./img/ebook/<%//= ebook.getEbookImg() %>"
alt="หนังสือ">
</a>
<div class="card-body">
<h5 class="card-title text-center">
<b><%//= ebook.getEbookTitle() %></b>
</h5>
<p class="card-text">
ราคา
<%//= df.format(ebook.getEbooknetPrice()) %>
บาท
</p>
</div>
<div class="card-footer">
<p class="star-late-show">
<%//= cs.numtoStar(ebook.getEbookStar()) %>
<small class="text-star"> <%//= ebook.getEbookStar() %> ดาว
</small>
</p>
<a href="#" class="fa fa-cart-plus text-center btn btn-primary w-100"></a>
</div>
</div>
</div>
} else { } %>

 -->
				<div class="container ">
					<h1>หนังสือแนะนำ</h1>
					<p>สนใจโปรโมทสินค้าติดต่อเจ้าของเพจที่ Create_Content@Gmail.com</p>
					<div class="row recommend">
						<?php if (!empty($ebookrecommend)) {
						foreach ($ebookrecommend as $ebook) {
						?>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="card">
								<div class="view overlay zoom">
									<a class="text-decoration-none text-body"
										href="<?=base_url()?>product/view/<?=$ebook->ebookID?>"><img
											class="card-img-top view overlay zoom" style="min-height: 260px;"
											src="<?=base_url()?>assets/uploads/images/coverimage/<?=$ebook->ebookimg?>" alt="หนังสือ">
									</a>
								</div>
								<div class="card-body">
									<h5 class="card-title text-center">
										<b><?=$ebook->ebooktitle?></b>
									</h5>
									<p class="card-text">
										ราคา
										<?=number_format($ebook->ebooknetprice,2)?>
										บาท
									</p>
								</div>
								<div class="card-footer">
									<p class="star-late-show">
										<?=$this->utility->numtoStar($ebook->ebookstar)?>
										<small class="text-star"> <?=$ebook->ebookstar?>
											ดาว
										</small>
									</p>
									<a href="<?=base_url()?>order/addCart/<?=$ebook->ebookID?>"
										class="fa fa-cart-plus text-center btn btn-primary w-100"></a>
								</div>
							</div>
						</div>
						<?php
							}
						} else 
						{
							echo "ไม่พบหนังสือแนะนำ";
						}
						?>

					</div>
					<hr>
					<h1>ยอดขายดี</h1>
					<p></p>
					<div class="row bestsaller">
						<?php if (!empty($BestSeller)) {
						foreach ($BestSeller as $ebook) {
						?>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="card">
								<div class="view overlay zoom">
									<a class="text-decoration-none text-body"
										href="<?=base_url()?>product/view/<?=$ebook->ebookID?>"><img
											class="card-img-top view overlay zoom" style="min-height: 260px;"
											src="<?=base_url()?>assets/uploads/images/coverimage/<?=$ebook->ebookimg?>" alt="หนังสือ">
									</a>
								</div>
								<div class="card-body">
									<h5 class="card-title text-center">
										<b><?=$ebook->ebooktitle?></b>
									</h5>
									<p class="card-text">
										ราคา
										<?=number_format($ebook->ebooknetprice,2)?>
										บาท
									</p>
								</div>
								<div class="card-footer">
									<p class="star-late-show">
										<?=$this->utility->numtoStar($ebook->ebookstar)?>
										<small class="text-star"> <?=$ebook->ebookstar?>
											ดาว
										</small>
									</p>
									<a href="<?=base_url()?>order/addCart/<?=$ebook->ebookID?>"
										class="fa fa-cart-plus text-center btn btn-primary w-100"></a>
								</div>
							</div>
						</div>
						<?php
							}
						}else {
							echo "ไม่พบหนังสือขายดี";
						}
						?>
					</div>
					<hr>
					<h1>หนังสือใหม่ล่าสุด</h1>
					<p></p>
					<div class="row newebook">
						<?php if (!empty($NewBooks)) {
						foreach ($NewBooks as $ebook) {
						?>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="card">
								<div class="view overlay zoom">
									<a class="text-decoration-none text-body"
										href="<?=base_url()?>product/view/<?=$ebook->ebookID?>"><img
											class="card-img-top view overlay zoom" style="min-height: 260px;"
											src="<?=base_url()?>assets/uploads/images/coverimage/<?=$ebook->ebookimg?>" alt="หนังสือ">
									</a>
								</div>
								<div class="card-body">
									<h5 class="card-title text-center">
										<b><?=$ebook->ebooktitle?></b>
									</h5>
									<p class="card-text">
										ราคา
										<?=number_format($ebook->ebooknetprice,2)?>
										บาท
									</p>
								</div>
								<div class="card-footer">
									<p class="star-late-show">
										<?=$this->utility->numtoStar($ebook->ebookstar)?>
										<small class="text-star"> <?=$ebook->ebookstar?>
											ดาว
										</small>
									</p>
									<a href="<?=base_url()?>order/addCart/<?=$ebook->ebookID?>"
										class="fa fa-cart-plus text-center btn btn-primary w-100"></a>
								</div>
							</div>
						</div>
						<?php
							}
						}else {
							echo "ไม่พบหนังสือใหม่";
						}
						?>
					</div>
				</div>
			</div>
			<!-- สิ้นสุดคอลัมน์สอง -->
		</div>
	</div>
	<!-- ปิดแท๊ก container-fluit และ row -->
	<hr>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js">
		//-->

	</script>
</body>

</html>
