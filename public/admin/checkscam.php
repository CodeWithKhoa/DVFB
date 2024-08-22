<?php
require('head.php'); 
require('nav.php'); 

if(isset($_GET['xoa'])) {
$id = $_GET['xoa'];

$ManhDev->xoa("checkscam_uytin", "`id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/checkscam";</script>';
}
?>
<section class="col-lg-12 connectedSortable">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">DANH SÁCH UY TÍN CHECKSCAM</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>Tên</th>
                                    <th>Avt</th>
                                    <th>Phone</th>
                                    <th>Website</th>
                                    <th>Bảo Hiểm</th>
                                    <th>Dịch Vụ</th>
                                    <th>Mô Tả</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
  <?php 
  $user = $ManhDev->query("SELECT * FROM `checkscam_uytin` ORDER BY `id` DESC ");
  while ($row1 = mysqli_fetch_array($user)) { ?>
                                <tr class="text-center">
                                    <td><?=$row1['name'];?></td>
                                    <td><img src="https://graph.facebook.com/<?=$row1['id_fb'];?>/picture?width=200&height=200&access_token=6628568379|c1e620fa708a1d5696fb991c1bde5662" height="45px" alt="ManhDev | Bậc Thầy Coder :))"></td>
                                    <td><?=$row1['phone'];?></td>
                                    <td><?=$row1['website'];?></td>
                                    <td><?=tien($row1['money']);?></td>
                                    <td><?=$row1['dich_vu'];?></td>
                                    <td><?=$row1['mo_ta'];?></td>
                                    <td>
                                        <a type="button" data-toggle="modal" data-target="#modal-edit" class="btn btn-info btn-sm">Sửa</a>
                                        <a href="?xoa=<?=$row1['id'];?>" class="btn btn-danger btn-sm">Xóa</a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                <a type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-primary">THÊM PROFILE</a>
              </div>
            </div>
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">THÊM THÔNG TIN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">HỌ TÊN</label>
                    <input type="text" class="form-control" id="name" placeholder="Tên Thành Viên" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID FB:</label>
                    <input type="number" class="form-control" id="id_fb" placeholder="ID Facebook" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">SỐ ĐIỆN THOẠI:</label>
                    <input type="text" class="form-control" id="phone" placeholder="Số Điện Thoại" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Website:</label>
                    <input type="text" class="form-control" id="website" placeholder="Tên Website Không https://" required="">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tiền Bảo Hiểm:</label>
                    <input type="number" class="form-control" id="money" placeholder="100000" required="">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Dịch Vụ:</label>
                    <input type="text" class="form-control" id="dich_vu" placeholder="Mmo, DVFB, Coder, Thiết Kế Website,..." required="">
                  </div> 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Thông Tin Bank:</label>
                    <textarea class="form-control textarea" id="mo_ta" rows="5" placeholder="Thông Tin Bank Profile"></textarea>
                  </div> 
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
              <button type="submit" id="submit" class="btn btn-primary">TẠO</button>
            </div>
            </form>
          </div>
        </div>
      </div>
<script type="text/javascript">
$(document).ready(function(){
		$('#submit').click(function() {
		$('#submit').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
            'name'      : $("#name").val(),
            'id_fb'     : $("#id_fb").val(),
            'phone'     : $("#phone").val(),
            'website'   : $("#website").val(),
            'money'     : $("#money").val(),
            'dich_vu'   : $("#dich_vu").val(),
            'mo_ta'     : $("#mo_ta").val()
		};
		$.post("/api/admin/checkscam", formData,
			function (data) {
			    if(data.status == 'error'){
				Swal.fire('Thông báo', data.msg, data.status);
				$('#submit').html('Xác Nhận').prop('disabled', false);
			    } else {
			     setTimeout(function(){ location.href = "" },2000);
			     Swal.fire('Thông báo', data.msg, data.status);
			     $('#submit').html('Xác Nhận').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
    </section>
<?php require('foot.php'); ?>