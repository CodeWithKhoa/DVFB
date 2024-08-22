<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Lịch Sử Hoạt Động</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header"><h4>Hoạt Động Gần Đây</h4></div>
<div class="card-body">
<div class="row">
<div class="table-responsive">
<table class="table hover multiple-select-row data-table-export nowrap">
<thead>
<tr>
<th>#</th>
<th>Content</th>
<th>IP</th>
<th>Time</th>
</tr>
</thead>
<tbody>
<?php
$i = 1;
$manhdev = $ManhDev->get_list("SELECT * FROM `log_site` WHERE `username` = '".$ManhDev->users('username')."' ORDER BY `id` DESC LIMIT 10 ");
foreach($manhdev as $row) { ?>
<tr>
<td><b><?=$i++;?></b></td>
<td><b><?=$row['note'];?></b></td>
<td><b><?=$row['ip'];?></b></td>
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
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>