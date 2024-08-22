<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php'; 
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/'</script>";
}

if($ManhDev->users('password2')) {
echo "<script>location.href = '/profile/info'</script>";
}
?>
<title>Cài Đặt Mật Khẩu Cấp 2</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="content-page">
<div class="container-fluid">
 <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card mb-4">
    <div class="card-body">
        <div class="ribbon-title ribbon-primary">Cài Đặt Mật Khẩu Cấp 2</div>
       <div class="mt-4">
                    <div class="mb-3">
                        <label class="form-label">Mật Khẩu Cấp 2</label>
                        <input type="password" class="form-control" id="password" placeholder="Nhập Mật Khẩu Để Cài Đặt">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block" id="doipass"><i class="fa fa-lock"></i> Thay Đổi</button>
                        <a class="btn btn-danger btn-block" href="/profile/info"><i class="fa fa-back"></i> Quay Lại</a>
                    </div>
       </div>
    </div>
</div>
</div>

<script>
$(document).ready(function(){
		$('#doipass').click(function() {
		$('#doipass').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'password'    : $("#password").val()
		};
		$.post("/api/profile/changePassword2", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#doipass').html('<i class="ri-lock-line"></i> Thay Đổi').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "/profile/info" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#doipass').html('<i class="ri-lock-line"></i> Thay Đổi').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
</div>
</div>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>
