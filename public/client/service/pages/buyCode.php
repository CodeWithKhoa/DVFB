<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}

if($ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'coder' ")['status'] !== "ON") {
include $_SERVER['DOCUMENT_ROOT'].'/public/client/pages/404.php';
die();
}
?>
<title>Mua Source Code</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-md-12">
<div class="row">
<div class="col-6">
<a href="/service/code/order" class="btn btn-primary btn-block"><img src="https://img.icons8.com/stickers/100/000000/code.png" alt="" width="25" height="25"> Mua Code</a>
</div>
<div class="col-6">
<a href="/service/code/list" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/nolan/64/online-shopping.png" alt="" width="25" height="25"> Code Đã Mua</a>
</div>
</div>
<div class="p-2">
<div class="row">
<?php
$list = $ManhDev->get_list("SELECT * FROM `soucerCode` ORDER BY `id` DESC ");
foreach($list as $row) { ?>
<div class="col-lg-4 col-md-6 col-sm-12 mb-3">
<div class="card">
<div class="p-3">
<img alt="ManhDev | 0528139892" src="<?=$row['img'];?>" class="img-fluid rounded">
<h4 class="card-title mt-2"><?=$row['title'];?></h4>
<span class="badge border border-success text-success"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" height="15px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg> <?=tien($row['money']);?>đ</span>
    <span class="badge border border-primary text-primary mt-1"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" height="15px" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
</svg> <?=tien($row['download']);?></span><br>
<a href="/service/code/view/<?=$row['id'];?>" class="btn btn-info btn-block mt-2">Chi tiết</a>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>