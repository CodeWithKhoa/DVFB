<?php
require('head.php'); 
require('nav.php');
?>
<section class="col-lg-12 connectedSortable">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">CỘNG/TRỪ TIỀN USER</h3>
        </div>
    <div class="card-body">
        <div class="form-group">
            <label class="form-label">Tên Tài Khoản:</label>
            <input type="text" class="form-control" id="username" placeholder="Nhập Tên Tài Khoản Website">
        </div>
        <div class="form-group" >
            <label class="form-control-label" for="input-email">Thể Loại:</label>
            <select id="type" class="form-control">
                <option value="1">Cộng Tiền</option>
                <option value="2">Trừ Tiền</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">Số Tiền:</label>
            <input type="number" class="form-control" id="amount" placeholder="Nhập Số Tiền">
        </div>
        <div class="form-group">
            <label class="form-label">Nội Dung(Có Thể Bỏ Trống):</label>
            <textarea class="form-control" id="note" placeholder="Lý Do Cộng Tiền"></textarea>
        </div>
        <div class="form-group">
            <button type="button" id="submit" class="btn btn-success btn-block">Xác Nhận</button>
        </div>
<script type="text/javascript">
$(document).ready(function(){
		$('#submit').click(function() {
		$('#submit').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'username' : $("#username").val(),
            'type'     : $("#type").val(),
            'amount'   : $("#amount").val(),
            'note'     : $("#note").val()
		};
		$.post("/api/admin/PublicMoney", formData,
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