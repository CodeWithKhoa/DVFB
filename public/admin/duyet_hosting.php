<?php
require('head.php'); 
require('nav.php'); 

if(isset($_GET['id'])) {
$id = $_GET['id'];
}

$user = $ManhDev->query("SELECT * FROM `history_Host` WHERE `id` = '$id' ");
while ($row1 = mysqli_fetch_array($user)) { ?>
<div class="row">
<section class="col-lg-12 connectedSortable">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">CẬP NHẬT THÔNG TIN HOSTING - DUYỆT</h3>
                </div>
                <div class="card-body">
            <div class="form-group">
            <label class="form-label">Link Đăng Nhập Cpanel:</label>
            <input type="url" class="form-control" id="link" placeholder="https://host212.vietnix.vn:2083" value="<?=$row1['login'];?>">
        </div>
        <div class="form-group">
            <label class="form-label">Tài Khoản Hosting:</label>
            <input type="text" class="form-control" id="username" placeholder="keyvippx35" value="<?=$row1['taikhoan'];?>">
        </div>
        <div class="form-group">
            <label class="form-label">Mật Khẩu Hosting:</label>
            <input type="text" class="form-control" id="password" placeholder="manhdev" value="<?=$row1['matkhau'];?>">
        </div>
        <div class="form-group">
            <button type="button" id="submit" class="btn btn-success btn-block">Thêm Ngay</button>
        </div>
                </div>
            </div>
</section>
</div>
<script type="text/javascript">
$(document).ready(function(){
		$('#submit').click(function() {
		$('#submit').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
		    'id'      : '<?=$row1['id'];?>',
            'link'   : $("#link").val(),
            'username' : $("#username").val(),
            'password' : $("#password").val()
		};
		$.post("/api/admin/setHost", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#submit').html('Thêm Ngay').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "/admin/hosting" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#submit').html('Thêm Ngay').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<?php require('foot.php'); } ?>