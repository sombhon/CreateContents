	<footer class="site-footer">
		<div class="container-footer">
			<h2 class="footer">Copyright Create Contents 2020 &copy; All Rights
				Reserved by Somporn</h2>
			<hr>
		</div>
		<div class="container-footer">
			<div class="rowft">
				<div class="colum1">
					<h3>โซเชียลมีเดีย :</h3>
					<div class="link">
						<ul>
							<li><img alt="logo-facebook"
									src="https://img.icons8.com/fluent/24/000000/facebook-new.png" /><a href="#">
									www.facebook.com/createcontents</a></li>
							<li><img alt="logo-line" src="https://img.icons8.com/color/24/000000/line-me.png" />
								Line ID : CreateContents</li>
						</ul>
					</div>
				</div>
				<div class="colum2">
					<h3>ที่อยู่ :</h3>
					<img alt="logo-house" class="address-img" style="height: 24px; margin-top: -2px;"
						src="https://img.icons8.com/cotton/24/ 000000/  home--v1.png" />
					<div class="address">
						วิไลพร อพาร์ทเม้นท์ (loft 8) <br>ซ.เบญจางค์2 ต.หมากแข้ง อ.เมือง
						จ.อุดรธานี <br> โทร 0636411005
					</div>
				</div>
			</div>
		</div>
	</footer>

	<script>
		<?php 
		
		if ($this->session->flashdata("ms_success_right")) {?>
			Swal.fire({
				position: 'top-end',
				icon: 'success',
				title: '<?=$this->session->flashdata("ms_success_right")?>',
				showConfirmButton: false,
				timer: 1000
			})
		<?php } ?>

		<?php if ($this->session->flashdata("login_error")) {?>
			Swal.fire({
				position: 'top-end',
				icon: 'error',
				title: '<?=$this->session->flashdata("login_error")?>',
				showConfirmButton: false,
				timer: 3000
			})
		<?php } ?>
		
		<?php 
		if ($this->session->flashdata("ms_all_info")) {?>
			Swal.fire({
				icon: 'info',
				title: '<?=$this->session->flashdata("ms_all_info")?>',
				showConfirmButton: false,
				timer: 3000
			})
		<?php } ?>
		
		<?php 
		if ($this->session->flashdata("ms_all_error")) {?>
			Swal.fire({
				icon: 'error',
				title: '<?=$this->session->flashdata("ms_all_error")?>',
				showConfirmButton: false,
				timer: 3000
			})
		<?php } ?>

		<?php 
		if ($this->session->flashdata("ms_all_success")) {?>
			Swal.fire({
				icon: 'success',
				title: '<?=$this->session->flashdata("ms_all_success")?>',
				showConfirmButton: false,
				timer: 5000
			})
		<?php } ?>

	</script>

	</body>

	</html>
