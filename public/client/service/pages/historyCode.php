<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Source Code Đã Mua</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-md-12">
<div class="row mb-3">
<div class="col-6">
<a href="/service/code/order" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/stickers/100/000000/code.png" alt="" width="25" height="25"> Mua Code</a>
</div>
<div class="col-6">
<a href="/service/code/list" class="btn btn-primary btn-block"><img src="https://img.icons8.com/nolan/64/online-shopping.png" alt="" width="25" height="25"> Code Đã Mua</a>
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
                                        <th class="text-center text-white">Tổng tiền</th>
                                        <th class="text-center text-white">Thời gian</th>
                                        <th class="text-center text-white">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all" class="">
                                    <?php
                                    $i = 1;
                                    $list_mua = $ManhDev->get_list("SELECT * FROM `history_Code` WHERE `username` = '$username' ORDER BY `id` DESC ");
                                    if($list_mua) {
                                    foreach($list_mua as $row) { ?>
                                    <tr>
                                        <td class="text-center"><?=$i?></td>
                                        <td class="text-center"><?=$row['trading'];?></td>
                                        <td class="text-center"><b><?=$row['title'];?></b></td>
                                        <td class="text-center"><b style="color:red;"><?=tien($row['money']);?></b></td>
                                        <td class="text-center"><i><?=$row['time'];?></i></td>
                                        <td class="text-center">
                                        <a href="<?=$row['link'];?>" class="btn btn-success btn-sm">Tải Code Về</a></td>
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
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>