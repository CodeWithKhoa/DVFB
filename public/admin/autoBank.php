<?php
require('head.php'); 
require('nav.php');

$info_momo = $ManhDev->query("SELECT * FROM `momo_auto` WHERE `id` = '1' ")->fetch_array();
?>
<section class="col-lg-12 connectedSortable">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">CÀI ĐẶT AUTO BANK CÓ SẴN</h3>
        </div>
    <div class="card-body">
        <div class="form-group">
            <small>Cron Momo: <code><?=$base_url;?>cron/autoMomo</code></small><br>
            <small>Cron Mb Bank: <code><?=$base_url;?>cron/autoMbBank</code></small><br>
            <small>Cron VietComBank: <code><?=$base_url;?>cron/autoVietComBank</code></small><br>
            
        </div>
        <div class="form-group">
            <label class="form-label">Token Momo:</label>
            <input class="form-control" id="momo" placeholder="Token Auto Momo" value="<?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'api_key_momo' ")['value'];?>">
        </div>
        <div class="form-group">
            <label class="form-label">Token Mb Bank:</label>
            <input type="text" class="form-control" id="mbbank" placeholder="Token Auto Mb Bank" value="<?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'api_key_mbbank' ")['value'];?>">
        </div>
        <div class="form-group">
            <label class="form-label">Token VietComBank:</label>
            <input type="text" class="form-control" id="vietcombank" placeholder="Token Auto VietComBank" value="<?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'api_key_vcb' ")['value'];?>">
        </div>
        <div class="form-group">
            <label class="form-label">Nội Dung Bank Tổng: <code>Nhập Dấu Cách Sau Nội Dung Để Tách User</code></label>
            <input type="text" class="form-control" id="note_bank" placeholder="Nội Dung Bank" value="<?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'nd_bank' ")['value'];?>">
        </div>
        <div class="form-group">
            <button type="button" id="submit" class="btn btn-success btn-block">Cập Nhật</button>
        </div>
<script type="text/javascript">
$(document).ready(function(){
		$('#submit').click(function() {
		$('#submit').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'momo'        : $("#momo").val(),
            'mbbank'      : $("#mbbank").val(),
            'vietcombank' : $("#vietcombank").val(),
            'note'        : $("#note_bank").val()
		};
		$.post("/api/admin/addMomo", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông báo', data.msg, data.status);
				$('#submit').html('Cập Nhật').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000);
			     Swal.fire('Thông báo', data.msg, data.status);
			     $('#submit').html('Cập Nhật').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
</div>
</div>
</section>
<?php require('foot.php'); ?>