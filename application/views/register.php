<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="icon/icon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css">
	<title>Create Contents : ซื้อหนังสืออีบุ๊คได้ในราคาพิเศษ</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-12 mt-5">
				<div class="card-header shadow">
					<h5 class="text-center font-weight-bold bg-dark py-2 text-light">สมัครสมาชิก</h5>
				</div>
				<div class="card-body">
					<form action="<?=base_url()?>register/register_submit" method="post">
                    <table class="table table-light">
                        <tr>
                            <th width="15%">E-Mail</th>
                            <td width="90%"><input type="email" name="email" class="form-control w-50"
								placeholder="exam@createcontents.com "></td>
                        </tr>
                        <tr>
                            <th>รหัสผ่าน</th>
                            <td><input type="password" required="required" name="password"
								class="form-control w-50" placeholder="Ab5xXGxscode (แนะนำ 8 ตัวอักษรขึ้นไป)"></td>
                        </tr>
                        <tr>
                            <th>นามแฝง</th>
                            <td><input type="text" name="namea" class="form-control w-50"
								placeholder="อัลกอ"></td>
                        </tr>
                        <tr>
                            <th>วันเกิด</th>
                            <td><input type="date" name="birthday" class="form-control w-25"
								placeholder="วันเกิด"></td>
                        </tr>
                        <tr>
                            <th>เพศ</th>
                            <td >
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="sextype" id="sexmen" value="ชาย"
									checked>
								<label class="mr-5" class="form-check-label" for="sexmen"> ชาย </label>
                            <input class="form-check-input" type="radio" name="sextype" id="sexsumen" value="หญิง"
									checked> <label class="form-check-label" for="sexsumen"> หญิง </label>
							</div>
                                    </td>
                        </tr>
                        <tr>
                            <th>ชื่อ - นามสกุล</th>
                            <td class="form-group"><input type="text" name="name" class="form-control" placeholder="ชื่อ "> <input
									type="text" name="lastname" class="form-control w25" placeholder="นามสกุล "></td>
                            <!-- <td>หหหหหหหห</td> -->
                        </tr>
                        <tr>
                            <th>เบอร์โทร</th>
                            <td><input type="text" name="telophone" class="form-control w-25"
								placeholder="060123123"></td>
                        </tr>
                        <tr>
                            <th>ที่อยู่</th>
                        </tr>
                        <tr>
                            <td colspan="3"><textarea class="form-control" name="address" rows="2"
								placeholder="บ้านเลขที่ 55 หมู่ 5 ต.หนองบัว"></textarea></td>
                        </tr>
                        <tr>
                            <th>อำเภอ</th>
                            <td><input class="form-control w-50" name="adistrict" type="text"
								class="form-control" placeholder="ภูเรือ"></td>
                        </tr>
                        <tr>
                            <th>จังหวัด</th>
                            <td><input class="form-control w-50" name="province" type="text"
								class="form-control" placeholder="เลย"></td>
                        </tr>
                        <tr>
                            <td>
							<button type="submit" class="btn btn-primary">ลงทะเบียน</button>

                            </td>
                        </tr>
                    </table>
						<div class="form-group">
							<label></label> 
						</div>
						<div class="form-group">
							<label></label> 
						</div>
						<div class="form-group">
							<label></label> 
						</div>
						<div class="form-group">
							<label></label>
							
							<div class="form-check">
							</div>
						</div>
						<div class="form-group">
							<label></label>
							<div class="d-flex">
								
							</div>
						</div>
						<div class="form-group">
							<label></label> 
						</div>
						<div class="form-group">
							<label></label>
							
						</div>
						<div class="form-group">
							<label></label> 
						</div>
						<div class="form-group">
							<label></label> 
						</div>
						<div class="form-group">
							<label></label> 
						</div>
						<div class="form-group d-flex justify-content-center">
						</div>
					</form>
				</div>

				<hr class="mt-5 mb-5">
			</div>
		</div>
	</div>

</body>

</html>
