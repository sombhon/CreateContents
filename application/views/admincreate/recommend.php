<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ระบบจัดการเบื้อหลังระบบ</title>
</head>

<body>
	<div class="container-fluit">

		<div class="dashboard">

			<div class="sidebar">
				<?php $this->load->view('admincreate\layout\aside_menu'); ?>
			</div>


			<div class="body-dashboard">
				<div class="recommend-ebook">
					<h2>หนังสือแนะนำ</h2>
					<div class="recommend-box">
						<form action="recommend_submit" method="post">
							<div class="show-recommend">
								<div class="container-fluit">
									<h3>เลือกหนังสือ 6 เล่ม</h3>
									<div class="row">
										<div class="col-sm-2 text-center">
											<img id="img_1" class="mb-2 card-img-top" src="http://via.placeholder.com/100x130"
												alt="">
											<p id="title_1" >. . .</p>
											<input id="ebook_1" type="hidden" name="ebook_1">
											<div id="clear1" class="btn btn-danger">ล้างข้อมูล</div>
										</div>
										<div class="col-sm-2 text-center">
											<img id="img_2" class="mb-2 card-img-top" src="http://via.placeholder.com/100x130"
												alt="">
											<p id="title_2" >. . .</p>
											<input id="ebook_2" type="hidden" name="ebook_2">
											<div id="clear2" class="btn btn-danger">ล้างข้อมูล</div>
										</div>
										<div class="col-sm-2 text-center">
											<img id="img_3" class="mb-2 card-img-top" src="http://via.placeholder.com/100x130"
												alt="">
											<p id="title_3" >. . .</p>
											<input id="ebook_3" type="hidden" name="ebook_3">
											<div id="clear3" class="btn btn-danger">ล้างข้อมูล</div>
										</div>
										<div class="col-sm-2 text-center">
											<img id="img_4" class="mb-2 card-img-top" src="http://via.placeholder.com/100x130"
												alt="">
											<p id="title_4" >. . .</p>
											<input id="ebook_4" type="hidden" name="ebook_4">
											<div id="clear4" class="btn btn-danger">ล้างข้อมูล</div>
										</div>
										<div class="col-sm-2 text-center">
											<img id="img_5" class="mb-2 card-img-top" src="http://via.placeholder.com/100x130"
												alt="">
											<p id="title_5" >. . .</p>
											<input id="ebook_5" type="hidden" name="ebook_5">
											<div id="clear5" class="btn btn-danger">ล้างข้อมูล</div>
										</div>
										<div class="col-sm-2 text-center">
											<img id="img_6" class="mb-2 card-img-top" src="http://via.placeholder.com/100x130"
												alt="">
											<p id="title_6" >. . .</p>
											<input id="ebook_6" type="hidden" name="ebook_6">
											<div id="clear6" class="btn btn-danger">ล้างข้อมูล</div>
										</div>
									</div>
								</div>
							</div>
							<input class="btn-success form-control" type="submit" value="บันทึกข้อมูล">

						</form>
						<div class="card-body bg-dark pl-4 text-light py-3 mb-2 mt-4 ">
							<h5 class="m-0">คลิ๊กแต่ละแถวที่ต้องการ</h5>
						</div>
						<div class="select-recommend mt-0">
							<table id=Datatable class="table table-dark table-striped table-hover">
								<thead>
									<tr>
										<th>ภาพ</th>
										<th>ชื่อ</th>
										<th>ผู้เขียน</th>
										<th>อายุ</th>
										<th>วันที่อัพโหลด</th>
										<th>ราคา</th>
									</tr>
								</thead>
								<tbody>
									<?php 
                                if(!empty($ebooks)){
                                    foreach ($ebooks as $ebook) {  
                                        ?>
									<tr data-id="<?=$ebook->ebookID?>" data-name="<?=$ebook->ebooktitle?>"
										data-img="<?=$ebook->ebookimg?>" onclick="selectrecommend(this)"
										style="cursor:pointer">
										<td><img height="80px"
												src="<?=base_url()?>assets/uploads/images/coverimage/<?=$ebook->ebookimg?>"
												alt=""></td>
										<td><?=$ebook->ebooktitle?></td>
										<td><?=$ebook->usernamea?></td>
										<td><?=$this->utility->getAge($ebook->userbirthday)?></td>
										<td><?=$ebook->ebookdate?></td>
										<td><?=$ebook->ebooknetprice?></td>
									</tr>
									<?php
                                    }
                                }
                                ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<script>
		$(document).ready(function () {
			$('#Datatable').DataTable();
		});


		function selectrecommend(ele) {
			var id = ele.getAttribute('data-id');
			var name = ele.getAttribute('data-name');
			var img = ele.getAttribute('data-img');

			if ($('#ebook_1').val() == '') {
                $('#ebook_1').val(id) 
                $('#title_1').html(name) 
                $('#img_1').attr('src' , '<?=base_url()?>assets/uploads/images/coverimage/'+ img)  
			} else if ($('#ebook_2').val() == '') {
                $('#ebook_2').val(id) 
                $('#title_2').html(name) 
                $('#img_2').attr('src' , '<?=base_url()?>assets/uploads/images/coverimage/'+ img)  
			} else if ($('#ebook_3').val() == '') {
                $('#ebook_3').val(id) 
                $('#title_3').html(name) 
                $('#img_3').attr('src' , '<?=base_url()?>assets/uploads/images/coverimage/'+ img)  
			} else if ($('#ebook_4').val() == '') {
                $('#ebook_4').val(id) 
                $('#title_4').html(name) 
                $('#img_4').attr('src' , '<?=base_url()?>assets/uploads/images/coverimage/'+ img)  
			} else if ($('#ebook_5').val() == '') {
                $('#ebook_5').val(id) 
                $('#title_5').html(name) 
                $('#img_5').attr('src' , '<?=base_url()?>assets/uploads/images/coverimage/'+ img)  
			} else if ($('#ebook_6').val() == '') {
                $('#ebook_6').val(id) 
                $('#title_6').html(name) 
                $('#img_6').attr('src' , '<?=base_url()?>assets/uploads/images/coverimage/'+ img)  
			}
        }
        
        $('#clear1').click(function() {
            $('#ebook_1').val('') 
                $('#title_1').html('. . .') 
                $('#img_1').attr('src' , 'http://via.placeholder.com/100x130')
        })

        $('#clear2').click(function() {
            $('#ebook_2').val('') 
                $('#title_2').html('. . .') 
                $('#img_2').attr('src' , 'http://via.placeholder.com/100x130')
        })
        
        $('#clear3').click(function() {
            $('#ebook_3').val('') 
                $('#title_3').html('. . .') 
                $('#img_3').attr('src' , 'http://via.placeholder.com/100x130')
        })
        
        $('#clear4').click(function() {
            $('#ebook_4').val('') 
                $('#title_4').html('. . .') 
                $('#img_4').attr('src' , 'http://via.placeholder.com/100x130')
        })
        
        $('#clear5').click(function() {
            $('#ebook_5').val('') 
                $('#title_5').html('. . .') 
                $('#img_5').attr('src' , 'http://via.placeholder.com/100x130')
        })
        
        $('#clear6').click(function() {
            $('#ebook_6').val('') 
                $('#title_6').html('. . .') 
                $('#img_6').attr('src' , 'http://via.placeholder.com/100x130')
        })
        
	</script>
</body>

</html>
