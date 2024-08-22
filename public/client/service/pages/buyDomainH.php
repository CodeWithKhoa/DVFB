<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Kiểm Tra Tên Miền Website</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-md-12">
<div class="card mb-4 card-tab">
<div class="card-header">
<h4>Kiểm Tra Tên Miền</h4>
</div>
<div class="card-body">
<div class="form-group">
<label class="form-label" for="">Kiểm Tra Xem Còn Miền Hay Không:</label>
<div class="input-group mb-3">
<input id="domain" type="text" class="form-control" placeholder="Nhập Tên Miền Cần Check, VD: dichvusieure.net">
<div class="input-group-append">
<button type="submit" class="btn btn-primary" id="check">Kiểm Tra</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
		$('#check').click(function() {
		$('#check').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'domain'   : $("#domain").val(),
		};
		$.post("/api/service/checkDomain", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#check').html('Kiểm Tra').prop('disabled', false);
			    } else {
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#check').html('Kiểm Tra').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>