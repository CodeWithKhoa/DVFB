<?php
require('head.php'); 
require('nav.php'); 

if(isset($_GET['bannd'])) {
$bannd = $_GET['bannd'];
$ManhDev->update("users", [
            'bannd' => '1',
            ], " `username` = '$bannd' ");
echo '<script type="text/javascript">location.href = "/admin/member";</script>';
}

if(isset($_GET['unband'])) {
$unband = $_GET['unband'];

$ManhDev->update("users", [
            'bannd' => '0',
            ], " `username` = '$unband' ");
echo '<script type="text/javascript">location.href = "/admin/member";</script>';
}

?>
<section class="col-lg-12 connectedSortable">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">DANH SÁCH THÀNH VIÊN</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Username</th>
                                    <th>Tổng Nạp</th>
                                    <th>Money</th>
                                    <th>Đã Tiêu</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Last Time</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
  $i = 1;
  $user = $ManhDev->query("SELECT * FROM `users` ORDER BY `id` DESC ");
  while ($row1 = mysqli_fetch_array($user) ) 
  {?>
                                <tr class="text-center">
                                    <td><?=$i++;?></td>
                                    <td><?=$row1['username'];?></td>
                                    <td><?=tien($row1['tong_nap']);?></td>
                                    <td><?=tien($row1['money']);?></td>
                                    <td><?=tien($row1['tong_tru']);?></td>
                                    <td><?=$row1['email'];?></td>
                                    <td><?=$row1['phone'];?></td>
                                    <td><?=statru_user($row1['bannd']);?></td>
                                    <td><?=$row1['lastdate'];?></td>
                                    <td><?php if($row1['bannd'] == "0") { ?><a href="?bannd=<?=$row1['username'];?>" class="btn btn-danger btn-sm">Đình Chỉ</a><?php } else { ?><a href="?unband=<?=$row1['username'];?>" class="btn btn-success btn-sm">Mở Khóa</a><?php } ?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
<?php require('foot.php'); ?>