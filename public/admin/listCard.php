<?php
require('head.php'); 
require('nav.php'); 

if(isset($_GET['xoa'])) {
$id = $_GET['xoa'];

$ManhDev->xoa("cards", "`id` = '$id' ");
echo '<script type="text/javascript">location.href = "/admin/card";</script>';
}
?>
<section class="col-lg-12 connectedSortable">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">DANH SÁCH THẺ CÀO KHÁCH NẠP</h3>
                    <br>
            <small>Link Callback Gạch Thẻ Cào: <code><?=$base_url;?>auth/callbackCard</code></small>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Username</th>
                                    <th>Loại Thẻ</th>
                                    <th>Mệnh Giá</th>
                                    <th>Seri</th>
                                    <th>Pin</th>
                                    <th>Nhận Được</th>
                                    <th>Trạng Thái</th>
                                    <th>Ghi Chú</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
  $i = 1;
  $user = $ManhDev->query("SELECT * FROM `cards` ORDER BY `id` DESC ");
  while ($row1 = mysqli_fetch_array($user) ) 
  {?>
                                <tr class="text-center">
                                    <td><?=$i++;?></td>
                                    <td><?=$row1['username'];?></td>
                                    <td><?=$row1['loaithe'];?></td>
                                    <td><?=$row1['menhgia'];?></td>
                                    <td><?=$row1['seri'];?></td>
                                    <td><?=$row1['pin'];?></td>
                                    <td><?=$row1['thucnhan'];?></td>
                                    <td><?=napthe($row1['status']);?></td>
                                    <td><?=$row1['note'];?></td>
                                    <td><a href="?xoa=<?=$row1['id'];?>" class="btn btn-danger btn-sm">Xóa</a></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
<?php require('foot.php'); ?>