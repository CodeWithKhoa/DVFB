<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
if(isset($_GET['id'])) {
$id = $_GET['id'];
}

$check_order = $ManhDev->get_row("SELECT * FROM `soucerWeb` WHERE `id` = '$id' ");
?>
<title>Tạo Trang Web Mã Số <?=tien($check_order['id']);?></title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<?php if(isset($check_order) or isset($_GET['id']) or tien($check_order['id']) > 0 or $check_order) { ?>
<style>
    .fa-w-18, .fa-w-14, .fa-w-16 {
        height: 18px;
    }
    .border-danger {
        border-radius: 5px;
        border: 1px solid red;
        padding: 6px;
    }
    
    .padding {
        padding: 12px;
    }
</style>
<div class="row">
<div class="col-md-12">
<div class="pt-3">
<div class="row">
<div class="col-md-3 mb-3">
<div class="ribbon-title">Mã Số #<span itemprop="productID"><?=tien($check_order['id']);?></span></div>
<img title="" class="border-danger img-fluid rounded" src="<?=$check_order['img'];?>" alt="Manh Dev | Zalo: 0528139892">
<div class="pt-2">
<center><a href="<?=$check_order['img'];?>" target="_blank" rel="noopener noreferrer" class="btn btn-danger"><i class="fa fa-desktop"></i> Xem Demo</a></center>
</div>
</div>
<div class="col-md-6 mb-3">
<h3 class="dt-title bold" itemprop="name"><?=$check_order['title'];?></h3></center>
<hr class="border border-warning" style="width: 80%">

<h4 class="title1 border border-info py-2 container"><center><?=$check_order['note'];?></center></h4>
<div class="border border-primary padding">
<div class="red bold">THÔNG BÁO TẠO WEB</div>
<div>
<div class="it-chk"> <i class="fa fa-plus"></i> Bạn chỉ trả phí <b class="text-danger"><?=tien($check_order['money']);?> Coin</b> cho mẫu web này khi lần đầu tạo web. Còn những tháng sau, bạn chỉ cần gia hạn <b>30k</b> trực tiếp tại website của chúng tôi.</div>
</div>
</div>
<br>
<div class="border border-primary padding">
<div class="red bold">CAM KẾT TỪ CHÚNG TÔI</div>
<div>
<div class="it-chk"><i class="fa fa-thumbs-up"></i> Cam kết hổ trợ sửa lỗi</div>
<div class="it-chk"><i class="fa fa-thumbs-up"></i> Hỗ trợ người dùng 24/7</div>
<div class="it-chk"><i class="fa fa-thumbs-up"></i>Bảo mật thông tin người dùng</div>
<div class="it-chk"><i class="fa fa-thumbs-up"></i> Nếu chưa có tên miền. Vui lòng mua <a target="_blank" href="/service/domain/order">Tại đây</a></div>
<div class="it-chk"><i class="fa fa-thumbs-up"></i> Bạn cần có sẵn 1 tên miền để thêm vào ô tên miền</div>
</div>
</div>
</div>
<div class="col-md-3 mb-3">
<div class="card">
<div class="card-body">
<center><strong class="dt-price-title">Tiến Hành Tạo Website</strong></center>
<div class="pt-2 text-center">
<p class="text-danger">Tổng:<?=tien($check_order['money']);?>0<sup>Coin</sup>/ Tháng</p>
</div>
<div class="div">
    <div class="form-group">
    <label>Tên Miền Của Bạn:</label>
    <input type="text" id="tenmien" class="form-control" placeholder="Nhập Tên Miền Đã Mua">
    </div>
    <div class="form-group">
    <label>Thời Hạn:</label>
    <select class="form-control" id="timemua">
        <option value="1">1 Tháng</option>
		<option value="2">2 Tháng</option>
		<option value="3">3 Tháng</option>
		<option value="4">4 Tháng</option>
		<option value="5">5 Tháng</option>
		<option value="6">6 Tháng</option>
		<option value="7">7 Tháng</option>
		<option value="8">8 Tháng</option>
		<option value="9">9 Tháng</option>
		<option value="10">10 Tháng</option>
		<option value="11">11 Tháng</option>
		<option value="12">12 Tháng</option>
	</select>
</div>
<div class="form-group">
<button id="taoweb" type="button" class="btn btn-info btn-block"><i class="fa fa-shopping-cart"></i> Tạo Ngay</button>
</div>

<script type="text/javascript">
$(document).ready(function(){
		$('#taoweb').click(function() {
		$('#taoweb').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'id'      : '<?=$check_order['id'];?>',
            'domain'  : $("#tenmien").val(),
            'time'    : $("#timemua").val()
		};
		$.post("/api/service/createWeb", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#taoweb').html('<i class="fa fa-shopping-cart"></i> Tạo Ngay').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#taoweb').html('<i class="fa fa-shopping-cart"></i> Tạo Ngay').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<label>Image Mẫu Website:</label>
<div class="row">
<?php
$imng = $ManhDev->get_list("SELECT * FROM `demo_img_code` WHERE `code` = '".$check_order['code']."' ");
foreach($imng as $rowimg) { ?>
<div class="col-lg-4 col-md-6 col-sm-12 mb-3">
<a href="<?=$rowimg['img']; ?>" target="_blank"><img src="<?=$rowimg['img']; ?>" class="card-img-top img-fluid rounded" alt="ManhDev | Zalo: 0528139892"/></a><br><br>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php } else { ?>
<div class="row">
<div class="col-md-12">
<div class="row mb-5">
<div class="col-6">
<a href="/service/createWeb/view" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/stickers/100/000000/code.png" alt="" width="25" height="25"> Danh Sách</a>
</div>
<div class="col-6">
<a href="/service/createWeb/list" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/nolan/64/online-shopping.png" alt="" width="25" height="25"> Website Đã Tạo</a>
</div>
</div>

<div class="form-group text-center">
<img src="https://img.icons8.com/offices/64/000000/no-sugar2.png" alt="Mạnh Dev | Bro Code Được Dấu Tên" ><p>Không có dữ liệu để hiển thị! Có thể bạn đã nhập sai đường link</p>
</div>
</div>
</div>
<?php } ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>