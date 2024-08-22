<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
$ALL = $_SERVER['REQUEST_URI'];
$type = explode("/", explode("service/", $ALL)[1])[0]; #dịch vụ
$code = explode("/list", explode("/", $ALL)[3])[0];

if($code == "like-post") {
$title = "Đơn Tăng Like Bài Viết";
} else if($code == "sub-follow") {
$title = "Đơn Tăng Theo Dõi Trang Cá Nhân";
} else if($code == "like-page") {
$title = "Đơn Tăng Like/Follow Page";
} else if($code == "comment") {
$title = "Đơn Tăng Bình Luận Bài Viết";
} else if($code == "eye-live") {
$title = "Đơn Tăng Mắt Live Stream";
} else if($code == "view-video") {
$title = "Đơn Tăng Lượt Xem Video";
} else if($code == "share") {
$title = "Đơn Tăng Chia Sẻ Bài Viết";
} else if($code == "member-group") {
$title = "Đơn Tăng Thành Viên Nhóm (Group)";
} else if($code == "view-story") {
$title = "Đơn Tăng Lượt Xem Tin";
} else if($code == "vip-like") {
$title = "Đơn Vip Like Bài Viết Tháng";
} else if($code == "like") {
$title = "Đơn Tăng Like Bài Viết";
} else if($code == "view") {
$title = "Đơn Tăng View";
} else {
include$_SERVER['DOCUMENT_ROOT'].'/public/client/pages/404.php';
die();
}
?>
<title><?=$title;?></title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-md-12">
<div class="card mb-3">
<div class="card-header">
<div class="row">
<div class="col-6">
<a href="/service/<?=$type;?>/<?=$code;?>/buy" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/stickers/100/null/shopping-basket-success.png" alt="" width="25" height="25"> Đơn Hàng</a>
</div>
<div class="col-6">
<a href="" class="btn btn-primary btn-block"><img src="https://img.icons8.com/dusk/64/000000/list--v1.png" alt="" width="25" height="25">Danh Sách Đơn</a>
</div>
</div>
</div>
<div class="card-body">
<table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Mã Giao Dịch</th>
                                    <th>ID & Link</th>
                                    <th>Server Buft</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng Tiền</th>
                                    <th>Dịch Vụ</th>
                                    <th>Trạng Thái</th>
                                    <?php if($code == "comment") { ?>
                                    <th>Bình Luận</th>
                                    <?php } ?>
                                    <th>Note</th>
                                    <th>Thời Gian</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
  $i = 1;
  $user = $ManhDev->query("SELECT * FROM `history_Dvmxh` WHERE `username` = '".$ManhDev->users('username')."' AND `type_service` = '$type' AND `type_server` = '$code' ORDER BY `id` DESC ");
  while ($row1 = mysqli_fetch_array($user)) { ?>
                                <tr class="text-center">
                                    <td><?=$i++;?></td>
                                    <td><?=$row1['trading'];?></td>
                                    <td><?=$row1['uid'];?></td>
                                    <td><?=$row1['sever'];?></td>
                                    <td><?=tien($row1['amount']);?></td>
                                    <td><?=tien($row1['money']);?></td>
                                    <td><?=$row1['type_service'];?></td>
                                    <td><?=ruttien($row1['status']);?></td>
                                    <?php if($code == "comment") { ?>
                                    <td><?=$row1['cmt'];?></td>
                                    <?php } ?>
                                    <td><?=$row1['note'];?></td>
                                    <td><?=$row1['time'];?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
</div>
</div>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>