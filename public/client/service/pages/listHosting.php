<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Danh Sách Hosting</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-6 mb-3">
<a href="/service/hosting/order" class="btn btn-primary btn-block"><img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/000000/external-web-hosting-data-analytics-flaticons-lineal-color-flat-icons.png" alt="" width="25" height="25"> Danh Sách Host</a>
</div>
<div class="col-6 mb-3">
<a href="/service/hosting/list" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/000000/external-history-online-education-flaticons-lineal-color-flat-icons.png" alt="" width="25" height="25">Hosting Đã Mua</a>
</div>

<div class="col-sm-12 col-md-12 mb-3">
<div class='card'>
    <div class='card-header'><center><h5>DANH SÁCH HOSTING WEBSITE</h5></center></div>
    <div class='card-body'>
    <div class="row">
<?php
$danhsach = $ManhDev->get_list("SELECT * FROM `list_Host`");
foreach($danhsach as $row) { ?>
<div class="col-sm-12 col-md-3 mb-3">
        <div class="card">
            <div class="card-body">
                <h4 class="danger-title"><img src="https://cdn.iconscout.com/icon/premium/png-256-thumb/web-hosting-503942.png" height="20px"> <?=$row['title'];?></h4>
                <center><small class="text-info"><?=tien($row['money']);?>Coin/30 Ngày</small></center>
                <li>Dung Lượng: <?=tien($row['capacity']);?>Mb</li>
                <?=$row['note'];?>
                <hr>
                <center><a href="/service/hosting/buy/<?=$row['code'];?>" class="btn btn-sm btn-success btn-block"><img src="https://img.icons8.com/external-outline-lafs/64/000000/external-ic_buy-menu-outline-lafs.png" height="18px"/> Đặt Mua</a></center>
                </div>
        </div>
    </div>
<?php } ?>
    </div>
</div>
</div>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>