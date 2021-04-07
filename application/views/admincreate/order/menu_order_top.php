<?php
$menu1 ='';
$menu2 ='';
$menu3 ='';
$menu4 ='';
    if (!empty($this->session->userdata('menu_order_selected'))) {
        if($this->session->userdata('menu_order_selected') == 'approval_select'){
            $menu1 = 'bg-danger';
        } else if($this->session->userdata('menu_order_selected') == 'payproof_select') {
            $menu2 = 'bg-danger';
        } 
        // else if($this->session->userdata('menu_order_selected') == 'approval_select') {
        //     $menu3 = 'bg-danger';
        // } else if($this->session->userdata('menu_order_selected') == 'order_complete_select') {
        //     $menu4 = 'bg-danger';
        // }
    }
?>
<div class="container-fluit w-100 mb-2">
	<div class="row text-center bg-dark" style="border:solid 1px black text-light">
		<a href="<?=base_url()?>admin/create/orderWait_for_approval" class="col-md-2 text-light text-decoration-none <?=$menu1?> py-2 m-1">คำสั่งซื้อรอการยืนยัน</a>
		<!-- <a href="<?=base_url()?>admin/create/orderProof_pay" class="col-md-2 text-light text-decoration-none <?=$menu2?> py-2 m-1">บันทึกโอนจ่าย</a> -->
	</div>
</div>
