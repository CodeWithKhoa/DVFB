<?php
require('head.php'); 
require('nav.php'); 

if(isset($_GET['xoa'])) {
$id = $_GET['xoa'];

$ManhDev->xoa("key_log", "`id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/keytool";</script>';
}

?>
<div class="row">
<section class="col-lg-12 connectedSortable">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">CHỈNH SỬA GIÁ KEY</h3>
        </div>
    <div class="card-body">
        <div class="form-group">
            <label class="form-label">Giá Key Tool:</label>
            <input type="number" class="form-control" id="amount" placeholder="Nhập Giá Key Của 1 Ngày" value="<?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'money_key' ")['value'];?>">
        </div>
        <div class="form-group">
            <button type="button" id="submit" class="btn btn-success btn-block">Lưu Lại</button>
        </div>
<script type="text/javascript">
$(document).ready(function(){
		$('#submit').click(function() {
		$('#submit').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'amount'  : $("#amount").val()
		};
		$.post("/api/admin/setKey", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông báo', data.msg, data.status);
				$('#submit').html('Lưu Lại').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000);
			     Swal.fire('Thông báo', data.msg, data.status);
			     $('#submit').html('Lưu Lại').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
</div>
</div>
</section>
<section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DANH SÁCH KEY TOOL</h3><br>
                    <small>Link Api Check Key: <code><?=$base_url;?>api/key?key=<b>{key_cua_ban}</b></code></small>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Tài Khoản</th>
                                    <th>Tên</th>
                                    <th>Key Code</th>
                                    <th>Số Ngày</th>
                                    <th>Bắt Đầu</th>
                                    <th>Kết Thúc</th>
                                    <th>Trạng Thái</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 
  $i = 1;
  $user = $ManhDev->query("SELECT * FROM `key_log` ORDER BY `id` DESC ");
  while ($row1 = mysqli_fetch_array($user)) { ?>
                                <tr class="text-center">
                                    <td><?=$i++;?></td>
                                    <td><?=$row1['username'];?></td>
                                    <td><?=$row1['name'];?></td>
                                    <td><?=$row1['key_code'];?></td>
                                    <td><?=$row1['amount'];?></td>
                                    <td><?=date("d-m-Y", $row1['start']);?></td>
                                    <td><?=date("d-m-Y", $row1['end']);?></td>
                                    <td><?=keytool($row1['status']);?></td>
                                    <td><a href="?xoa=<?=$row1['id'];?>" class="btn btn-danger btn-sm">Xóa</a></td>
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