<?php
require('head.php'); 
require('nav.php');
?>
<section class="col-lg-12 connectedSortable">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">CÀI ĐẶT THÔNG TIN CỦA BẠN</h3>
        </div>
    <div class="card-body">
        <div class="form-group">
            <label class="form-label">Tên Của Bạn:</label>
            <input type="text" class="form-control" id="username" placeholder="Nhập Tên Của Bạn" value="<?=$ManhDev->site('nameAdmin');?>">
        </div>
        <div class="form-group">
            <label class="form-label">Số Điện Thoại Zalo:</label>
            <input type="number" class="form-control" id="phone" placeholder="Nhập Số Điện Thoại Zalo" value="<?=$ManhDev->site('phoneAdmin');?>">
        </div>
        <div class="form-group">
            <label class="form-label">Link Facebook( Tự Get Uid ):</label>
            <input class="form-control" id="facebook" placeholder="Nhập Link Facebook" value="https://www.facebook.com/<?=$ManhDev->site('faceAdmin');?>">
        </div>
        <div class="form-group">
            <button type="button" id="submit" class="btn btn-success btn-block">Lưu Lại</button>
        </div>
<script type="text/javascript">
$(document).ready(function(){
		$('#submit').click(function() {
		$('#submit').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'username' : $("#username").val(),
            'phone'    : $("#phone").val(),
            'facebook' : $("#facebook").val()
		};
		$.post("/api/admin/setAdmin", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông báo', data.msg, data.status);
				$('#submit').html('Xác Nhận').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000);
			     Swal.fire('Thông báo', data.msg, data.status);
			     $('#submit').html('Xác Nhận').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
</div>
</div>
</section>
<?php require('foot.php'); ?>