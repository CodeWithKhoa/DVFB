<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php'; 
if($ManhDev->users('username')) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Đăng Nhập Website</title>
<div class="container">
<div class="d-flex flex-column min-vh-100 px-3 pt-4">
<div class="row justify-content-center my-auto">
<div class="col-md-8 col-lg-6 col-xl-5">
<div class="card">
<div class="card-body p-4">
<div class="text-center mt-2">
<h4>Đăng Nhập Website</h4>
</div>
<div class="p-2 mt-4">
<div class="mb-3">
<label class="form-label" for="username">Tài khoản</label>
<div class="position-relative input-custom-icon">
<input class="form-control" type="text" id="username" placeholder="Tài Khoản Của Bạn">
<span class="fas fa-user"></span>
</div>
</div>

<div class="mb-3">
<label class="form-label" for="password-input">Mật khẩu</label>
<div class="position-relative auth-pass-inputgroup input-custom-icon">
<span class="fas fa-lock"></span>
<input class="form-control" type="password" id="password" placeholder="******">
<button type="button" class="btn btn-link position-absolute h-100 end-0 top-0"  id="btnPassword">
<i class="fas fa-eye font-size-18 text-muted"></i>
</button>
</div>
</div>
<div class="row mt-4">
    <div class="form-group col-md-6 mb-3">
        <div class="form-lavel" for="captcha">
            <img src="/captcha" alt="Captcha Image"> <br> <br>
            <input class="form-control" type="text" id="captcha" placeholder="Nhập mã captcha">
        </div>
    </div>
</div>
<div class="form-check py-1">
<input type="checkbox" class="form-check-input" id="auth-remember-check" checked="">
<label class="form-check-label" for="auth-remember-check">Ghi nhớ</label>
</div>
<div class="mt-3">
<button class="btn btn-outline-primary w-100 waves-effect waves-light" type="button" id="login">Đăng Nhập <i class="fas fa-right-to-bracket"></i></button>
</div>
<div class="mt-4 text-center">
<p class="mb-0"> <span class="badge badge-primary text-uppercase"> Bạn chưa có tài Khoản? <a href="/auth/register" class="text-danger">Đăng
Ký Ngay <i class="fas fa-user-plus"></i></a></span></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="verimail" tabindex="-1" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header"><h5 class="modal-title">Xác Nhận Mã Đã Gửi Vào Gmail</h5></div>
<div class="modal-body">
<b id="ketqua_mail"></b>
<div class="form-group mb-3">
<label>Mã Xác Nhận</label>
<input class="form-control" type="number" id="macode" placeholder="Nhập Mã Xác Nhận">
</div>
<button type="submit" class="btn btn-primary btn-block" id="xacnhanmail">Xác Nhận</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="veripass" tabindex="-1" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header"><h5 class="modal-title">Nhập Mật Khẩu Cấp 2 Của Bạn</h5></div>
<div class="modal-body">
<b id="ketqua_pass2"></b>
<div class="form-group mb-3">
<label>Mật Khẩu Cấp 2</label>
<input class="form-control" type="password" id="mkc2" placeholder="Nhập Mật Khẩu Cấp 2">
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary btn-block" id="xacnhanpass">Xác Nhận</button>
</div>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
		$('#login').click(function() {
		$('#login').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
		    'type'        : 'login',
            'username'    : $("#username").val(),
            'password'    : $("#password").val(),
            'captcha'     : $("#captcha").val()
		};
		$.post("/api/profile/AuthForm", formData,
			function (data) {
			    if(data.status == 'error') {
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#login').html('Đăng Nhập').prop('disabled', false);
			    } else if(data.status == 'Mail') {
			    $('#verimail').modal('show');
				$('#login').html('Đăng Nhập').prop('disabled', false);
			    } else if(data.status == 'Pass') {
			    $('#veripass').modal('show');
				$('#login').html('Đăng Nhập').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "/" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#login').html('Đăng Nhập').prop('disabled', false);
			    }
		}, "json");
	});
});

$(document).ready(function(){
		$('#xacnhanmail').click(function() {
		$('#xacnhanmail').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
		    'type'      : 'xacnhanmail',
            'username'  : $("#username").val(),
            'macode'    : $("#macode").val(),
		};
		$.post("/api/profile/AuthForm", formData,
			function (data) {
			    if(data.status == 'error'){
			    $('#ketqua_mail').html('<div class="alert alert-danger text-center" role="alert"><strong>' + data.msg + '</strong></div>');
				$('#xacnhanmail').html('Xác Nhận').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "/" },2000);  
			     $('#ketqua_mail').html('<div class="alert alert-success text-center" role="alert"><strong>' + data.msg + '</strong></div>');
			     $('#xacnhanmail').html('Xác Nhận').prop('disabled', false);
			    }
		}, "json");
	});
});

$(document).ready(function(){
		$('#xacnhanpass').click(function() {
		$('#xacnhanpass').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
		    'type'      : 'xacnhanpass',
            'username'  : $("#username").val(),
            'mkc2'      : $("#mkc2").val(),
		};
		$.post("/api/profile/AuthForm", formData,
			function (data) {
			    if(data.status == 'error'){
			     $('#ketqua_pass2').html('<div class="alert alert-danger text-center" role="alert"><strong>' + data.msg + '</strong></div>');
				$('#xacnhanpass').html('Xác Nhận').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "/" },2000);  
			     $('#ketqua_pass2').html('<div class="alert alert-success text-center" role="alert"><strong>' + data.msg + '</strong></div>');
			     $('#xacnhanpass').html('Xác Nhận').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<script>
const ipnElement = document.querySelector('#password')
const btnElement = document.querySelector('#btnPassword')
btnElement.addEventListener('click', function() {
const currentType = ipnElement.getAttribute('type')
  ipnElement.setAttribute(
    'type',
    currentType === 'password' ? 'text' : 'password'
  )
})
</script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js?<?=time();?>"></script>
<script src="/assets/js/metismenujs.min.js?<?=time();?>"></script>
<script src="/assets/js/simplebar.min.js?<?=time();?>"></script>
<script src="/assets/js/eva.min.js?<?=time();?>"></script>
<script src="/assets/js/app.js?t=<?=time();?>"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
</body>
</html>