<?php
require('head.php'); 
require('nav.php'); 

if(isset($_GET['xoa_code'])) {
$id = $_GET['xoa_code'];

$ManhDev->xoa("soucerCode", "`id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/coder";</script>';
}


if(isset($_GET['xoa_list'])) {
$id = $_GET['xoa_list'];

$ManhDev->xoa("history_Code", "`id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/coder";</script>';
}
?>
<div class="row">
<section class="col-lg-6 connectedSortable">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">DANH SÁCH CODE ĐANG BÁN</h3>
                    <div class="text-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Thêm Code</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Tiêu Đề</th>
                                    <th>Giá Tiền</th>
                                    <th>Mô Tả</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
  $i = 1;
  $user = $ManhDev->query("SELECT * FROM `soucerCode` ORDER BY `id` DESC ");
  while ($row1 = mysqli_fetch_array($user)) { ?>
                                <tr class="text-center">
                                    <td><?=$i++;?></td>
                                    <td><img src="<?=$row1['img'];?>" height="100px"></td>
                                    <td><?=$row1['title'];?></td>
                                    <td><?=tien($row1['money']);?></td>
                                    <td><?=$row1['note'];?></td>
                                    <td><a href="?xoa_code=<?=$row1['id'];?>" class="btn btn-danger btn-sm">Xóa</a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</section>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">THÊM CODE WEBSITE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form enctype="multipart/form-data" action="" method="POST">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ẢNH ĐẠI DIỆN:</label>
                        <input type="text" class="form-control" name="img" placeholder="Link Ảnh Đại Diện">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">TÊN SẢN PHẨM:</label>
                        <input type="text" class="form-control" name="title" placeholder="Tên Sản Phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">GIÁ TIỀN:</label>
                        <input type="number" class="form-control" name="money" placeholder="Giá Tiền">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NỘI DUNG:</label>
                        <textarea type="text" class="form-control" name="note" placeholder="Nội Dung Mô Tả"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">LINK TẢI:</label>
                        <input type="url" class="form-control" name="link" placeholder="Link Tải Code">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ẢNH DEMO:</label><br>
                        <input type="file" name="file[]" placeholder="Ảnh Demo Code Website" multiple>
                    </div>
                
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                <button type="submit" name="sanpham" class="btn btn-primary">THÊM NGAY</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
if(isset($_POST['sanpham'])) {
$name = array();
$tmp_name = array();
$error = array();
$ext = array();
$size = array();

foreach ($_FILES['file']['name'] as $file) {
$name[] = $file;
}
foreach ($_FILES['file']['tmp_name'] as $file){
$tmp_name[] = $file;
}

for ($i=0;$i<count($name);$i++) {
if ($error[$i] > 0){
echo $error[$i];
} else {
$number_random = rand(1000, 9999);
$img         = $_POST['img'];
$title       = $_POST['title'];
$code        = xoadau($title);
$money       = addslashes($_POST['money']);
$note        = $_POST['note'];
$link        = $_POST['link'];

$temp = preg_split('/[\/\\\\]+/', $name[$i]);
$filename = $temp[count($temp)-1];
$upload_dir = "../../anh/";
$upload_file = $upload_dir . "CODE_".$number_random.".png";
if (file_exists($upload_file)){ 
echo '<script>Swal.fire("Thông Báo", "Hình Ảnh Đã Tồn Tại", "error");</script>';
}

if (move_uploaded_file($tmp_name[$i], $upload_file) ) {
$duong_lik = "/anh/CODE_".$number_random.".png";
$getanh = explode(PHP_EOL,$duong_lik);
$countupdate = 0;


foreach($getanh as $row) {
$ManhDev->query("INSERT INTO `demo_img_code` SET 
`code` = '$code',
`img` = '$row' ");
$countupdate++;
}
}
}
}

if(empty($img) || empty($title) || empty($money) || empty($note) || empty($link)) {
echo '<script>Swal.fire("Thông Báo", "Vui Lòng Nhập Đầy Đủ Thông Tin", "error");</script>';
} else if($money < 1) {
echo '<script>Swal.fire("Thông Báo", "Số Tiền Tối Thiểu Là 1đ", "error");</script>';
} else {
$ManhDev->insert("soucerCode", [
                'img'        => $img,
                'title'      => $title,
                'money'      => $money,
                'download'   => '0',
                'note'       => $note,
                'code'       => $code,
                'linkDown'   => $link
                ]);

echo '<script>setTimeout(function(){ location.href = "" },2000); Swal.fire("Thông Báo", "Thêm Code Bán Thành Công", "success");</script>';
}
}
?>

<section class="col-lg-6 connectedSortable">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">KHÁCH MUA CODE</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Tài Khoản</th>
                                    <th>Mã Giao Dịch</th>
                                    <th>Sản Phẩm</th>
                                    <th>Giá Tiền</th>
                                    <th>Thời Gian</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
  $i = 1;
  $user = $ManhDev->query("SELECT * FROM `history_Code` ORDER BY `id` DESC ");
  while ($row1 = mysqli_fetch_array($user)) { ?>
                                <tr class="text-center">
                                    <td><?=$i++;?></td>
                                    <td><?=$row1['username'];?></td>
                                    <td><?=$row1['trading'];?></td>
                                    <td><?=$row1['title'];?></td>
                                    <td><?=tien($row1['money']);?></td>
                                    <td><?=$row1['time'];?></td>
                                    <td><a href="?xoa_list=<?=$row1['id'];?>" class="btn btn-danger btn-sm">Xóa</a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</section>
</div>
<?php require('foot.php'); ?>