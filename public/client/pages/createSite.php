<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Tạo Website Riêng</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-md-12">
<div class="card mb-4">
<div class="card-body">
<h6 class="card-title mb-4">Tạo website riêng</h6>
<div class="alert alert-danger" role="alert">
- Bạn phải đạt cấp bậc cộng tác viên hoặc đại lý mới có thể tạo web con! <br>
- Nghiêm cấm các tiên miền có chữ : Facebook, Instagram để tránh bị vi phạm bản quyền. <br>
- Khách hàng tạo tài khoản và sử dụng dịch vụ ở site con. Tiền sẽ trừ vào tài khoản của đại lý ở
site chính. Vì thế để khách hàng mua được tài khoản đại lý phải còn số dư. <br>
- Chúng tôi hỗ trợ mục đích kinh doanh của tất cả cộng tác viên và đại lý!
</div>
<div class="form-group mb-3">
<label class="form-label" for="">Api Token</label>
<div class="input-group">
<input class="form-control" type="text" value="<?=$ManhDev->users('apitoken');?>" readonly="">
<div class="input-group-append">
<button class="btn btn-primary" id="changeToken">Thay Token</button>
</div>
</div>
</div>
<div class="form-group">
<label class="form-label" for="">Tên miền</label>
<div class="input-group mb-3">
<input class="form-control" type="text" id="domain" placeholder="Nhập tiên miền cần kích hoạt" value="<?=$ManhDev->get_row(" SELECT * FROM `ds_sitecon` WHERE `username` = '".$ManhDev->users('username')."' ORDER BY `id` DESC ")['site_con'];?>">
<div class="input-group-append">
<button type="submit" class="btn btn-primary" id="luuDomain">Lưu Lại</button>
</div>
</div>
</div>
<div class="alert alert-primary " role="alert">
<div class="card-body p-0">
<p class="fw-bold">Hướng dẫn tạo website:</p>
<p><span class="fw-bold">- Bước 1 :</span> <span>Bạn cần phải có tên miền, nếu chưa bạn có thể mua tên miền <a href="https://zalo.me/<?=$ManhDev->site('phoneAdmin');?>" target="_blank" rel="noopener noreferrer" class="text-light"><?=$ManhDev->site('phoneAdmin');?></a></span></p>
<p><span class="fw-bold">- Bước 2 :</span> <span>Trỏ Nameserver1: <b class="text-danger"><?=$nsv1;?></b></span></p>
<p><span class="fw-bold">- Bước 3 :</span> <span>Trỏ Nameserver2: <b class="text-danger"><?=$nsv2;?></b></span></p>
<p><span class="fw-bold">- Bước 4 :</span> <span>Sau khi đã trỏ Nameserver bạn hãy liên hệ zalo: <b class="text-white"><a href="https://zalo.me/<?=$ManhDev->site('phoneAdmin');?>" target="_blank" rel="noopener noreferrer" class="text-light">https://zalo.me/<?=$ManhDev->site('phoneAdmin');?></a></b> để hỗ trợ kích hoạt.</span></p>
<p><span class="fw-bold">- Bước 5 :</span> Truy cập vào trang của bạn và nhập api token (lưu ý trước lúc kích hoạt api token không được để lộ tên miền tránh bị kích hoạt tài khoản admin).
</p>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
		$('#changeToken').click(function() {
		$('#changeToken').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
		    'ManhDev'       : '<?=$ManhDev->users('username');?>',
		};
		$.post("/api/profile/changeToken", formData,
			function (data) {
			    if(data.status == 'error') {
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#changeToken').html('Thay Token').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#changeToken').html('Thay Token').prop('disabled', false);
			    }
		}, "json");
	});
});

$(document).ready(function(){
		$('#luuDomain').click(function() {
		$('#luuDomain').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
		    'domain'  : $("#domain").val()
		};
		$.post("/api/profile/changeDomain", formData,
			function (data) {
			    if(data.status == 'error') {
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#luuDomain').html('Lưu Lại').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#luuDomain').html('Lưu Lại').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>