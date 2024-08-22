<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Danh Sách Thể Loại Web</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-md-12">
<div class="row">
<div class="col-6">
<a href="/service/createWeb/view" class="btn btn-primary btn-block"><img src="https://img.icons8.com/external-sbts2018-outline-color-sbts2018/58/000000/external-website-seo-4.-2-sbts2018-outline-color-sbts2018-3.png" alt="" width="25" height="25"> Danh Sách</a>
</div>
<div class="col-6">
<a href="/service/createWeb/list" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/external-xnimrodx-blue-xnimrodx/64/000000/external-website-cyber-monday-xnimrodx-blue-xnimrodx-2.png" alt="" width="25" height="25"> Website Đã Tạo</a>
</div>
</div>
<div class="p-2">
<div class="row">
<?php
$list = $ManhDev->get_list("SELECT * FROM `soucerWeb` ORDER BY `id` DESC ");
foreach($list as $row) { ?>
<div class="col-lg-4 col-md-6 col-sm-12 mb-3">
<div class="card">
<div class="p-3">
<img alt="ManhDev | 0528139892" src="<?=$row['img'];?>" class="img-fluid rounded">
<h4 class="card-title mt-2"><?=$row['title'];?></h4>
<p class="text-center"><?=$row['note'];?></p>
<h5 class="text-center text-success"><?=tien($row['money']);?>đ</h5>
<a href="/service/createWeb/view/<?=$row['id'];?>" class="btn btn-success btn-block mt-2"><svg class="svg-inline--fa fa-arrow-right fa-w-14" height="18px" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="arrow-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"></path></svg> Tạo Ngay</a>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>