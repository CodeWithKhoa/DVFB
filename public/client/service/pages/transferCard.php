<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Chuyển Tiền Sang Tài Khoản</title>
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
<a href="/service/card/withdraw" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/external-sbts2018-blue-sbts2018/58/000000/external-withdraw-cryptopcurrency-sbts2018-blue-sbts2018.png" alt="" width="25" height="25"> Rút Tiền</a>
</div>
<div class="col-4">
<a href="/service/card/transfer" class="btn btn-primary btn-block"><img src="https://img.icons8.com/external-wanicon-lineal-color-wanicon/64/000000/external-transfer-currency-wanicon-lineal-color-wanicon.png" alt="" width="25" height="25"> Chuyển Tiền</a>
</div>
</div>
</div>
<div class="card-body">
<table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <td>Số Dư:</td>
                        <td><select class="form-control">
                            <option><?=tien($ManhDev->users('money'));?>đ</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Tài khoản nhận:</td>
                        <td><input id="nguoinhan" type="text" placeholder="Nhập Tài Khoản Người Nhận" class="form-control getWalletAjax" name="payee_info" value="" onchange="checkusername()"></td>
                    </tr>

                    <tr id="username"></tr> 

                    <tr>
                        <td>Số Tiền Chuyển:</td>
                        <td><input type="number" class="form-control" id="amount" value="" placeholder="Số Tiền Cần Chuyển">
                        </td>
                    </tr>

                    <tr>
                        <td>Nội dung:</td>
                        <td><textarea id="description" class="form-control" placeholder="Nội Dung Chuyển Tiền"></textarea>
                        </td>

                    </tr>
                    
                    <tr>
                        <td valign="top" colspan="5" class="dataTables_empty"><button type="submit" class="btn btn-block btn-info" id="chuyentien"><img src="https://img.icons8.com/external-flaticons-flat-flat-icons/64/000000/external-transfer-resume-flaticons-flat-flat-icons.png" height="20px"/> Xác Nhận</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row pt-2">
<div class="col-md-12">
<div class="card mb-4">
<div class="card-body">
<h5 class="card-title mb-4">Lịch Sử Chuyển/Nhận</h5>
<div class="table-responsive" tabindex="1">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr role="row" class="bg-primary">
<th class="text-center text-white">#</th>
<th class="text-white">Người Chuyển</th>
<th class="text-white">Người Nhận</th>
<th class="text-white">Số Tiền</th>
<th class="text-white">Nội Dung</th>
<th class="text-center text-white">Thời gian</th>
</tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all" class="">
<?php
$i = 1;
$list_ls = $ManhDev->get_list("SELECT * FROM `transferMoney` WHERE `username` = '".$ManhDev->users('username')."' OR `receiver` = '".$ManhDev->users('username')."' ORDER BY `id` DESC");
if($list_ls) {
foreach($list_ls as $row) { ?>
<tr>
<td class="text-center"><?=$i++;?></td>
<td><span class="badge bg-success bg-sm bg-dim"><?=$row['username'];?></span></td>
<td><span class="badge bg-danger bg-sm bg-dim"><?=$row['receiver'];?></span></td>
<td><span class="badge bg-dark bg-sm bg-dim"><?=tien($row['money']);?> Coin</span></td>
<td><?=$row['note'];?></td>
<td class="text-center"><?=$row['time'];?></td>
</tr>
<?php } } ?>
</tbody>
</table>
</div>
</div>
</div> </div>
</div>
<script type="text/javascript">
function checkusername(){
var nguoinhan = $('#nguoinhan').val();
if(nguoinhan != '') {
$.ajax({
	url: "/api/service/authCard",
	method: "POST",
	data: {
		type: 'getuser',
		nguoinhan: $("#nguoinhan").val()
	},
	success: function(response) {		
			$("#username").html(response);		
	}
});
} else {
$("#username").html('');
}
};

$(document).ready(function(){
		$('#chuyentien').click(function() {
		$('#chuyentien').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
		    'type'        : 'chuyentien',
            'nguoinhan'   : $("#nguoinhan").val(),
            'amount'      : $("#amount").val(),
            'note'        : $("#description").val()
		};
		$.post("/api/service/authCard", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#chuyentien').html('<img src="https://img.icons8.com/external-flaticons-flat-flat-icons/64/000000/external-transfer-resume-flaticons-flat-flat-icons.png" height="20px"/> Xác Nhận').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#chuyentien').html('<img src="https://img.icons8.com/external-flaticons-flat-flat-icons/64/000000/external-transfer-resume-flaticons-flat-flat-icons.png" height="20px"/> Xác Nhận').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>