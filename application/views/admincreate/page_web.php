
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link
rel="icon"
type="image/png"
href="../icon/icon.ico"
/>
<link
rel="stylesheet"
href="css/dashboard.css"
>
<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>
<title>ระบบจัดการเบื้อหลังระบบ</title>
</head>
<body>
<div class="container-group-dash">

<div class="dashboard">

<div class="sidebar">
<?php $this->load->view('admincreate\layout\aside_menu');?>
</div>


<div class="body-dashboard">
<div class="discount_member">
<h2>ข้อมูลเมนูเว็บ</h2>
<br>
<form
action=""
method="post"
>
<table>
<tr>
<td>รหัสเมนู</td>
<td><input
class="input"
type="text"
name="menuID"
id=""
placeholder="กรอกรหัสเมนู"
></td>
</tr>
<tr>
<td>ชื่อเมนู</td>
<td><input
class="input"
type="text"
name="menuname"
id=""
placeholder="กรอกชื่อเมนู"
></td>
</tr>
<tr>
<td>รายละเอียดเมนู</td>
<td><input
class="input"
type="text"
name="menudetail"
id=""
placeholder="กรอกรายละเอียด (ถ้ามี)"
></td>
</tr>
</table>
<input
class="btn"
type="submit"
value="บันทึกข้อมูล"
> <input
class="btn"
type="reset"
value="ยกเลิก"
>
</form>
</div>
</div>

</div>
<div class="forfooter-dash"></div>
</div>

<script
src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"
></script>
<script>

</script>
</body>
</html>