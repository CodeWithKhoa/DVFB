<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Danh Sách Hosting</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-6 mb-3">
<a href="/service/hosting/order" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/000000/external-web-hosting-data-analytics-flaticons-lineal-color-flat-icons.png" alt="" width="25" height="25"> Danh Sách Host</a>
</div>
<div class="col-6 mb-3">
<a href="/service/hosting/list" class="btn btn-primary btn-block"><img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/000000/external-history-online-education-flaticons-lineal-color-flat-icons.png" alt="" width="25" height="25">Hosting Đã Mua</a>
</div>
<br>
<div class="col-md-12">
<div class="card mb-4">
<div class="card-body">
<h5 class="card-title mb-4">Danh Sách Hosting Đã Mua</h5>
<div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="1">
<table class="table table-striped table-bordered table-hover">
<tbody role="alert" aria-live="polite" aria-relevant="all" class="">
<div class="alert bg-primary mb-3" role="alert">
- Nếu Hosting Hết Hạn Mà Không Gia Hạn Sau 3 Ngày Sẽ Bị Xóa Host, Chúng Tôi Sẽ Không Backup Lại File Trên Host Đã Bị Xóa!<br>
- Vui Lòng Trỏ Nameserver <b>Bên Dưới</b> Hoặc Truy Cập Hosting Để Lấy <b>IP</b>:<br>
<center class="text-success"><?=$nsv1;?><br><?=$nsv2;?><br></center>
</div>
<?php
$i = 1;
$list_ls = $ManhDev->get_list("SELECT * FROM `history_Host` WHERE `username` = '$username' ORDER BY `id` DESC ");
if($list_ls) {
foreach($list_ls as $row) { ?>
<tr>
    <td style="text-align:left">
       <font>
      Quản Lý Hosting <b class="text-info"><?=$row['domain'];?></b><br>
      Tên miền: <a target="_blank" href="https://<?=$row['domain'];?>"><b><?=$row['domain'];?></b></a><br>
      <?php if($row['status'] == "hoantat") { ?>
	  Cpanel login: <a target="_blank" style="color:violet;" href="<?=$row['login'];?>"><b><?=$row['login'];?></b></a> <br>
	  Tài khoản: <b class="text-warning"><?=$row['taikhoan'];?></b><br>
	  Mật khẩu: <b class="text-warning"><?=$row['matkhau'];?></b>
	  <?php } else { ?>
	  <b class="text-danger">Hosting Đang Chờ Tạo, Tạo Xong Sẽ Hiện Tài Khoản Tại Đây!</b>
	  <?php } ?>
	  </font>
	</td>
</tr>
<tr>
    <td style="text-align:left">
        <font>
        Tình Trạng: <?=host($row['status']);?><br>
        Ngày Mua: <b class="text-success"><?=date('d/m/Y', $row['ngaymua']);?></b><br>
        Ngày Hết Hạn: <b class="text-danger"><?=date('d/m/Y', $row['ngayhet']);?></b><br>	
	    Gói Hosting: <b class="text-info"><?=$row['goi'];?></b><br>
	    Giá Gia Hạn: <b class="text-primary"><?=tien($row['money']);?>Coin/1 tháng
		</b></font>
	</td>
</tr>
<hr>
<?php } } else { ?>
<tr>
    <td colspan="100%"><center><img src="https://img.icons8.com/offices/64/000000/no-sugar2.png" alt="" class="pt-3"><p class="pt-3">Không có dữ liệu để hiển thị</p></center></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div> </div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>