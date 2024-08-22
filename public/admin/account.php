<?php
require('head.php'); 
require('nav.php');

if(isset($_GET['xoa_san_pham'])) {
$id = $_GET['xoa_san_pham'];
$ManhDev->xoa("category", "`id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/account";</script>';
}

if(isset($_GET['show'])) {
$id = $_GET['show'];
$ManhDev->update("category", [
            'status' => 'on'
            ], " `id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/account";</script>';
}

if(isset($_GET['hide'])) {
$id = $_GET['hide'];
$ManhDev->update("category", [
            'status' => 'off'
            ], " `id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/account";</script>';
}

if(isset($_GET['xoa_account'])) {
$id = $_GET['xoa_account'];
$ManhDev->xoa("account", "`id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/account";</script>';
}
?>
<div class="row">
<section class="col-lg-6 connectedSortable">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">DANH SÁCH SẢN PHẨM</h3>
            <div class="text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Thêm Sản Phẩm</button>
        </div>
        </div>
        
    <div class="card-body">
        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>IMG</th>
                                    <th>TITLE</th>
                                    <th>MONEY</th>
                                    <th>NOTE</th>
                                    <th>STATUS</th>
                                    <th>MORE</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
  $user = $ManhDev->query("SELECT * FROM `category` ORDER BY `id` DESC ");
  while ($row1 = mysqli_fetch_array($user)) { ?>
                                <tr>
                                    <td class="text-center"><img src="<?=$row1['img'];?>" height="45px" alt="ManhDev | Bậc Thầy Coder :))"></td>
                                    <td><?=$row1['title'];?></td>
                                    <td class="text-center"><?=tien($row1['money']);?>đ</td>
                                    <td class="text-center"><?=$row1['note'];?></td>
                                    <td class="text-center"><?php if($row1['status'] == "on") { ?><span class="badge badge-success">Hiện</span><?php } else { ?><span class="badge badge-danger">Ẩn</span><?php } ?></td>
                                    <td>
                                        <?php if($row1['status'] == "on") { ?>
                                        <a href="?hide=<?=$row1['id'];?>" class="btn btn-danger btn-sm">Ẩn</a>
                                        <?php } else { ?>
                                        <a href="?show=<?=$row1['id'];?>" class="btn btn-success btn-sm">Hiện</a>
                                        <?php } ?>
                                        <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#sua-<?=$row1['id'];?>">Sửa</a>
                                        <a href="?xoa_san_pham=<?=$row1['id'];?>" class="btn btn-dark btn-sm">Xóa</a></td>
                                </tr>
                                
<div class="modal fade" id="sua-<?=$row1['id'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">SỬA SẢN PHẨM #<?=$row1['id'];?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ẢNH SẢN PHẨM:</label>
                        <input type="text" class="form-control" id="img_<?=$row1['id'];?>" placeholder="Link Ảnh Đại Diện" value="<?=$row1['img'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">TÊN SẢN PHẨM:</label>
                        <input type="text" class="form-control" id="title_<?=$row1['id'];?>" placeholder="Tên Sản Phẩm" value="<?=$row1['title'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá Tiền:</label>
                        <input type="number" class="form-control" id="money_<?=$row1['id'];?>" placeholder="Giá Tiền Sản Phẩm" value="<?=$row1['money'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô Tả:</label>
                        <textarea class="textarea" id="note_<?=$row1['id'];?>" placeholder="Nhập Mô Tả Hướng Dẫn" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$row1['note'];?></textarea>
                    </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                <button type="submit" id="sanpham_<?=$row1['id'];?>" class="btn btn-primary">LƯU LẠI</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
		$('#sanpham_<?=$row1['id'];?>').click(function() {
		$('#sanpham_<?=$row1['id'];?>').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
		    'id'        : '<?=$row1['id'];?>',
            'img'       : $("#img_<?=$row1['id'];?>").val(),
            'title'     : $("#title_<?=$row1['id'];?>").val(),
            'money'     : $("#money_<?=$row1['id'];?>").val(),
            'note'      : $("#note_<?=$row1['id'];?>").val()
		};
		$.post("/api/admin/updateCategory", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông báo', data.msg, data.status);
				$('#sanpham_<?=$row1['id'];?>').html('Xác Nhận').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000);
			     Swal.fire('Thông báo', data.msg, data.status);
			     $('#sanpham_<?=$row1['id'];?>').html('Xác Nhận').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">THÊM SẢN PHẨM</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ẢNH SẢN PHẨM:</label>
                        <input type="text" class="form-control" id="img" placeholder="Link Ảnh Đại Diện">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">TÊN SẢN PHẨM:</label>
                        <input type="text" class="form-control" id="title" placeholder="Tên Sản Phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá Tiền:</label>
                        <input type="number" class="form-control" id="money" placeholder="Giá Tiền Sản Phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô Tả:</label>
                        <textarea class="textarea" id="note" placeholder="Nhập Mô Tả Hướng Dẫn" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                <button type="submit" id="sanpham" class="btn btn-primary">THÊM NGAY</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
		$('#sanpham').click(function() {
		$('#sanpham').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'img'       : $("#img").val(),
            'title'     : $("#title").val(),
            'money'     : $("#money").val(),
            'note'      : $("#note").val()
		};
		$.post("/api/admin/Category", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông báo', data.msg, data.status);
				$('#sanpham').html('Xác Nhận').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000);
			     Swal.fire('Thông báo', data.msg, data.status);
			     $('#sanpham').html('Xác Nhận').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<section class="col-lg-6 connectedSortable">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">DANH SÁCH TÀI KHOẢN</h3>
            <div class="text-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-account">Đăng Tài Khoản</button>
        </div>
        </div>
    <div class="card-body">
        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>SẢN PHẨM</th>
                                    <th>ACCOUNT</th>
                                    <th>TIME</th>
                                    <th>MORE</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
  $account = $ManhDev->query("SELECT * FROM `account` WHERE `username` IS NULL OR `trading` IS NULL ORDER BY `id` DESC LIMIT 10");
  while ($row = mysqli_fetch_array($account)) { ?>
                                <tr>
                                    <td class="text-center"><?=$ManhDev->get_row("SELECT * FROM `category` WHERE `code` = '".$row['code']."' ")['title']; ?></td>
                                    <td><?=$row['note'];?></td>
                                    <td class="text-center"><?=$row['time'];?>đ</td>
                                    <td>
                                        <a href="?xoa_account=<?=$row['id'];?>" class="btn btn-danger btn-sm">Xóa</a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
    </div>
</div>
</section>

<section class="col-lg-12 connectedSortable">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">DANH SÁCH ĐƠN HÀNG</h3>
        </div>
        
    <div class="card-body">
        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>USER</th>
                                    <th>TITLE</th>
                                    <th>AMOUNT</th>
                                    <th>MONEY</th>
                                    <th>CODE</th>
                                    <th>TIME</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
  $user = $ManhDev->query("SELECT * FROM `orders` ORDER BY `id` DESC ");
  while ($row1 = mysqli_fetch_array($user)) { ?>
                                <tr>
                                    <td class="text-center"><?=$row1['username'];?></td>
                                    <td><?=$row1['title'];?></td>
                                    <td class="text-center"><?=tien($row1['amount']);?></td>
                                    <td class="text-center"><?=tien($row1['money']);?>đ</td>
                                    <td class="text-center"><?=$row1['trading'];?></td>
                                    <td class="text-center"><?=$row1['time'];?></td>
                                </tr>
                                
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
</div>
<div class="modal fade" id="modal-account">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">THÊM TÀI KHOẢN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">MỖI DÒNG 1 ACC:</label>
                        <textarea class="form-control" id="listclone" placeholder="ID|PASS|2FA"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">THỂ LOẠI:</label>
                        <select class="custom-select" id="loai">
                  <?php
                  $result = $ManhDev->query("SELECT * FROM `category` ");
                  while ($row = mysqli_fetch_array($result) ) { ?>
                  <option value="<?=$row['code'];?>"><?=$row['title'];?></option>
                  <?php } ?>
                  </select>
                    </div>
                    <small class="text-danger">Hệ Thống Sẽ Cập Nhật Nếu Trùng Tài Khoản</small>
                </div>
               
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                <button type="submit" id="account" class="btn btn-primary">THÊM ACC</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
		$('#account').click(function() {
		$('#account').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'listclone'   : $("#listclone").val(),
            'loai'        : $("#loai").val()
		};
		$.post("/api/admin/Account", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông báo', data.msg, data.status);
				$('#account').html('Xác Nhận').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000);
			     Swal.fire('Thông báo', data.msg, data.status);
			     $('#account').html('Xác Nhận').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<?php require('foot.php'); ?>