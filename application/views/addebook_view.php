<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>เพิ่มสินค้า</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-12 mt-3">
				<div class="card-header shadow">
					<h5 class="text-center font-weight-bold bg-dark py-2 text-light">เพิ่มหนังสือ</h5>
				</div>
				<div class="card-body shadow">
					<form action="<?php echo base_url() ?>register/register_submit" method="post">
						<table class="table table-light">
							<tr>
								<th class="align-middle" width="15%">ชื่อหนังสือ</th>
								<td width="90%"><input type="text" name="ebookname" class="form-control w-50"></td>
							</tr>
							<tr>
								<th class="align-middle">ประเภทหนังสือ</th>
								<td><input type="text" required="required" name="password" class="form-control w-50"></td>
							</tr>
							<tr>
								<th class="align-middle">อัพโหลดไฟล์</th>
								<td><input type="file" name="namea" class="form-control w-50"></td>
							</tr>
							<tr>
								<th class="align-middle">การเผยแพร่</th>
								<td>
                                <select class="form-control" name="" id="" style="width:200px">
                                    <option value="ss">เผยแพร่</option>
                                    <option value="ss">กำหนดเวลา</option>
                                </select>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<hr>
								</td>
							</tr>
							<tr>
								<th class="align-middle">ราคา</th>
								<td class="form-group"><input type="number" name="price" class="form-control w-25"
										placeholder=" "> 
							</tr>
							<tr>
								<th class="align-middle">ราคาส่วนลด</th>
								<td class="form-group"><input type="number" name="dprice" class="form-control w-25"
										placeholder=" "> 
							</tr>
							<tr>
								<th class="align-middle">ราคาสุทธิ</th>
								<td><input type="number" name="nprice" class="form-control w-25"
										placeholder=""></td>
							</tr>
							<tr>
								<td colspan="2">
									<hr>
								</td>
							</tr>
							<tr>
								<th class="align-middle">กลุ่มเป้าหมาย</th>
								<td colspan="5"><textarea class="form-control" name="target" rows="2"
										placeholder=""></textarea></td>
							</tr>
							<tr>
								<th class="align-middle">คุณสมบัติ</th>
								<td colspan="5"><textarea class="form-control" name="properties" rows="2"
										placeholder=""></textarea></td>
							</tr>
							<tr>
							<tr>
								<td colspan="2" class="text-center">
									<button type="submit" class="btn btn-primary">บันทึกหนังสือ</button>

								</td>
							</tr>
						</table>
					</form>
				</div>
				<hr class="mt-5 mb-5">
			</div>
		</div>
	</div>
</body>

</html>
