<?php
require('head.php'); 
require('nav.php');

if(isset($_GET['xoa_ruttien'])) {
$id = $_GET['xoa_ruttien'];
$ManhDev->xoa("withdrawCard", "`id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/upCard";</script>';
}

if(isset($_GET['duyet_ruttien'])) {
$id = $_GET['duyet_ruttien'];
$ManhDev->update("withdrawCard", [
            'statusBank' => 'hoantat'
            ], " `id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/upCard";</script>';
}

if(isset($_GET['xuly_ruttien'])) {
$id = $_GET['xuly_ruttien'];
$ManhDev->update("withdrawCard", [
            'statusBank' => 'xuly'
            ], " `id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/upCard";</script>';
}

if(isset($_GET['thatbai_ruttien'])) {
$id = $_GET['thatbai_ruttien'];
$ManhDev->update("withdrawCard", [
            'statusBank' => 'thatbai'
            ], " `id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/upCard";</script>';
}

if(isset($_GET['xoa_chuyentien'])) {
$id = $_GET['xoa_chuyentien'];
$ManhDev->xoa("transferMoney", "`id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/upCard";</script>';
}
?>
<div class="row">
<section class="col-lg-12 connectedSortable">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">CONFIG GẠCH THẺ CÀO</h3>
        </div>
    <div class="card-body">
    <div class="form-group">
            <label class="form-label">Api KEY <a href="//gachthe1s.com">gachthe1s.com</a>:</label><br>
            <small>Link Callback Gạch Thẻ: <code><?=$base_url;?>auth/callbackCard</code></small><br>
            <beautiful> Partner Key:</beautiful> <br>
            <input type="text" class="form-control" id="key" placeholder="Nhập Partner Key Website" value="<?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'key_card' ")['value'];?>">
            <beautiful> Partner Id:</beautiful> <br>
            <input type="text" class="form-control" id="idcard" placeholder="Nhập Partner Id Website" value="<?=$ManhDev->get_row("SELECT * FROM `options` WHERE `key_code` = 'id_card' ")['value'];?>">
        </div>
    
    <div class="form-group">
            <button type="button" id="submit" class="btn btn-success btn-block">Lưu Lại</button>
        </div>
    </div>
</div>
</section>
<script type="text/javascript">
$(document).ready(function(){
		$('#submit').click(function() {
		$('#submit').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'id'       : $("#idcard").val(),
            'key'       : $("#key").val()
		};
		$.post("/api/admin/ApiCard", formData,
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

<section class="col-lg-6 connectedSortable">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">DANH SÁCH RÚT TIỀN</h3>
        </div>
    <div class="card-body table-responsive">
        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>USER</th>
                                    <th>BANKING</th>
                                    <th>NUMBER BANK</th>
                                    <th>NAME BANK</th>
                                    <th>BRANCH BANK</th>
                                    <th>MONEY</th>
                                    <th>STATUS</th>
                                    <th>TIME</th>
                                    <th>TYPE</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
$i = 1;
  $account = $ManhDev->query("SELECT * FROM `withdrawCard` ORDER BY `id` DESC ");
  while ($row = mysqli_fetch_array($account)) { ?>
                                <tr>
                                    <td class="text-center"><?=$i++;?></td>
                                    <td><?=$row['username'];?></td>
                                    <td class="text-center"><?=$row['banking'];?></td>
                                    <td class="text-center"><?=$row['numberBank'];?></td>
                                    <td class="text-center"><?=$row['nameBank'];?></td>
                                    <td class="text-center"><?=$row['branchBank'];?></td>
                                    <td class="text-center"><?=tien($row['moneyBank']);?>đ</td>
                                    <td class="text-center"><?=ruttien($row['statusBank']);?></td>
                                    <td class="text-center"><?=$row['time'];?></td>
                                    <td>
                                        <?php if($row['statusBank'] == "xuly") { ?>
                                        <a href="?duyet_ruttien=<?=$row['id'];?>" class="btn btn-success btn-sm">Duyệt</a>
                                        <a href="?thatbai_ruttien=<?=$row['id'];?>" class="btn btn-danger btn-sm">Thất Bại</a>
                                        <?php } else if($row['statusBank'] == "thatbai") { ?>
                                        <a href="?duyet_ruttien=<?=$row['id'];?>" class="btn btn-success btn-sm">Duyệt</a>
                                        <a href="?xuly_ruttien=<?=$row['id'];?>" class="btn btn-warning btn-sm">Xử Lý</a>
                                        <?php } ?>
                                        <a href="?xoa_ruttien=<?=$row['id'];?>" class="btn btn-dark btn-sm">Xóa</a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
    </div>
</div>
</section>

<section class="col-lg-6 connectedSortable">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">DANH SÁCH CHUYỂN TIỀN</h3>
        </div>
    <div class="card-body table-responsive">
        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>USER CHUYỂN</th>
                                    <th>USER NHẬN</th>
                                    <th>MONEY</th>
                                    <th>NOTE</th>
                                    <th>TIME</th>
                                    <th>TYPE</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
$i = 1;
$account = $ManhDev->query("SELECT * FROM `transferMoney` ORDER BY `id` DESC ");
while ($row = mysqli_fetch_array($account)) { ?>
                                <tr>
                                    <td class="text-center"><?=$i++;?></td>
                                    <td><?=$row['username'];?></td>
                                    <td><?=$row['receiver'];?></td>
                                    <td class="text-center"><?=tien($row['money']);?>đ</td>
                                    <td><?=$row['note'];?></td>
                                    <td class="text-center"><?=$row['time'];?></td>
                                    <td>
                                        <a href="?xoa_chuyentien=<?=$row['id'];?>" class="btn btn-dark btn-sm">Xóa</a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
    </div>
</div>
</section>
</div>
<?php require('foot.php'); ?>