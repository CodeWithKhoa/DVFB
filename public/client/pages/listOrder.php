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
<div class="col-md-12">
<div class="card">
<div class="card-header">
<div class="row">
<div class="col-6 d-grid gap-2">
<a href="/service/facebook/<?=$order['code'];?>/order" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/arcade/64/000000/experimental-shop-arcade.png" alt="" width="25" height="25"> Đơn Hàng</a>
</div>
<div class="col-6 d-grid gap-2">
<a href="/service/facebook/<?=$order['code'];?>/list" class="btn btn-primary btn-block"><img src="https://img.icons8.com/dusk/64/000000/list--v1.png" alt="" width="25" height="25">Danh Sách Đơn</a>
</div>
</div>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table hover multiple-select-row data-table-export nowrap">
<thead>
<tr>
<th>#</th>
<th>Mã Đơn</th>
<th>ID <?=ucwords($order['type_service']);?></th>
<th>Máy Chủ</th>
<th>Số Lượng</th>
<th>Tổng Tiền</th>
<th>Trạng Thái</th>
<?php if($order['type'] == "cmt") { ?>
<th>Comment</th>
<?php } ?>
<th>Ghi Chú</th>
<th>Thời Gian</th>
</tr>
</thead>
<tbody>
<?php
$i = 1;
$manhdev = $ManhDev->get_list("SELECT * FROM `history_Dvmxh` WHERE `username` = '".$ManhDev->users('username')."' ORDER BY `id` DESC");
foreach($manhdev as $row) { ?>
<tr>
<td><b><?=$i++;?></b></td>
<td><b><?=$row['trading'];?></b></td>
<td><a href="//fb.com/<?=$row['uid'];?>"><?=$row['uid'];?></a></td>
<td><center><span class="badge bg-primary"><?=$row['sever'];?></span></center></td>
<td><b><?=tien($row['amount']);?> <sup><?=$row['type'];?></sup></b></td>
<td><b><?=tien($row['money']);?><sup>đ</sup></b></td>
<td><b><?=ruttien($row['status']);?></b></td>
<?php if($order['type'] == "cmt") { ?>
<td><textarea class="form-control" rows="2" readonly=""><?=$row['cmt'];?></textarea></td>
<?php } ?>
<td><textarea class="form-control" rows="2" readonly=""><?=$row['note'];?></textarea></td>
<td><span class="badge badge-dark"><?=$row['time'];?></span></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>
<?php } ?>