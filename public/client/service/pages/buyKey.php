<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Mua Key Tool PHP</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<?php
if(isset($_GET['xoa'])) {
$xoa = $_GET['xoa']; #id key
$ManhDev->xoa("key_log", "`id` = '$xoa' ");

$ManhDev->insert("log_site", [
                'username'   => $username,
                'type'       => 'key',
                'note'       => 'Xóa Key Thành Công',
                'ip'         => getip(),
                'useragent'  => $_SERVER["HTTP_USER_AGENT"],
                'time'       => $time
                ]);
echo '<meta http-equiv="refresh" content="0;url=/service/key/order">';
}
?>
<div class="row">
<div class="col-md-12">
<div class="alert alert-primary mb-3" role="alert">
- Sau khi mua key xong, bạn vào tool nhập key của tạo và trải nghiệm ngay.<br>
- Nếu key không tồn tại, hãy xem lại lịch sử và lấy lại key chính xác.
</div>
</div>
<div class="col-md-6 mb-3">
<div class="card">
<div class="card-header"><h4>Mua Key Tool</h4></div>
<div class="row p-3">
<div class="col-md-12">
<div class="form-group">
<label class="form-label" for="">Họ Tên Người Mua</label>
<input class="form-control" type="text" id="name" placeholder="Họ Và Tên Của Bạn">
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label class="form-label" for="">Key Cần Mua</label>
<input class="form-control" type="text" id="key_code" placeholder="Key Cần Tạo">
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label class="form-label" for="">Số Ngày Cần Mua</label>
<input class="form-control" type="number" id="amount" placeholder="Số Ngày Của key">
</div>
</div>
<div class="col-md-12 form-group text-center">
                            <b>Mua</b> <b id="soluong">0</b> <b>Ngày Với Giá</b> <b id="ketqua" style="color:red;">0</b> <b>Coin</b>
                    </div>
          <hr class="my-3" />
<div class="col-md-12">
<button type="button" class="btn btn-block btn-info" id="muakey"><img src="https://img.icons8.com/external-wanicon-lineal-color-wanicon/64/000000/external-key-real-estate-wanicon-lineal-color-wanicon.png" height="20px"/> Mua Ngay</button>
</div>
</div>
</div>
</div>

<div class="col-md-6 mb-3">
<div class="card">
<div class="card-header"><h4>Danh Sách Key Của Bạn</h4><small class="text-danger">(Xóa Key Sẽ Không Được Hoàn Tiền, Xin Lưu Ý)</small></div>
<div class="card-body">
<div class="table-responsive" tabindex="1">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Họ Tên</th>
<th>Key Code</th>
<th>Số Ngày</th>
<th>Trạng Thái</th>
<th>Ngày Mua</th>
<th>Hạn Key</th>
<th>Thao Tác</th>
</tr>
</thead>
<tbody>
<?php
$list_ls = $ManhDev->get_list("SELECT * FROM `key_log` WHERE `username` = '$username' ORDER BY `id` DESC");
if($list_ls) {
foreach($list_ls as $row) { ?>
<tr>
<td><?=$row['name'];?></td>
<td><?=$row['key_code'];?></td>
<td><?=$row['amount'];?></td>
<td class="text-center"><?=keytool($row['status']);?></td>
<td><?=date('d-m-Y', $row['start']);?></td>
<td><?=date('d-m-Y', $row['end']);?></td>
<td class="text-center">
<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#giahan2_<?=$row['id'];?>">Gia Hạn</a>
<a class="btn btn-danger btn-sm " href="?xoa=<?=$row['id'];?>">Xóa</a></td>

<div class="modal fade" id="giahan2_<?=$row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                     <div class="modal-header"><h5>Gia Hạn Key Tool: <?=$row['key_code'];?></h5></div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label>Số Ngày Cần Gia Hạn: </label>
                            <input type="number" id="songay_<?=$row['id'];?>" class="form-control" placeholder="Nhập Số Ngày Cần Gia Hạn" required="">
                        </div>
                            
                            <center>Tổng Tiền Gia Hạn: <span class="font-weight-bold"><b id="ketqua_<?=$row['id'];?>" class="text-warning">0</b> Coin</span></center>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" id="giahan_<?=$row['id'];?>" class="btn btn-primary">Gia Hạn</button>
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
$(document).ready(function(){
		$('#giahan_<?=$row['id'];?>').click(function() {
		$('#giahan_<?=$row['id'];?>').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'key'    : '<?=$row['key_code'];?>',
            'amount' : $("#songay_<?=$row['id'];?>").val()
		};
		$.post("/api/service/key/extend", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông báo', data.msg, data.status);
				$('#giahan_<?=$row['id'];?>').html('Xác Nhận').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000);
			     Swal.fire('Thông báo', data.msg, data.status);
			     $('#giahan_<?=$row['id'];?>').html('Xác Nhận').prop('disabled', false);
			    }
		}, "json");
	});
});

          $('#songay_<?=$row['id'];?>').keyup(function() {
          var amount = $("#songay_<?=$row['id'];?>").val();
          var ketqua = <?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'money_key' ")['value'];?> * amount;
          $('#ketqua_<?=$row['id'];?>').html(ketqua.toString().replace(/(.)(?=(\d{3})+$)/g,'$1.'));
          $('#soluong_<?=$row['id'];?>').html(amount.toString().replace(/(.)(?=(\d{3})+$)/g,'$1.'));
          });
</script>
</tr>
<?php } } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="card mb-3">
<div class="card-header"><h4>Hoạt Động Mua Key</h4></div>
<div class="card-body">
<div class="table-responsive" tabindex="1">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>#</th>
<th>Note</th>
<th>IP</th>
<th>Thời Gian</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all" class="">
<?php
$i = 1;
$list_ls = $ManhDev->get_list("SELECT * FROM `log_site` WHERE `username` = '$username' AND `type` = 'key' ORDER BY `id` DESC");
if($list_ls) {
foreach($list_ls as $row) { ?>
<tr>
<td><?=$i++;?></td>
<td><?=$row['note'];?></td>
<td><?=$row['ip'];?></td>
<td><?=$row['time'];?></td>
</tr>
<?php } } ?>
</tbody>
</table>
</div>
</div>
</div>
<script type="text/javascript">
          $('#amount').keyup(function() {
          var amount = $("#amount").val();
          var ketqua = <?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'money_key' ")['value'];?> * amount;
          $('#ketqua').html(ketqua.toString().replace(/(.)(?=(\d{3})+$)/g,'$1.'));
          $('#soluong').html(amount.toString().replace(/(.)(?=(\d{3})+$)/g,'$1.'));
          });
</script>
<script type="text/javascript">
$(document).ready(function(){
		$('#muakey').click(function() {
		$('#muakey').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'name'     : $("#name").val(),
            'key'      : $("#key_code").val(),
            'amount'   : $("#amount").val()
		};
		$.post("/api/service/buyKey", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#muakey').html('Mua Ngay').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#muakey').html('Mua Ngay').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>