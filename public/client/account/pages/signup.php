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
<label class="form-label" for="username">Họ Và Tên</label>
<div class="position-relative input-custom-icon">
<input class="floating-input form-control" type="text" id="name" placeholder="Nhập Họ Và Tên">
<span class="fas fa-user"></span>
</div>
</div>

<div class="mb-3">
<label class="form-label" for="username">Số Điện Thoại</label>
<div class="position-relative input-custom-icon">
<input class="floating-input form-control" type="number" id="phone" placeholder="Nhập Số Điện Thoại">
<span class="fas fa-phone"></span>
</div>
</div>

<div class="mb-3">
<label class="form-label" for="username">Gmail</label>
<div class="position-relative input-custom-icon">
<input class="floating-input form-control" type="text" id="email" placeholder="Nhập Gmail">
<span class="fas fa-envelope"></span>
</div>
</div>

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
<div class="mb-3">
<div class="g-recaptcha" data-sitekey="<?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'captcha' ")['value'];?>"></div>
</div>

<div class="mt-3">
<button type="button" id="signup" class="btn btn-block btn-outline-danger">Đăng Ký <i class="fas fa-user-plus"></i></button>
</div>
<div class="mt-4 text-center">
<p class="mb-0"> <span class="badge badge-primary text-uppercase"> Bạn đã có tài Khoản? <a href="/auth/login" class="text-danger">Đăng
Nhập Ngay</a></span></p>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
		$('#signup').click(function() {
		$('#signup').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
		    'type'        : 'signup',
		    'name'        : $("#name").val(),
            'phone'       : $("#phone").val(),
            'email'       : $("#email").val(),
            'username'    : $("#username").val(),
            'password'    : $("#password").val(),
            'captcha'     : $("#g-recaptcha-response").val()
		};
		$.post("/api/profile/AuthForm", formData,
			function (data) {
			    if(data.status == 'error') {
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#signup').html('Đăng Ký <i class="fas fa-user-plus"></i>').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "/auth/login" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#signup').html('Đăng Ký <i class="fas fa-user-plus"></i>').prop('disabled', false);
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