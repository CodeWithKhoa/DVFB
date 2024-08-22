<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Nạp Tiền Thẻ Cào</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-md-12">
<div class="card mb-4 card-tab">
<div class="card-header">
<div class="row">
<div class="col-6">
 <a href="/recharge/banking" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/external-xnimrodx-lineal-color-xnimrodx/64/000000/external-atm-banking-and-financial-xnimrodx-lineal-color-xnimrodx.png" alt="" width="25" height="25">
Ngân hàng</a>
</div>
<div class="col-6">
<a href="/recharge/card" class="btn btn-primary btn-block"><img src="https://img.icons8.com/external-vitaliy-gorbachev-flat-vitaly-gorbachev/58/000000/external-card-online-shopping-vitaliy-gorbachev-flat-vitaly-gorbachev.png" alt="" width="25" height="25">
Thẻ cào</a>
</div>
</div>
</div>
<div class="card-body">
<div class="row mb-3">
<div class="col-md-12">
<div class="alert alert-danger mb-3">
- Thẻ cào sẽ được kiểm tra tự động khoản 1p - 5p tùy theo tốc độc load sever.<br>
- Nếu sau 5 phút thẻ cào vẫn hiện trạng thái xử lý, vui lòng liên hệ quản trị viên để hỗ trợ kiểm tra.<br>
- Vui lòng nhập đúng mệnh giá, mã thẻ và số seri để tránh không nhận được tiền.<br>
- Nạp sai mệnh giá thẻ = mất thẻ sẽ không hỗ trợ.
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label class="form-label" for="">Loại thẻ:</label>
<select class="form-control" id="NetworkCode">
<option value="">--- Chọn loại thẻ ---</option>
<option value="Viettel">VIETTEL</option>
<option value="MobiFone">MOBIFONE</option>
<option value="VinaPhone">VINAPHONE</option>
<option value="Vietnamobile">VIETNAMOBILE</option>
<option value="Zing">ZING</option>
<option value="Gate">GATE</option>
</select>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label class="form-label" for="">Mệnh giá:</label>
<select class="form-control" id="PricesExchange">
<option value="">--- Chọn mệnh giá thẻ ---</option>
<option value="10000">10.000 VNĐ</option>
<option value="20000">20.000 VNĐ</option>
<option value="30000">30.000 VNĐ</option>
<option value="50000">50.000 VNĐ</option>
<option value="100000">100.000 VNĐ</option>
<option value="200000">200.000 VNĐ</option>
<option value="300000">300.000 VNĐ</option>
<option value="500000">500.000 VNĐ</option>
<option value="1000000">1.000.000 VNĐ</option>
</select>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label class="form-label" for="">Seri:</label>
<input type="number" class="form-control" id="SeriCard" placeholder="Nhập số seri của thẻ">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
 <label class="form-label" for="">Mã thẻ:</label>
<input type="number" class="form-control" id="NumberCard" placeholder="Nhập mã thẻ">
</div>
</div>
</div>
<button type="submit" id="napthe" class="btn btn-primary btn-block">Nạp ngay</button>
</div>
</div>
</div>

<div class="col-md-12">
<div class="card mb-4 card-tab">
<div class="card-header">
<h4 class="title">Lịch Sử Nạp Thẻ</h4>
</div>
<div class="card-body">
<div class="table-responsive">
                           <div class="table-responsive" tabindex="1">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center text-white">#</th>
                                        <th class="text-center text-white">Loại Thẻ</th>
                                        <th class="text-center text-white">Mệnh Giá</th>
                                        <th class="text-center text-white">Seri</th>
                                        <th class="text-center text-white">Pin</th>
                                        <th class="text-center text-white">Thực Nhận</th>
                                        <th class="text-center text-white">Trạng Thái</th>
                                        <th class="text-center text-white">Nội Dung</th>
                                        <th class="text-center text-white">Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all" class="">
                                    <?php
                                    $i = 1;
                                    $list_mua = $ManhDev->get_list("SELECT * FROM `cards` WHERE `username` = '".$ManhDev->users('username')."' ORDER BY `id` DESC ");
                                    if($list_mua) {
                                    foreach($list_mua as $row) { ?>
                                    <tr>
                                        <td class="text-center"><?=$i?></td>
                                        <td class="text-center"><?=$row['loaithe'];?></td>
                                        <td class="text-center"><?=tien($row['menhgia']);?></td>
                                        <td class="text-center"><?=$row['seri'];?></td>
                                        <td class="text-center"><?=$row['pin'];?></td>
                                        <td class="text-center"><b style="color:blue;"><?=tien($row['thucnhan']);?></b></td>
                                        <td class="text-center"><?=napthe($row['status']);?></td>
                                        <td class="text-center"><b><?=$row['note'];?></b></td>
                                        <td class="text-center"><i><?=$row['time'];?></i></td>
                                    </tr>
                                    <?php } } else { ?>
                                    <tr class="odd">
                                        <td valign="top" colspan="100%"><center><img src="https://img.icons8.com/offices/64/000000/no-sugar2.png" alt="" class="pt-3"><p class="pt-3">Không có dữ liệu để hiển thị</p></center></td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
		$('#napthe').click(function() {
		$('#napthe').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'loaithe'    : $("#NetworkCode").val(),
            'menhgia'    : $("#PricesExchange").val(),
            'seri'       : $("#SeriCard").val(),
            'pin'        : $("#NumberCard").val(),
            'request'    : '<?=rand(10000, 999999);?>'
		};
		$.post("/api/recharge/AuthCard", formData,
			function (data) {
			    if(data.status == 'error') {
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#napthe').html('Nạp ngay').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#login').html('Nạp ngay').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>