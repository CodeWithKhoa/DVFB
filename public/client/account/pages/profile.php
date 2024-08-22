<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Thông Tin Tài Khoản</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
    <div class="card-body">
        <div class="ribbon-title ribbon-primary">Thông tin tài khoản</div>
       <div class="mt-4">
        <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label" for="">Họ và tên</label>
                        <input type="text" class="form-control" value="<?=$ManhDev->users('name');?>" readonly="">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label" for="">Email</label>
                        <input type="text" class="form-control" value="<?=$ManhDev->users('email');?>" readonly="">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label" for="">Tài khoản</label>
                        <input type="text" class="form-control" value="<?=$ManhDev->users('username');?>" readonly="">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label" for="">Số dư</label>
                        <input type="text" class="form-control" value="<?=tien($ManhDev->users('money'));?> coin" readonly="">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label" for="">Cấp độ</label>
                        <input type="text" class="form-control" value="<?=level($ManhDev->users('level'));?>" readonly="">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label class="form-label" for="">Thời gian tham gia</label>
                        <input type="text" class="form-control" value="<?=$ManhDev->users('time');?>" readonly="">
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-label" for="">Api Token</label>
                            <input class="form-control" type="text" value="<?=$ManhDev->users('apitoken');?>" readonly="">
                    </div>

                </div>
       </div>
    </div>
</div>        </div>
        <div class="col-md-6">
            <div class="card mb-4">
    <div class="card-body">
        <div class="ribbon-title ribbon-primary">Đổi mật khẩu</div>
       <div class="mt-4">
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu cũ</label>
                        <input type="password" class="form-control" id="old_password" placeholder="Nhập Mật Khẩu Cũ">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="new_password" placeholder="Nhập Mật Khẩu Mới">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="confirm_new_password" placeholder="Nhập Lại Mật Khẩu Mới"> 
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block" id="doipass"><i class="fa fa-lock"></i> Thay Đổi</button>
                    </div>
       </div>
    </div>
</div>        </div>

<div class="col-md-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="ribbon-title ribbon-primary">Bảo mật tài khoản</div>
            <div class="mt-4">
            <table class="table table-condensed">
<tbody>
<tr>
<td><img src="https://img.icons8.com/color/48/000000/circled-envelope.png"></td>
<td><strong>Security Email </strong>
</td>
<td>
<?php if($ManhDev->users('securityEmail') == "0") { ?>
<button class="btn btn-outline-danger btn-sm btn-block" id="batemail">Đang Tắt</button>
<?php } else { ?>
<button class="btn btn-outline-success btn-sm btn-block" id="batemail">Đang Bật</button>
<?php } ?>
</td>
</tr>
<tr>
<td><img src="https://img.icons8.com/color/48/000000/password.png"></td>
<td><strong>Security Password Level 2 </strong>
</td>
<td>
<?php 
if(empty($ManhDev->users('password2')) or $ManhDev->users('password2') == "") { ?>
<a class="btn btn-outline-info btn-sm btn-block" href="/profile/pass2"> Cài mật khẩu</a>
<?php } else if($ManhDev->users('securityPass') == "0") { ?>
<button class="btn btn-outline-danger btn-sm btn-block" id="batpass">Đang tắt</button>
<?php } else { ?>
<button class="btn btn-outline-success btn-sm btn-block" id="batpass">Đang Bật</button>
<?php } ?>
</td>
</tr>
</tbody>
</table>
<button class="btn btn-outline-warning btn-sm btn-block" onclick="thaypass()">Thay Đổi Mật Khẩu Cấp 2</button>
</div>
</div>
</div>
</div>
<div class="modal fade" id="editPass" tabindex="-1" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header"><h5 class="modal-title">Thay Đổi Mật Khẩu Cấp 2</h5></div>
<div class="modal-body">
<b id="ketqua_pass2"></b>
<div class="form-group mb-3">
<label>Mật Khẩu Cấp 2 Cũ</label>
<input class="form-control" type="password" id="mkc2_old" placeholder="Nhập Mật Khẩu Cấp 2 Hiện Tại">
</div>
<div class="form-group mb-3">
<label>Mật Khẩu Cấp 2 Mới</label>
<input class="form-control" type="password" id="mkc2_new" placeholder="Nhập Mật Khẩu Cấp 2 Mới">
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary btn-block" id="doipass2">Xác Nhận</button>
</div>
</div>
</div>
</div>
</div>

<script>
function thaypass() {
$('#editPass').modal('show');
}
$(document).ready(function(){
		$('#doipass2').click(function() {
		$('#doipass2').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'password'    : $("#mkc2_old").val(),
            'password1'   : $("#mkc2_new").val(),
		};
		$.post("/api/profile/editPassword2", formData,
			function (data) {
			    if(data.status == 'error'){
				$('#ketqua_pass2').html('<div class="alert alert-danger text-center" role="alert"><strong>' + data.msg + '</strong></div>');
				$('#doipass2').html('Xác Nhận').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "" },2000); 
			    $('#ketqua_pass2').html('<div class="alert alert-success text-center" role="alert"><strong>' + data.msg + '</strong></div>');
			     $('#doipass2').html('Xác Nhận').prop('disabled', false);
			    }
		}, "json");
	});
});

$(document).ready(function(){
		$('#doipass').click(function() {
		$('#doipass').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'password'    : $("#old_password").val(),
            'password1'   : $("#new_password").val(),
            'password2'   : $("#confirm_new_password").val()
		};
		$.post("/api/profile/changePassword", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#doipass').html('Thay Đổi').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#doipass').html('Thay Đổi').prop('disabled', false);
			    }
		}, "json");
	});
});

$(document).ready(function(){
		$('#batemail').click(function() {
		$('#batemail').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'type'    : 'batemail',
            <?php if($ManhDev->users('securityEmail') == "0") { ?>
            'onoff'   : 'on'
            <?php } else { ?>
            'onoff'   : 'off'
            <?php } ?>
		};
		$.post("/api/profile/AuthSecurity", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#batemail').html('Đang Tắt').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "" },1000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#batemail').html('Đang Bật').prop('disabled', false);
			    }
		}, "json");
	});
});

$(document).ready(function(){
		$('#batpass').click(function() {
		$('#batpass').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'type'    : 'batpass',
            <?php if($ManhDev->users('securityPass') == "0") { ?>
            'onoff'   : 'on'
            <?php } else { ?>
            'onoff'   : 'off'
            <?php } ?>
		};
		$.post("/api/profile/AuthSecurity", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#batpass').html('Đang Tẳt').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "" },1000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#batpass').html('Đang Bật').prop('disabled', false);
			    }
		}, "json");
	});
});
</script> 
</div>

<div class="row pt-4">
<div class="col-md-12">
<div class="card mb-4">
<div class="card-body">
<div class="ribbon-title ribbon-primary">Nhật kí đăng nhập</div>
<div class="mt-4">
<div class="table-responsive">
<table class="table table-bordered text-nowrap">
<thead>
<tr role="row" class="bg-primary">
<th class="text-center text-white">#</th>
<th class="text-white">Nội dung</th>
<th class="text-center text-white">Thời gian</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all" class="">
<?php
$i = 1;
$list_ls = $ManhDev->get_list("SELECT * FROM `log_site` WHERE `username` = '$username' AND `type` = 'login' ORDER BY `id` DESC LIMIT 10 ");
if($list_ls) {
foreach($list_ls as $row) { ?>
<tr>
<td class="text-center"><?=$i++;?></td>
<td ><?=$row['note'];?> IP: <?=$row['ip'];?></td>
<td class="text-center"><?=$row['time'];?></td>
</tr>
<?php } } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>