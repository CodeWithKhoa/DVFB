<?php
require('head.php'); 
require('nav.php'); 
?>

<?php 
$total_money = $ManhDev->get_row("SELECT SUM(`money`) FROM `users` WHERE `money` >= 0 ") ['SUM(`money`)'];

$total_nap = $ManhDev->get_row("SELECT SUM(`tong_nap`) FROM `users` WHERE `tong_nap` >= 0 ") ['SUM(`tong_nap`)'];

$total_tru = $ManhDev->get_row("SELECT SUM(`tong_tru`) FROM `users` WHERE `tong_tru` >= 0 ") ['SUM(`tong_tru`)'];

$total_thanhvien = $ManhDev->get_row("SELECT COUNT(*) FROM `users` ") ['COUNT(*)'];

$total_card = $ManhDev->get_row("SELECT COUNT(*) FROM `cards` ") ['COUNT(*)'];




$total_bank = 1 + 1 ;
?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng Số Dư</span>
                <span class="info-box-number">
                 <?=tien($total_money);?>
                  <small>coin</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng Đã Nạp</span>
                <span class="info-box-number"><?=tien($total_nap);?> <small>coin</small></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-money-bill-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng Đã Tiêu</span>
                <span class="info-box-number"><?=tien($total_tru);?><small> coin</small></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng Thành Viên</span>
                <span class="info-box-number"><?=tien($total_thanhvien);?><small> thành viên</small></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
    </div>
  </section>

<section class="col-lg-12 connectedSortable">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">NHẬT KÝ HOẠT ĐỘNG</h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table id="datatable1" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Username</th>
                                    <th>Content</th>
                                    <th>Ip</th>
                                    <th>User-Agent</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
  $i = 1;
  $A12A6 = $ManhDev->query("SELECT * FROM `log_site` ORDER BY `id` DESC LIMIT 10 ");
  while ($row1 = mysqli_fetch_array($A12A6) ) 
  {?>
                                <tr class="text-center">
                                    <td><?=$i++;?></td>
                                    <td><?=$row1['username'];?>
                                    </td>
                                    <td><?=$row1['note'];?></td>
                                    <td><?=$row1['ip'];?></td>
                                    <td><?=$row1['useragent'];?></td>
                                    <td><?=$row1['time'];?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
<?php require('foot.php'); ?>