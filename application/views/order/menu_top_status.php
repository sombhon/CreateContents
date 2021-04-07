<?php
$menu1 ='';
$menu2 ='';
$menu3 ='';
$menu4 ='';
    if (!empty($this->session->userdata('menu_order_selected'))) {
        if($this->session->userdata('menu_order_selected') == 'carts_select'){
            $menu1 = 'bg-danger text-light';
        } else if($this->session->userdata('menu_order_selected') == 'payorder_select') {
            $menu2 = 'bg-danger text-light';
        } else if($this->session->userdata('menu_order_selected') == 'approval_select') {
            $menu3 = 'bg-danger text-light';
        } else if($this->session->userdata('menu_order_selected') == 'order_complete_select') {
            $menu4 = 'bg-danger text-light';
        }
    }
?>
<div class="container mt-5 mb-2">
	<div class="row text-center">
		<div class="col-sm-2"></div>
		<a href="<?=base_url()?>order/carts" class="col-sm-2 text-decoration-none <?=$menu1?> py-2 m-1">ตะกร้าสินค้า</a>
		<a href="<?=base_url()?>order/payorder" class="col-sm-2 text-decoration-none <?=$menu2?> py-2 m-1">รอการชำระ</a>
		<a href="<?=base_url()?>order/wait_for_approval" class="col-sm-2 text-decoration-none <?=$menu3?> py-2 m-1">รอการอนุมัติ</a>
		<a href="<?=base_url()?>order/order_complete" class="col-sm-2 text-decoration-none <?=$menu4?> py-2 m-1">ดำเนินการเสร็จสิ้นแล้ว</a>
		<div class="col-sm-2 py-2 m-1"></div>
	</div>
</div>
