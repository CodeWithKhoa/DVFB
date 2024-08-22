<?php
require('head.php'); 
require('nav.php'); 

if(isset($_GET['xoa'])) {
$id = $_GET['xoa'];

$ManhDev->xoa("history_Dvmxh", "`id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/mxh";</script>';
}


if(isset($_GET['duyet'])) {
$id = $_GET['duyet'];
$ManhDev->update("history_Dvmxh", [
            'status' => 'hoantat'
            ], " `id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/mxh";</script>';
}

if(isset($_GET['xuly'])) {
$id = $_GET['xuly'];
$ManhDev->update("history_Dvmxh", [
            'status' => 'xuly'
            ], " `id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/mxh";</script>';
}

if(isset($_GET['thatbai'])) {
$id = $_GET['thatbai'];
$ManhDev->update("history_Dvmxh", [
            'status' => 'thatbai'
            ], " `id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/mxh";</script>';
}

if(isset($_GET['xoa_maychu'])) {
$id = $_GET['xoa_maychu'];

$ManhDev->xoa("server", "`id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/mxh";</script>';
}
?>
<div class="row">
<section class="col-lg-12 connectedSortable">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">API TOKEN AUTO</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
            <label class="form-label">Api Token Site Chính:</label>
            <textarea class="form-control textarea" id="token_sgr" placeholder="Nhập Token Vào Đây"><?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'token_subgiare' ")['value'];?></textarea>
        </div>
        
        <div class="form-group">
            <label class="form-label">ON/OFF Đơn tay(ON = Mở Đơn Tay)</label>
            <select id="autodon" class="form-control">
                <option value="<?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'order_auto' ")['status'];?>"><?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'order_auto' ")['status'];?></option>
                <option value="ON">ON</option>
                <option value="OFF">OFF</option>
            </select>
        </div>
        <div class="form-group">
            <button type="button" id="submit_luu_api" class="btn btn-primary btn-block">Lưu Lại</button>
        </div>
                </div>
            </div>
</section>
<script type="text/javascript">
$(document).ready(function(){
		$('#submit_luu_api').click(function() {
		$('#submit_luu_api').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
		    'type'         : 'edit_apitoken',
		    'token_sgr'    : $("#token_sgr").val(),
		    'autodon'      : $("#autodon").val()
		};
		$.post("/api/admin/Mxh", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông báo', data.msg, data.status);
				$('#submit_luu_api').html('Lưu Lại').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000);
			     Swal.fire('Thông báo', data.msg, data.status);
			     $('#submit_luu_api').html('Lưu Lại').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>


<section class="col-lg-12 connectedSortable">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">DANH SÁCH MÁY CHỦ</h3>
                    <div class="text-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-maychu">Thêm Máy Chủ</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Sever</th>
                                    <th>Service</th>
                                    <th>Money</th>
                                    <th>Status</th>
                                    <th>max Buft</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
  $maychu = $ManhDev->query("SELECT * FROM `server` ORDER BY `id` DESC ");
  while ($mc = mysqli_fetch_array($maychu)) { ?>
                                <tr class="text-center">
                                    <td><?=$mc['code_type'];?></td>
                                    <td><?=$mc['title'];?></td>
                                    <td>SV<?=$mc['sever'];?></td>
                                    <td><?=$mc['code_service'];?></td>
                                    <td><?=$mc['money'];?>đ</td>
                                    <td><?=$mc['status'];?></td>
                                    <td><?=tien($mc['max_buff']);?></td>
                                    <td>
                                        <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-maychu-<?=$mc['id'];?>">Sửa</a>
                                        <a href="?xoa_maychu=<?=$mc['id'];?>" class="btn btn-dark btn-sm">Xóa</a>
                                    </td>
                                </tr>
<div class="modal fade" id="edit-maychu-<?=$mc['id'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">SỬA MÁY CHỦ #<?=$mc['id'];?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">TIÊU ĐỀ:</label>
                        <input type="text" class="form-control" id="title2_<?=$mc['id'];?>" placeholder="Tên Tương Tác" value="<?=$mc['title'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">MÁY CHỦ:</label>
                        <input type="number" class="form-control" id="sever_<?=$mc['id'];?>" placeholder="Máy Chủ Số" value="<?=$mc['sever'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">GIÁ TIỀN:</label>
                        <input type="number" class="form-control" id="money_<?=$mc['id'];?>" placeholder="Giá Tiền" value="<?=$mc['money'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">TRẠNG THÁI:</label>
                        <select id="status_<?=$mc['id'];?>" class="form-control">
                            <option value="<?=$mc['status'];?>"><?=$mc['status'];?></option>
                            <option value="on">On</option>
                            <option value="off">Off</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">TĂNG TỐI ĐÃ:</label>
                        <input type="number" class="form-control" id="max_<?=$mc['id'];?>" placeholder="Nhập Số Lượng Buft Tối Đa" value="<?=$mc['max_buff'];?>">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                <button type="submit" id="luu_maychu3_<?=$mc['id'];?>" class="btn btn-primary">LƯU LẠI</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
		$('#luu_maychu3_<?=$mc['id'];?>').click(function() {
		$('#luu_maychu3_<?=$mc['id'];?>').html('ĐANG XỬ LÝ...').prop('disabled', true);
		var formData = {
		    'type'         : 'edit_sever',
		    'id'           : '<?=$mc['id'];?>',
            'title_2'      : $("#title2_<?=$mc['id'];?>").val(),
            'sever'        : $("#sever_<?=$mc['id'];?>").val(),
            'money'        : $("#money_<?=$mc['id'];?>").val(),
            'status'       : $("#status_<?=$mc['id'];?>").val(),
            'max'          : $("#max_<?=$mc['id'];?>").val()
		};
		$.post("/api/admin/Mxh", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông báo', data.msg, data.status);
				$('#luu_maychu3_<?=$mc['id'];?>').html('LƯU LẠI').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000);
			     Swal.fire('Thông báo', data.msg, data.status);
			     $('#luu_maychu3_<?=$mc['id'];?>').html('LƯU LẠI').prop('disabled', false);
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
            </div>
</section>
<div class="modal fade" id="modal-maychu">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">THÊM MÁY CHỦ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                        <label for="exampleInputEmail1">THỂ LOẠI:</label>
                        <select id="type2" class="form-control">
                            <option value="facebook">Facebook</option>
                            <option value="instagram">Instagram</option>
                            <option value="tiktok">Tik Tok</option>
                            <option value="youtube">Youtube</option>
                            <option value="twitter">Twitter</option>
                            <option value="shopee">Shopee</option>
                        </select>
                    </div>
                    
                <div class="form-group">
                        <label for="exampleInputEmail1">DỊCH VỤ:</label>
                        <select id="code333" class="form-control">
                            <option value="like-post">FB: Like</option>
                            <option value="comment">FB: Comment</option>
                            <option value="sub-follow">FB: Sub/Follow</option>
                            <option value="like-page">FB: Like Page Quality</option>
                            <option value="eye-live">FB: Mắt Live</option>
                            <option value="view-video">FB: View Video</option>
                            <option value="share">FB: Chia Sẻ (Profile)</option>
                            <option value="member-group">FB: Thành Viên Group</option>
                            <option value="view-story">FB: View Story</option>
                            <option value="like">INS: Like</option>
                            <option value="sub-follow">INS: Sub/Follow</option>
                            <option value="view">INS: View</option>
                            <option value="like">TT: Tim Video</option>
                            <option value="sub-follow">TT: Sub/Follow</option>
                            <option value="view">TT: View Video</option>
                            <option value="eye-live">TT: Mắt Live</option>
                            <option value="like">YT: Like Video</option>
                            <option value="sub-follow">YT: Sub/Follow Kênh</option>
                            <option value="like">TWT: Like</option>
                            <option value="sub-follow">TWT: Sub/Follow</option>
                            <option value="like">SPE: Like</option>
                            <option value="sub-follow">SPE: Sub/Follow</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">TIÊU ĐỀ:</label>
                        <input type="text" class="form-control" id="title2" placeholder="Tên Tiêu Đề">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">SERVER</label>
                        <input type="text" class="form-control" id="sever2" placeholder="Ghi Rõ Server Api">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">GIÁ TIỀN:</label>
                        <input type="number" class="form-control" id="money2" placeholder="Giá Tiền">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">TĂNG TỐI ĐA:</label>
                        <input type="number" class="form-control" id="max2" placeholder="Nhập Số Lượng Buft Tối Đa">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">TRƯNG BÀY:</label>
                        <select id="dislay2" class="form-control">
                            <option value="">Không Thêm</option>
                            <option value=' <b class="text-info">(Nên Dùng Ổn Định)</b>'>Nên dùng ổn định</option>
                            <option value=' <b class="text-danger">(Hot)</b>'>Hot</option>
                            <option value=' <b class="text-warning">(New)</b>'>New</option>
                            <option value=' <b class="text-success">(Nên Dùng)</b>'>Nên Dùng</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                <button type="submit" id="them_maychu2" class="btn btn-primary">THÊM NGAY</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
		$('#them_maychu2').click(function() {
		$('#them_maychu2').html('ĐANG XỬ LÝ...').prop('disabled', true);
		var formData = {
		    'type'         : 'add_sever2',
		    'type2'        : $("#type2").val(),
		    'code33'       : $("#code333").val(),
            'title2'       : $("#title2").val(),
            'sever2'       : $("#sever2").val(),
            'money2'       : $("#money2").val(),
            'max2'         : $("#max2").val(),
            'dislay2'      : $("#dislay2").val()
		};
		$.post("/api/admin/Mxh", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông báo', data.msg, data.status);
				$('#them_maychu2').html('THÊM NGAY').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000);
			     Swal.fire('Thông báo', data.msg, data.status);
			     $('#them_maychu2').html('THÊM NGAY').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>

<section class="col-lg-12 connectedSortable">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">DANH SÁCH ĐƠN HÀNG</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Tài Khoản</th>
                                    <th>Mã Giao Dịch</th>
                                    <th>ID Buft</th>
                                    <th>Server Buft</th>
                                    <th>Số Lượng</th>
                                    <th>Tổng Tiền</th>
                                    <th>Dịch Vụ</th>
                                    <th>Loại</th>
                                    <th>Trạng Thái</th>
                                    <th>Bình Luận</th>
                                    <th>Note</th>
                                    <th>Thời Gian</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
  $i = 1;
  $user = $ManhDev->query("SELECT * FROM `history_Dvmxh` ORDER BY `id` DESC ");
  while ($row1 = mysqli_fetch_array($user)) { ?>
                                <tr class="text-center">
                                    <td><?=$i++;?></td>
                                    <td><?=$row1['username'];?></td>
                                    <td><?=$row1['trading'];?></td>
                                    <td><?=$row1['uid'];?></td>
                                    <td><?=$row1['sever'];?></td>
                                    <td><?=tien($row1['amount']);?></td>
                                    <td><?=tien($row1['money']);?></td>
                                    <td><?=$row1['type_service'];?></td>
                                    <td><?=$row1['type'];?></td>
                                    <td><?=ruttien($row1['status']);?></td>
                                    <td><?=$row1['cmt'];?></td>
                                    <td><?=$row1['note'];?></td>
                                    <td><?=$row1['time'];?></td>
                                    <td>
                                        <?php if($row1['status'] == "xuly") { ?>
                                        <a href="?duyet=<?=$row1['id'];?>" class="btn btn-success btn-sm">Duyệt</a>
                                        <a href="?thatbai=<?=$row1['id'];?>" class="btn btn-danger btn-sm">Thất Bại</a>
                                        <?php } else if($row1['status'] == "thatbai") { ?>
                                        <a href="?duyet=<?=$row1['id'];?>" class="btn btn-success btn-sm">Duyệt</a>
                                        <a href="?xuly=<?=$row1['id'];?>" class="btn btn-warning btn-sm">Xử Lý</a>
                                        <?php } ?>
                                        <a href="?xoa=<?=$row1['id'];?>" class="btn btn-dark btn-sm">Xóa</a>
                                    </td>
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