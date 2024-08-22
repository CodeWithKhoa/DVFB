<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Lịch Sử Mua Tài Khoản</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-6 mb-3">
<a href="/service/account/order" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/doodle/48/null/reminders.png" alt="" width="25" height="25"> Danh Sách</a>
</div>
<div class="col-6 mb-3">
<a href="/service/account/list" class="btn btn-primary btn-block"><img src="https://img.icons8.com/dusk/64/000000/list--v1.png" alt="" width="25" height="25">Lịch Sử Mua</a>
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
                                        <th class="text-center">#</th>
                                        <th class="text-center">Mã giao dịch</th>
                                        <th class="text-center">Sản phẩm</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Tổng tiền</th>
                                        <th class="text-center">Thời gian</th>
                                        <th class="text-center">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all" class="">
                                    <?php
                                    $i = 1;
                                    $list_mua = $ManhDev->get_list("SELECT * FROM `orders` WHERE `username` = '$username' ORDER BY `id` DESC ");
                                    if($list_mua) {
                                    foreach($list_mua as $row) { ?>
                                    <tr>
                                        <td class="text-center"><?=$i?></td>
                                        <td class="text-center"><?=$row['trading'];?></td>
                                        <td class="text-center"><b><?=$row['title'];?></b></td>
                                        <td class="text-center"><b style="color:blue;"><?=tien($row['amount']);?></b></td>
                                        <td class="text-center"><b style="color:red;"><?=tien($row['money']);?></b></td>
                                        <td class="text-center"><i><?=$row['time'];?></i></td>
                                        <td class="text-center"><a href="/service/account/view/<?=$row['trading'];?>"class="btn btn-primary btn-sm">Xem Thêm</a>
                                        <a href="/api/service/account/download/<?=$row['trading'];?>" class="btn btn-danger btn-sm">Tải Về</a></td>
                                    </tr>
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
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>