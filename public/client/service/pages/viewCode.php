<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
if(isset($_GET['id'])) {
$id = $_GET['id'];
}

$check_order = $ManhDev->get_row("SELECT * FROM `soucerCode` WHERE `id` = '$id' ");

?>
<title>Thông Tin Code Mã Số <?=$check_order['id'];?></title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<?php if(isset($check_order) or isset($_GET['id'])) { ?>
<div class="row">
<div class="col-md-12">
<div class="row mb-3">
<div class="col-6">
<a href="/service/code/order" class="btn btn-primary btn-block"><img src="https://img.icons8.com/stickers/100/000000/code.png" alt="" width="25" height="25"> Mua Code</a>
</div>
<div class="col-6">
<a href="/service/code/list" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/nolan/64/online-shopping.png" alt="" width="25" height="25"> Code Đã Mua</a>
</div>
</div>

<div class="form-group">
    <label>Sản Phẩm:</label>
    <h5><?=$check_order['title'];?></h5>
</div>

<div class="form-group">
    <label>Mô Tả:</label>
    <textarea rows="5" class="form-control" placeholder="<?=$check_order['note'];?>" disabled></textarea>
</div>

<div class="form-group">
    <label>Giá Tiền: </label>
    <input type="text" class="form-control mb-2" placeholder="<?=tien($check_order['money']);?> Coin" disabled>
</div>
<button type="submit" id="muacode" class="btn btn-success btn-block mb-3">Thanh Toán</button>
<a href="/service/code/list" class="btn btn-secondary btn-block">Quay Lại</a>

<div class="form-group">
<label>Ảnh Demo Code:</label>
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
<script type="text/javascript">
$(document).ready(function(){
		$('#muacode').click(function() {
		$('#muacode').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'id'   : '<?=$check_order['id'];?>'
		};
		$.post("/api/service/buyCode", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#muacode').html('Thanh Toán').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#muacode').html('Thanh Toán').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<?php } else { ?>
<div class="row">
<div class="col-md-12">
<div class="row mb-5">
<div class="col-6">
<a href="/service/code/order" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/stickers/100/000000/code.png" alt="" width="25" height="25"> Mua Code</a>
</div>
<div class="col-6">
<a href="/service/code/list" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/nolan/64/online-shopping.png" alt="" width="25" height="25"> Code Đã Mua</a>
</div>
</div>

<div class="form-group text-center">
<img src="https://img.icons8.com/offices/64/000000/no-sugar2.png" alt="Mạnh Dev | Bro Code Được Dấu Tên" ><p>Không có dữ liệu để hiển thị! Có thể bạn đã nhập sai đường link</p>
</div>
</div>
</div>
<?php } ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>