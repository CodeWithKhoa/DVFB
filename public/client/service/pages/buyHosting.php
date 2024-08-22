<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}

if(isset($_GET['code'])) {
$code = $_GET['code'];
}
$danhsach = $ManhDev->get_list("SELECT * FROM `list_Host` WHERE `code` = '$code' ");
foreach($danhsach as $row) {
?>
<title>Xác Nhận Mua Hosting <?=$row['title'];?></title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">

<div class="col-md-12">
<div class="card mb-4">
<div class="card-body">
<h4>Xác Nhận Mua Hosting <?=$row['title'];?><br>Giá Tiền: <b clas="text-warning"><?=tien($row['money']);?></b> Coin</h4>
<hr>
<div class="row">
<div class="col-md-6 mb-3">
<div class="alert text-white bg-secondary mb-3" role="alert">
- Bạn Vui Lòng Không Mua Hosting Với Mục Đích Làm Web Scam - Web Cờ Bạc.<br>
- Hositing Sẽ Được Tạo Từ 1 - 3p Kể Từ Khi Đăng Kí.<br>
- Sau Khi Mua Hosting Sau! Bạn Vào Host Lấy IP Host Để Trỏ!<br>
- Bạn Cần Có Tên Miền Trước Rồi Mới Mua Hosting Nhé.
</div>
</div>
<div class="col-md-6 mb-3">
<div class="form-group">
<label class="form-label" for="">Tên Miền Đã Mua:</label>
<input class="form-control" type="text" id="domain" placeholder="Tên Miền Của Bạn">
</div>

<button type="button" class="btn btn-block btn-info" id="danghosting"><img src="https://img.icons8.com/color/48/000000/soccer-yellow-card.png" height="20px"/> Mua Ngay</button>
</div>


</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
		$('#danghosting').click(function() {
		$('#danghosting').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'domain'   : $("#domain").val(),
            'typeHost' : '<?=$row['code'];?>'
		};
		$.post("/api/service/buyHost", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#danghosting').html('Mua Ngay').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#danghosting').html('Mua Ngay').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';
} ?>