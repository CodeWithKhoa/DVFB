<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Danh Sách Website Đã Tạo</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-md-12">
<div class="row mb-3">
<div class="col-6">
<a href="/service/createWeb/view" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/external-sbts2018-outline-color-sbts2018/58/000000/external-website-seo-4.-2-sbts2018-outline-color-sbts2018-3.png" alt="" width="25" height="25"> Danh Sách</a>
</div>
<div class="col-6">
<a href="/service/createWeb/list" class="btn btn-primary btn-block"><img src="https://img.icons8.com/external-xnimrodx-blue-xnimrodx/64/000000/external-website-cyber-monday-xnimrodx-blue-xnimrodx-2.png" alt="" width="25" height="25"> Website Đã Tạo</a>
</div>
</div>
<div class="card">
<div class="card-body">
<div class="table-responsive">
                           <div class="table-responsive" tabindex="1">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center text-white">#</th>
                                        <th class="text-center text-white">Mã giao dịch</th>
                                        <th class="text-center text-white">Sản phẩm</th>
                                        <th class="text-center text-white">Tên Miền</th>
                                        <th class="text-center text-white">Thời Hạn</th>
                                        <th class="text-center text-white">Tổng tiền</th>
                                        <th class="text-center text-white">Thời gian mua</th>
                                        <th class="text-center text-white">Ngày hết hạn</th>
                                        <th class="text-center text-white">Tình Trạng</th>
                                        <th class="text-center text-white">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all" class="">
                                    <?php
                                    $i = 1;
                                    $list_mua = $ManhDev->get_list("SELECT * FROM `history_createWeb` WHERE `username` = '".$ManhDev->users('username')."' ORDER BY `id` DESC ");
                                    if($list_mua) {
                                    foreach($list_mua as $row) {
                                    $time12   = date('d-m-Y');
                                    $hienntai = strtotime($time12);
                                    $ketthuc1 = $row["end"];
                                    
                                    if($ketthuc1 <= $hienntai) {
                                        $ManhDev->update("history_createWeb", [
                                            'status' => "hethan",
                                            'note_giahan' => 'Website đã hết hạn - Chờ '.$ManhDev->users('username').' gia hạn! Đã gửi mail thông báo gia hạn'
                                        ], " `id` = '".$row['id']."' ");
                                        $thongbao = 'Bạn có 1 webiste cần gia hạn - hãy truy cập '.$url_site_name.' để gia hạn và tiếp tục sử dụng';
                                        guimail($ManhDev->users('email'), $thongbao);
                                    }
                                    ?>
                                    <tr>
                                        <td class="text-center"><?=$i++?></td>
                                        <td class="text-center"><?=$row['trading'];?></td>
                                        <td class="text-center"><b><?=$row['title'];?></b></td>
                                        <td class="text-center"><b><?=$row['domain'];?></b></td>
                                        <td class="text-center"><b><?=$row['timemua'];?> Tháng</b></td>
                                        <td class="text-center"><b style="color:red;"><?=tien($row['money']);?></b> Coin</td>
                                        <td class="text-center"><i><?=$row['time'];?></i></td>
                                        <td class="text-center"><i><?=date('d-m-Y', $row['end']);?></i></td>
                                        <td class="text-center"><?=taoweb($row['status']);?></td>
                                        <td class="text-center">
                                            <?php if($row['status'] == "hethan") { ?>
                                        <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-<?=$row['id'];?>">Gia Hạn</a>
                                        <?php } ?>
                                        </td>
                                    </tr>
<div class="modal fade" id="edit-<?=$row['id'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">GIA HẠN WEBSITE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
<div class="modal-body">
<p class='text-danger'>Gia Hạn Mỗi Tháng Sẽ Là 30k/1 Tháng, Bạn Có Thể Gia Hạn Nhiều Tháng Và Số Tiền Sẽ Nhân Lên</p>
<div class="form-group">
    <label>Thời Hạn:</label>
    <select class="form-control" id="timemua_<?=$row['id'];?>">
        <option value="1">1 Tháng</option>
		<option value="2">2 Tháng</option>
		<option value="3">3 Tháng</option>
		<option value="4">4 Tháng</option>
		<option value="5">5 Tháng</option>
		<option value="6">6 Tháng</option>
		<option value="7">7 Tháng</option>
		<option value="8">8 Tháng</option>
		<option value="9">9 Tháng</option>
		<option value="10">10 Tháng</option>
		<option value="11">11 Tháng</option>
		<option value="12">12 Tháng</option>
	</select>
</div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                <button type="submit" id="giahanweb_<?=$row['id'];?>" class="btn btn-primary">GIA HẠN</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
		$('#giahanweb_<?=$row['id'];?>').click(function() {
		$('#giahanweb_<?=$row['id'];?>').html('ĐANG XỬ LÝ...').prop('disabled', true);
		var formData = {
		    'id'            : '<?=$row['id'];?>',
            'timemua'           : $("#timemua_<?=$row['id'];?>").val(),
		};
		$.post("/api/service/extendWeb", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông báo', data.msg, data.status);
				$('#giahanweb_<?=$row['id'];?>').html('GIA HẠN').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000);
			     Swal.fire('Thông báo', data.msg, data.status);
			     $('#giahanweb_<?=$row['id'];?>').html('GIA HẠN').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
                                    <?php } } else { ?>
                                    <tr class="odd">
                                        <td valign="top" colspan="100%"><center><img src="https://img.icons8.com/offices/64/000000/no-sugar2.png" alt="" class="pt-3"><p class="pt-3">Không có dữ liệu để hiển thị</p></center></td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>