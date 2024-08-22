<?php
require('head.php'); 
require('nav.php');
?>
<section class="col-lg-12 connectedSortable">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">CÀI ĐẶT WEBSITE</h3>
        </div>
    <div class="card-body">
        <div class="form-group">
            <label class="form-label">Màu Website:</label>
            <input type="color" class="form-control" id="colorWeb" value="<?=$ManhDev->site('colorWeb');?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">Tiêu Đề Website:</label>
            <input type="text" class="form-control" id="nameWeb" placeholder="Nhập Tên Website" value="<?=$ManhDev->site('nameWeb');?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">Link Ảnh Logo[Tròn - Vuông]:</label>
            <input type="url" class="form-control" id="logoWeb" placeholder="Nhập Link Ảnh Logo" value="<?=$ManhDev->site('logoWeb');?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">Link Ảnh Bìa[Chữ Nhật Ngang]:</label>
            <input type="url" class="form-control" id="biaWeb" placeholder="Nhập Link Ảnh Bìa" value="<?=$ManhDev->site('biaWeb');?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">Link Ảnh Favicon[Tròn]:</label>
            <input type="url" class="form-control" id="faviconWeb" placeholder="Nhập Link Ảnh Nhỏ" value="<?=$ManhDev->site('faviWeb');?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">Mô Tả Website:</label>
            <textarea type="text" class="form-control" id="noteWeb" rows="5" placeholder="Nhập Mô Tả Website"><?=$ManhDev->site('motaWeb');?></textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label">Từ Khóa Website:</label>
            <textarea type="text" class="form-control" id="keywordWeb" rows="5" placeholder="Nhập Từ Khóa Website"><?=$ManhDev->site('tukhoaWeb');?></textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label">ID Page:</label>
            <input type="number" class="form-control" id="idPage" placeholder="Nhập Link Ảnh Nhỏ" value="<?=$ManhDev->site('idPage');?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">Chiết Khấu Nạp Thẻ:</label>
            <input type="number" class="form-control" id="chietkhauweb" placeholder="Nhập Link Ảnh Nhỏ" value="<?=$ManhDev->site('discountWeb');?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">ID Telegram:</label>
            <input type="number" class="form-control" id="telegr" placeholder="Nhập ID Telegram Của Bạn" value="<?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'id_tele' ")['value'];?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">Token Telegram:</label>
            <input type="text" class="form-control" id="tokentelegr" placeholder="Nhập Token Telegram Của Bạn" value="<?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'token_tele' ")['value'];?>">
        </div>
        
        <div class="form-group" >
            <label class="form-control-label" for="input-email">Hiệu Ứng Trái Tim:</label>
            <select id="traitimweb" class="form-control">
                <option value="<?=$ManhDev->site('heartWeb');?>"><?php if($ManhDev->site('heartWeb') == "1") { ?>Mở<?php } else { ?>Tắt<?php } ?></option>
                <option value="1">Mở</option>
                <option value="2">Tắt</option>
            </select>
        </div>
        <div class="form-group">
            <button type="button" id="submit" class="btn btn-success btn-block">Lưu Lại</button>
        </div>
<script type="text/javascript">
$(document).ready(function(){
		$('#submit').click(function() {
		$('#submit').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
		    'colorWeb'    : $("#colorWeb").val(),
            'title'       : $("#nameWeb").val(),
            'logo'        : $("#logoWeb").val(),
            'bia'         : $("#biaWeb").val(),
            'faviconWeb'  : $("#faviconWeb").val(),
            'noteWeb'     : $("#noteWeb").val(),
            'keywordWeb'  : $("#keywordWeb").val(),
            'idPage'      : $("#idPage").val(),
            'chietkhauweb': $("#chietkhauweb").val(),
            'traitimweb'  : $("#traitimweb").val(),
            'telegr'      : $("#telegr").val(),
            'tokentelegr' : $("#tokentelegr").val()
		};
		$.post("/api/admin/setting", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông báo', data.msg, data.status);
				$('#submit').html('Xác Nhận').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },1000);
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