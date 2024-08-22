<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}

if(isset($_GET['code'])) {
$code = $_GET['code'];
}

$check_order = $ManhDev->get_row("SELECT * FROM `orders` WHERE `username` = '".$ManhDev->users('username')."' AND `trading` = '$code' ");
?>
<title>Thông Tin Hóa Đơn #<?=$code;?></title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-6 mb-3">
<a href="/service/account/order" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/arcade/64/000000/experimental-shop-arcade.png" alt="" width="25" height="25"> Danh Sách</a>
</div>
<div class="col-6 mb-3">
<a href="/service/account/list" class="btn btn-primary btn-block"><img src="https://img.icons8.com/dusk/64/000000/list--v1.png" alt="" width="25" height="25">Lịch Sử Mua</a>
</div>
</div>
<div class="card">
<div class="card-body">
<div class="ribbon-title ribbon-primary">Thông Tin Hóa Đơn #<?=$code;?></div>
<div class="mt-4">
<div class="row">
<div class="col-md-6 mb-3">
<ul>
<?php if($check_order) { ?>
<li>Loại tài khoản: <b><?=$check_order['title'];?></b></li>
<li>Số lượng: <b style="color: green;"><?=tien($check_order['amount']);?></b> Tài Khoản</li>
<li>Số tiền: <b style="color: red;"><?=tien($check_order['money']);?>đ</b></li>
<li>Người mua: <b><?=$check_order['username'];?></b></li>
<li>Thời gian thanh toán: <b><?=$check_order['time'];?></b></li>
<?php } else if(empty($code)) { ?>
<li><b class="text-danger">Bạn Đã Không Dùng Đúng Link Xem Acc.</b></li>
<li><b class="text-danger">Có Thể Bạn Nhập Sai Mã Đơn Hàng.</b></li>
<li><b class="text-danger">Vui Lòng Nhập Mã Đơn Hàng Chính Xác.</b></li>
<li><b class="text-danger">Bạn Đang Cố Bug Lỗi Này?</b></li>
<?php } else if(!$check_order) { ?>
<li><b class="text-danger">Thông Tin Đơn Hàng Không Chính Xác, Không Tồn Tại.</b></li>
<li><b class="text-danger">Đơn Hàng Không Thuộc Về Bạn. Hãy Kiểm Tra Lại!</b></li>
<li><b class="text-danger">Có Thể Đơn Này Đã Được Tài Khoản Khác Mua Lại.</b></li>
<li><b class="text-danger">Bạn Đang Cố Bug Lỗi Này?</b></li>
<?php } else if($ManhDev->users('username') !== $check_order['username']) { ?>
<li><b class="text-danger">Tài Khoản Không Thuộc Về Đơn Hàng Này. Hãy Kiểm Tra Lại!</b></li>
<li><b class="text-danger">Có Thể Đơn Này Được Tài Khoản Khác Mua Lại</b></li>
<li><b class="text-danger">Bạn Đang Cố Bug Lỗi Này?</b></li>
<?php } else { ?>
<li><b class="text-danger">Thông Tin Đơn Hàng Không Chính Xác Hoặc Không Tồn Tại.</b></li>
<li><b class="text-danger">Đơn Hàng Này Không Thuộc Quyền Sở Hữu Của Bạn.</b></li>
<li><b class="text-danger">Bạn Đang Cố Bug Lỗi Này?</b></li>
<?php } ?>
</ul>
</div>
<?php if($check_order) { ?>
<div class="col-md-6 mb-3">
<label for="exampleInputEmail1">Bấm Vào Để Copy Full:</label>
<textarea id="taikhoan" rows="5" class="form-control" readonly="" onclick="manhdz('#taikhoan')">
<?php 
$acc_mua = $ManhDev->get_list("SELECT * FROM `account` WHERE `username` = '".$ManhDev->users('username')."' AND `trading` = '".$check_order['trading']."' ");
foreach($acc_mua as $row) { ?>
<?=$row['note'];?>

<?php } ?>
</textarea>
</div>
<?php } ?>
<div class="col-md-12">
<a href="/service/account/list" class="btn btn-primary btn-block">Quay Lại</a>
</div>
</div>
</div>
</div>
</div>
<script>
function manhdz(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  Swal.fire("Thành Công", "Copy Thành Công", "success");
  $temp.remove();
 
}
</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>