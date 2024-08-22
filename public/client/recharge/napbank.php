<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Nạp Tiền Chuyển Khoản</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
<div class="row">
<div class="col-6">
 <a href="/recharge/banking" class="btn btn-primary btn-block"><img src="https://img.icons8.com/external-xnimrodx-lineal-color-xnimrodx/64/000000/external-atm-banking-and-financial-xnimrodx-lineal-color-xnimrodx.png" alt="" width="25" height="25">
Ngân hàng</a>
</div>
<div class="col-6">
<a href="/recharge/card" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/external-vitaliy-gorbachev-flat-vitaly-gorbachev/58/000000/external-card-online-shopping-vitaliy-gorbachev-flat-vitaly-gorbachev.png" alt="" width="25" height="25">
Thẻ cào</a>
</div>
</div>
</div>
    <div class="card-body">
        <div class="row">
<div class="col-md-12">
<div class="alert alert-danger mb-3">
- Bạn vui lòng chuyển khoản chính xác nội dung để được cộng tiền nhanh nhất.<br>
- Nếu sau 10 phút tài khoản chưa được cộng tiền vui liên hệ Admin để được hỗ trợ.<br>
- Vui lòng không nạp từ bank khác qua bank này (tránh lỗi).<br>
- Nạp dưới số tiền tối thiểu không hỗ trợ.<br>
- Nạp sai số tài khoản, sai ngân hàng, sai nội dung sẽ bị trừ 20% phí giao dịch.<br>
- Bấm vào số tài khoản hoặc nội dung để sao chép nội thông tin chuyển tiền 1 cách chuẩn nhất.
</div>
</div>
<?php
$user = $ManhDev->query("SELECT * FROM `bank` ");
while($row = mysqli_fetch_array($user)) { ?>
<div class="col-md-6 col-sm-6 col-lg-4 mb-2">
            <div class="card bank">
                <div class="card-body">
                    <center><h3><img src="<?=$row['img'];?>" height="30px"> <?=$row['name'];?></h3></center>
                        <div>Chủ tài khoản: <?=$row['ctk'];?></div>
                        <div>Số tài khoản: <a onclick="manhdz('#<?=$row['stk'];?>')" class="text-danger"><span id="<?=$row['stk'];?>"><?=$row['stk'];?></span></a></div>
                        <div>Số tiền tối thiểu: <?=tien($row['toi_thieu']);?> Coin</div>
                      </div>
                </div>
            </div>
<?php } ?>
<div class="col-md-12">
            <h4>Nội Dung Chuyển Khoản:</h4>
<div class="alert alert-info mb-3">
            <a onclick="manhdz('#noidung')"><span id="noidung" class="text-success"><b><?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'nd_bank' ")['value'];?><?=$ManhDev->users('username');?></span></a></b>
</div>
</div>
<style>
    .bank {
        border: 1px solid blue;
        border-radius: 10px;
    }
</style>
</div>
</div>
</div>
</div>

<div class="col-md-12">
<div class="card mb-4 card-tab">
<div class="card-header">
<h4 class="title">Lịch Sử Nạp Auto</h4>
</div>
<div class="card-body">
<div class="table-responsive">
                           <div class="table-responsive" tabindex="1">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center">#</th>
                                        <th class="text-center">Mã Giao Dịch</th>
                                        <th class="text-center">Thể Loại</th>
                                        <th class="text-center">Số Tiền</th>
                                        <th class="text-center">Note</th>
                                        <th class="text-center">Thời Gian</th>
                                    </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all" class="">
                                    <?php
                                    $i = 1;
                                    $list_mua = $ManhDev->get_list("SELECT * FROM `cron` WHERE `username` = '".$ManhDev->users('username')."' ORDER BY `id` DESC ");
                                    if($list_mua) {
                                    foreach($list_mua as $row) { ?>
                                    <tr>
                                        <td class="text-center"><?=$i++?></td>
                                        <td class="text-center"><?=$row['tranId'];?></td>
                                        <td class="text-center"><?=$row['partnerCode'];?></td>
                                        <td class="text-center"><?=tien($row['amount']);?></td>
                                        <td><?=$row['comment'];?></td>
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
function manhdz(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  Swal.fire("Thành Công", "Copy Thành Công", "success");
  $temp.remove();
}
</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>