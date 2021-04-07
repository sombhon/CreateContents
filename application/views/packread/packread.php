<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="icon/icon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>เหมาอ่านแบบไม่อั้น</title>
</head>

<body>
	<div class="container-group">
		<jsp:include page="header.jsp" />
		<div class="packread">
			<div class="paper">
				<h2>แพ็คเหมา ๆ อ่านไม่อั้นยาว ๆ</h2>
				<!-- <% int[][] price = {{30,299} ,{60 , 550} , {365,3300}};
            int x = 0;
            int j = 0;
            while(x < 3){ %> 
				<div class="packreader">
					<div class="name">
						เหมาอ่าน
						<%= price[x][0]%>
						วัน 
					</div>
					<div class="price"><%= price[x][1] %>
					</div>
					<div class="buy">ซื้อ</div> 
				</div>
				<% x++;} %>-->
				<div class="bookreview">
					<h2>ราคาไหนก็อ่านฟรีทั้งหมด เพียงแค่ซื้อในราคาเหมา ๆ
						ฟรีตลอดอายุแพ็คเกจ</h2>
					<div class="box">
						<div class="box-book">
							<!-- <% for(int i =0;i<6; i++){%> -->
							<div class="re-box">
								<img src="https://images.unsplash.com/photo-1587448803880-d808d8b10356?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
									alt="" srcset="">
								<p>รีวิว : 5 ดาว</p>
								<div class="detailsbook">
									<P class="head">ชื่อหนังสือ</P>
									<div class="sale">
										<p class="price">250 บาท</p>
										<i class="fa fa-cart-plus" aria-hidden="true"></i>
									</div>
								</div>
							</div>
							<% }%>
						</div>
						<div class="box-book">
							<!-- <% for(int i =0;i<6; i++){%> -->
							<div class="re-box">
								<img src="https://images.unsplash.com/photo-1587448803880-d808d8b10356?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80"
									alt="" srcset="">
								<p>รีวิว : 5 ดาว</p>
								<div class="detailsbook">
									<P class="head">ชื่อหนังสือ</P>
									<div class="sale">
										<p class="price">250 บาท</p>
										<i class="fa fa-cart-plus" aria-hidden="true"></i>
									</div>
								</div>
							</div>
							<!-- <% }%> -->
						</div>
					</div>
					<p>*แพ็คเหมาอ่านไม่สามารถโหลดและเก็บไว้อ่านได้</p>
				</div>
			</div>
		</div>
	</div>
	</div>
</body>

</html>
