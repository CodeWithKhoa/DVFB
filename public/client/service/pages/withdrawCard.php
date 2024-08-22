<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Rút Tiền Về Tài Khoản</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-md-12">
<div class="card mb-4 card-tab">
<div class="card-header">
<div class="row">
<div class="col-4">
<a href="/service/card/order" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/color/48/000000/card-exchange--v1.png" alt="" width="25" height="25"> Đổi Thẻ Cào</a>
</div>
<div class="col-4">
<a href="/service/card/withdraw" class="btn btn-primary btn-block"><img src="https://img.icons8.com/external-sbts2018-blue-sbts2018/58/000000/external-withdraw-cryptopcurrency-sbts2018-blue-sbts2018.png" alt="" width="25" height="25"> Rút Tiền</a>
</div>
<div class="col-4">
<a href="/service/card/transfer" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/external-wanicon-lineal-color-wanicon/64/000000/external-transfer-currency-wanicon-lineal-color-wanicon.png" alt="" width="25" height="25"> Chuyển Tiền</a>
</div>
</div>
</div>
<div class="card-body">
<div class="row">
<div class="col-md-2 mb-3">
<div class="form-group">
<label for="exampleFormControlSelect1">Ngân Hàng Của Bạn:</label>
<select id="ngan_hang" class="form-control">
<option value="">--- Chọn Ngân Hàng Của Bạn ---</option>
<option value="ĐÔNG Á BANK">DONGABANK</option>
<option value="MB BANK">MB BANK</option>
<option value="AGRIBANK">AGRIBANK</option>
<option value="BIDV">BIDV</option>
<option value="SACOMBANK">SACOMBANK</option>
<option value="MOMO">VÍ MOMO</option>
<option value="ZALO PAY">VÍ ZALO PAY</option>
<option value="THẺ SIÊU RẺ">THẺ SIÊU RẺ</option>
<option value="SEABANK">SEABANK</option>
<option value="VIB">VIB</option>
<option value="TPBANK">TPBANK</option>
<option value="VPBANK">VPBANK</option>
<option value="MSB">MSB</option>
<option value="SCB">SCB</option>
<option value="OCB">OCB</option>
<option value="VIETCOMBANK">VIETCOMBANK</option>
<option value="VIETINBANK">VIETINBANK</option>
<option value="TECHCOMBANK">TECHCOMBANK</option>
<option value="SHINHANBANK">SHINHANBANK</option>
<option value="SHB">SHB</option>
<option value="EXIMBANK">EXIMBANK</option>
<option value="ACB">ACB</option>
</select>
</div>
</div>

<div class="col-md-3 mb-3">
<div class="form-group">
<label class="form-label" for="">Chủ Tài Khoản</label>
<input class="form-control" type="text" id="ctk" placeholder="Tên Tài Khoản">
</div>
</div>

<div class="col-md-3 mb-3">
<div class="form-group">
<label class="form-label" for="">Số Tài Khoản</label>
<input class="form-control" type="text" id="stk" placeholder="Số Tài Khoản">
</div>
</div>

<div class="col-md-2 mb-3">
<div class="form-group">
<label class="form-label" for="">Chi Nhánh</label>
<input class="form-control" type="text" id="chi_nhanh" placeholder="Chi Nhánh Ngân Hàng">
</div>
</div>

<div class="col-md-2 mb-3">
<div class="form-group">
<label class="form-label" for="">Số Tiền (<a class="text-danger">Tối Thiểu 50.000đ</a>)</label>
<input class="form-control" type="text" id="money" placeholder="Số Tiền Cần Rút">
</div>
</div>

<div class="col-md-12 mb-3">
<button type="button" class="btn btn-block btn-info" id="ruttien"><img src="https://img.icons8.com/external-sbts2018-outline-color-sbts2018/58/000000/external-withdraw-payment-1-sbts2018-outline-color-sbts2018-2.png" height="20px"/> Rút Tiền</button>
</div>


</div>
</div>
</div>
</div>
</div>
<div class="row pt-2">
<div class="col-md-12">
<div class="card mb-4">
<div class="card-body">
<h5 class="card-title mb-4">Lịch Sử Rút Tiền</h5>
<div class="table-responsive" tabindex="1">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr role="row" class="bg-primary">
<th class="text-center text-white">#</th>
<th class="text-white">Ngân Hàng</th>
<th class="text-white">Chủ Tài Khoản</th>
<th class="text-white">Số Tài Khoản</th>
<th class="text-white">Chi Nhánh</th>
<th class="text-white">Trạng Thái</th>
<th class="text-white">Số Tiền</th>
<th class="text-center text-white">Thời gian</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all" class="">
<?php
$i = 1;
$list_ls = $ManhDev->get_list("SELECT * FROM `withdrawCard` WHERE `username` = '$username' ORDER BY `id` DESC");
if($list_ls) {
foreach($list_ls as $row) { ?>
<tr>
<td class="text-center"><?=$i++;?></td>
<td><?=$row['banking'];?></td>
<td><?=$row['nameBank'];?></td>
<td><?=$row['numberBank'];?></td>
<td><?=$row['branchBank'];?></td>
<td><?=ruttien($row['statusBank']);?></td>
<td><?=tien($row['moneyBank']);?>VND</td>
<td class="text-center"><?=$row['time'];?></td>
</tr>
<?php } } ?>
</tbody>
</table>
</div>
</div>
</div> </div>
</div>
<script>
$(document).ready(function(){
		$('#ruttien').click(function() {
		$('#ruttien').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'banking'   : $("#ngan_hang").val(),
            'stk'       : $("#stk").val(),
            'ctk'       : $("#ctk").val(),
            'chi_nhanh' : $("#chi_nhanh").val(),
            'money'       : $("#money").val()
		};
		$.post("/api/service/withdrawCard", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#ruttien').html('<img src="https://img.icons8.com/external-sbts2018-outline-color-sbts2018/58/000000/external-withdraw-payment-1-sbts2018-outline-color-sbts2018-2.png" height="20px"/> Rút Tiền').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#ruttien').html('<img src="https://img.icons8.com/external-sbts2018-outline-color-sbts2018/58/000000/external-withdraw-payment-1-sbts2018-outline-color-sbts2018-2.png" height="20px"/> Rút Tiền').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>