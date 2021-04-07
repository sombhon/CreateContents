<div class="container">
	<div class="row">
		<div class="col-sm-12 card-header mt-5 mb-2">
			ห้องหนังสือ
		</div>
		<div class="col-sm-12 ">
			<div class="row card-body mb-5 shadow">
				<?php foreach ($mybook as $ebook) { ?>

				<div class="col-lg-3 col-md-4 col-sm-6">
					<div class="card">
						<div class="view overlay zoom">
							<a target="_bank" class="text-decoration-none text-body"
								href="<?=base_url()?>assets/uploads/ebook/<?=$ebook->ebooklink?>"><img
									class="card-img-top view overlay zoom" style="min-height: 260px;"
									src="<?=base_url()?>assets/uploads/images/coverimage/<?=$ebook->ebookimg?>"
									alt="หนังสือ">
							</a>
						</div>
						<div class="card-body">
							<h5 class="m-0 card-title text-center">
								<b><?=$ebook->ebooktitle?></b>
							</h5>
						</div>
					</div>
				</div>
			    <?php } ?>

			</div>

		</div>

	</div>
</div>
