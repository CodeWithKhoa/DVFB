<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
$code_type = $_GET['code'];
$type_service = $_GET['type'];
$type = $ManhDev->get_list("SELECT * FROM `type` WHERE `code` = '$code_type' ");
foreach($type as $order) { ?>
<title><?=$order['title'];?></title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-md-8">
<div class="card mb-4 card-tab">
<div class="card-header">
<div class="row">
<div class="col-6 d-grid gap-2">
<a href="" class="btn btn-primary btn-block"><img src="https://img.icons8.com/arcade/64/000000/experimental-shop-arcade.png" alt="" width="25" height="25"> Đơn Hàng</a>
</div>
<div class="col-6 d-grid gap-2">
<a href="/service/facebook/<?=$order['code'];?>/list" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/dusk/64/000000/list--v1.png" alt="" width="25" height="25">Danh Sách Đơn</a>
</div>
</div>
</div>
<div class="card-body">
<div class="form-group row mb-3">
<label for="" class="form-label col-md-3">UID Cần Tăng</label>
<div class="col-md-9">
<input type="text" class="form-control" name="idpost" id="idpost" placeholder="Nhập ID Cần Tăng">
</div>
</div>
<div class="form-group row mb-3">
<label for="" class="form-label col-md-3">Server</label>
<div class="col-md-9">
<div class="mb-2">
<?php
$i = 1;
$server = $ManhDev->get_list("SELECT * FROM `server` WHERE `code_service` = '".$order['code']."' ");
$getrate = $server;
foreach($server as $row_MDV) {
if($i++ == 1) { ?>
<div class="mb-1">
<div class="form-check">
<input class="form-check-input" id="sv<?=$row_MDV['sever'];?>" type="radio" name="server_order" checked="" value="<?=$row_MDV['sever'];?>">
<label class="form-check-label " for="sv<?=$row_MDV['sever'];?>">SV<?=$i++;?> <?=$row_MDV['title'];?> - <span class="badge badge-warning"><?=tien($row_MDV['money']);?> Coin</span> - <?=keytool($row_MDV['status']);?></label>
</div>
</div>
<?php } else { ?>
<div class="mb-1">
<div class="form-check">
<input class="form-check-input" id="sv<?=$row_MDV['sever'];?>" type="radio" name="server_order" value="<?=$row_MDV['sever'];?>">
<label class="form-check-label " for="sv<?=$row_MDV['sever'];?>">SV<?=$i++;?> <?=$row_MDV['title'];?> - <span class="badge badge-warning"><?=tien($row_MDV['money']);?> Coin</span> - <?=keytool($row_MDV['status']);?></label>
</div>
</div>
<?php } } ?>
</div>
</div>
</div>
<div class="form-group row mb-3">
<label for="" class="form-label col-md-3">Số Lượng</label>
<div class="col-md-9">
<input type="number" class="form-control" name="soluong" id="soluong" onpaste="" placeholder="Nhập Số Tương Tác Cần Tăng">
</div>
</div>
<?php if($order['type'] == "cmt") { ?>
<div class="form-group row mb-3">
<label for="" class="form-label col-md-3">Bình Luận</label>
<div class="col-md-9">
<textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Nhập nội dung bình luận, mỗi nội dung 1 dòng"></textarea>
</div>
</div>
<?php } ?>
<div class="form-group row mb-3">
<label for="" class="form-label col-md-3">Ghi Chú </label>
<div class="col-md-9">
<textarea class="form-control mb-3" name="note" id="note" rows="3" placeholder="Nhập ghi chú nếu cần"></textarea>
<div class="alert bg-danger text-white" role="alert">
<div class="card-body p-0">
<h4>Vui lòng đọc tránh mất tiền</h4>
<?=$order['note'];?>
</div>
</div>
</div>
</div>
<div class="form-group row mb-2">
<div class="col-sm-12">
<div class="alert text-white bg-success" role="alert">
<div class="card-body p-0">
<h4 class="font-bold text-center">Tổng thanh toán: <span class="bold green"><span id="total_payment" class="text-danger">0</span> coin</span></h4>
</div>
</div>
</div>
</div>
<button type="submit" class="btn btn-primary btn-block" id="mua_ngay"><img src="https://img.icons8.com/external-nawicon-flat-nawicon/64/000000/external-cart-black-friday-nawicon-flat-nawicon.png" height="30px"/> Thanh Toán</button>
</div>
</div>
</div>
<div class="col-md-4">
<div class="alert bg-danger text-white" role="alert">
<div class="card-body p-0">
<h4>Lưu ý</h4>
- <b>Nghiêm cấm buff các đơn có nội dung vi phạm pháp luật, chính trị, đồ trụy... Nếu cố tình buff bạn
sẽ
bị trừ hết tiền và ban khỏi hệ thống vĩnh viễn, và phải chịu hoàn toàn trách nhiệm trước pháp
luật</b>.
<br>
- <b>Nếu đơn đang chạy trên hệ thống mà bạn vẫn mua ở các hệ thống bên khác, nếu có tình trạng hụt,
thiếu
số lượng giữa 2 bên thì sẽ không được xử lí</b>. <br>
- <b>Đơn cài sai thông tin hoặc lỗi trong quá trình tăng hệ thống sẽ không hoàn lại tiền</b>. <br>
- <b>Nếu gặp lỗi hãy nhắn tin hỗ trợ phía bên phải góc màn hình hoặc vào mục liên hệ hỗ trợ để được hỗ
trợ
tốt nhất</b>.
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
		$('#mua_ngay').click(function() {
		$('#mua_ngay').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
		    'idpost'       : $("#idpost").val(),
		    'server_order' : $('input[name=server_order]:checked').val(),
		    'amount'       : $("#soluong").val(),
		    'note'         : $("#note").val(),
		    'code'         : '<?=$code_type;?>',
		    <?php if($order['type'] == "cmt") { ?>
		    'comment'      : $("#comment").val(),
		    <?php } ?>
		};
		$.post("/api/service/<?=$type_service;?>/<?=$code_type;?>/order", formData,
			function (data) {
			    if(data.status == 'error') {
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#mua_ngay').html('<img src="https://img.icons8.com/external-nawicon-flat-nawicon/64/000000/external-cart-black-friday-nawicon-flat-nawicon.png" height="30px"/> Thanh Toán').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#mua_ngay').html('<img src="https://img.icons8.com/external-nawicon-flat-nawicon/64/000000/external-cart-black-friday-nawicon-flat-nawicon.png" height="30px"/> Thanh Toán').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<script>
$('#soluong').keyup(function() {
        var server = $('input[name=server_order]:checked').val();
        var soluong = $('[name=soluong]').val();
        <?php foreach($getrate as $runrate){?>
        if(server == '<?=$runrate['sever']?>'){
        var price = <?=$runrate['money']?>;
        }
        <?php }?>
        var ketqua = soluong * price;
        $('#total_payment').html(ketqua.toString().replace(/(.)(?=(\d{3})+$)/g,'$1.'));
});
</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>
<?php } ?>