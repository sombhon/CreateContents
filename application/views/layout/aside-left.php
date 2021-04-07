<div class="aside-left">
	<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1"><img
					src="https://img.icons8.com/color/24/000000/search.png" /></span>
		</div>
		<input type="text" class="form-control" placeholder="ค้นหาหนังสือ" aria-label="Username"
			aria-describedby="basic-addon1"> <input class="btn btn-primary" type="submit" value="ค้นหา">
	</div>
	<div class="category">
		<ul class="nav flex-column">
			<li class="nav-item"><a class="nav-link  nav-head" href=""><b>หนังสือทั้งหมด
						(<?php echo $this->ebook_model->getEbookCountAll() ?>)</b></a></li>
			<?php
                $ebooktype = $this->ebook_model->getEbookType();
                foreach ($ebooktype as $etype) {
                ?>
			<li class="nav-item"><a class="nav-link"
					href="<?php echo base_url() ?>viewCategory?category=<?php echo $etype->ebooktypeID ?>&categoryname=<?php echo $etype->ebooktypename ?>#<?php echo $etype->ebooktypename ?>"><?php echo $etype->ebooktypename ?></a>
			</li>
			<?php
                }
            ?>
		</ul>
	</div>
	<div class="container score">
		<h4 class="text-center">คะแนนสะสม</h4>
		<table class="table table-dark">
			<?php if ($this->session->userdata("user_login") != null) {
                    $reward = $this->user_model->getReword($this->session->userdata("user_login")->userID);
                }
            ?>
			<tr>
				<th scope="row">คะแนนคงเหลือ</th>
				<td><?php echo (!empty($reward) ? $reward['rewardpoint'] : 0) ?></td>
			</tr>
			<tr>
				<th scope="row">คะแนนสะสม</th>
				<td><?php echo (!empty($reward) ? $reward['cumulativepoint'] : 0) ?></td>
			</tr>
		</table>
		<h4 class="text-center">ตระกร้าสินค้า</h4>
		<ul class="list-group" style="padding-left:">
			<li style="padding-left: 10px" class="list-group-item">
				<a href="<?php echo base_url() ?>order/carts" class="btn btn-primary fa fa-shopping-cart w-50"
					aria-hidden="true">
					<?php if ($this->session->userdata("user_login") != null) {
                        echo $this->carts_model->getCartdCount($this->session->userdata("user_login")->userID);
                    }
                ?>
				</a> สั่งซื้อสินค้า</li>
			<li style="padding-left: 10px" class="list-group-item"><a href="<?php echo base_url() ?>order/payorder"
					class="btn btn-danger fa fa-credit-card-alt w-50" aria-hidden="true"> <?php if ($this->session->userdata("user_login") != null) {
						echo $this->carts_model->getOrderwaitpayCount($this->session->userdata("user_login")->userID);
				}
				?></a> ชำระ</li>
		</ul>
	</div>
</div>
