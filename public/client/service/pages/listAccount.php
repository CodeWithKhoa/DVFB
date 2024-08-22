<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<link rel="stylesheet" href="/assets1/css/tainguyen.css">
<title>Dịch Vụ Tài Khoản</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-6 mb-3">
<a href="" class="btn btn-primary btn-block"><img src="https://img.icons8.com/doodle/48/null/reminders.png" alt="" width="25" height="25"> Danh Sách</a>
</div>
<div class="col-6 mb-3">
<a href="/service/account/list" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/dusk/64/000000/list--v1.png" alt="" width="25" height="25">Lịch Sử Mua</a>
</div>
</div>
                    
<div class="row">
    <?php
$danhsach = $ManhDev->get_list("SELECT * FROM `category` WHERE `status` = 'on' ORDER BY `id` DESC");
foreach($danhsach as $row) {
$conlai = $ManhDev->query("SELECT * FROM `account` WHERE `code` = '".$row['code']."' AND `trading` is null ")->num_rows; 
$daban = $ManhDev->query("SELECT * FROM `account` WHERE `code` = '".$row['code']."' AND `trading` is not null ")->num_rows; 
?>
<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
    
            <div class="card card-body flex-column p-3">
                <span class="position-absolute badge badge-pill badge-purple int-group text-center has-tooltip rest">MS: <?=$row['id'];?></span>
                        <h5 class="mb-1 h5"><img class="mr-2 py-1 mb-2" src="<?=$row['img'];?>" width="30px"> <?=$row['title'];?></h5>
                        <div class="pb-3">
                            <smal style="font-size: 13px;" class="text-danger"><i class="fas fa-angle-right mr-1"></i><i><?=$row['note'];?></i></smal>
                        </div>
                    <span class="btn mb-1 btn-sm btn-outline-warning"><i class="ni ni-coins mr-1"></i> Giá: <b><?=tien($row['money']);?></b> Coin
                            </span>
                        
                            <span class="btn mb-1 btn-sm btn-outline-info"><i class="fas fa-luggage-cart mr-1"></i>Còn lại: <b><?=tien($conlai);?></b></span>
                        
                            <span class="btn mb-1 btn-sm btn-outline-success"><i class="fas fa-cart-arrow-down mr-1"></i> Đã bán: <b><?=tien($daban);?></b>
                            </span>
                            <?php if($conlai < 1) { ?>
                            <button type="button" class="btn btn-danger btn-block"><i class="fas fa-face-frown"></i> ĐÃ HẾT HÀNG</button>
                            <?php } else { ?>
                            <div class="form-group mb-3 pt-3">
                            <h5><b class="text-primary">Số Lượng Cần Mua:</b></h5>
                            <input type="text" id="soluong_<?=$row['id'];?>" class="form-control" placeholder="Nhập Số Acc Cần Mua" required="">
                        </div>
                    <center class="mb-2">Tổng Tiền Cần Thanh Toán: <span class="font-weight-bold"><b id="ketqua_<?=$row['id'];?>" class="text-warning">0</b> Coin</span></center>
                    
                    <button type="button" class="btn btn-primary btn-block" id="btnBuy_<?=$row['id'];?>">MUA NGAY</button>
                        <?php } ?>
            </div>
        </div>

<script type="text/javascript">
        $('#soluong_<?=$row['id'];?>').keyup(function() {
            var soluong = $("#soluong_<?=$row['id'];?>").val();
            var ketqua = <?=$row['money'];?> * soluong;
            $('#ketqua_<?=$row['id'];?>').html(ketqua.toString().replace(
                /(.)(?=(\d{3})+$)/g, '$1,'));
        });
$(document).ready(function(){
		$('#btnBuy_<?=$row['id'];?>').click(function() {
		$('#btnBuy_<?=$row['id'];?>').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'amount'   : $("#soluong_<?=$row['id'];?>").val(),
            'id'       : '<?=$row['id'];?>',
		};
		$.post("/api/service/account", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#btnBuy_<?=$row['id'];?>').html('MUA NGAY').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "/service/account/list" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#btnBuy_<?=$row['id'];?>').html('MUA NGAY').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<?php } ?>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>