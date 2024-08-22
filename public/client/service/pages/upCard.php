<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Đổi Thẻ Cào</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-md-12">
<div class="card mb-4 card-tab">
<div class="card-header">
<div class="row">
<div class="col-4">
<a href="/service/card/order" class="btn btn-primary btn-block"><img src="https://img.icons8.com/color/48/000000/card-exchange--v1.png" alt="" width="25" height="25"> Đổi Thẻ Cào</a>
</div>
<div class="col-4">
<a href="/service/card/withdraw" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/external-sbts2018-blue-sbts2018/58/000000/external-withdraw-cryptopcurrency-sbts2018-blue-sbts2018.png" alt="" width="25" height="25"> Rút Tiền</a>
</div>
<div class="col-4">
<a href="/service/card/transfer" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/external-wanicon-lineal-color-wanicon/64/000000/external-transfer-currency-wanicon-lineal-color-wanicon.png" alt="" width="25" height="25"> Chuyển Tiền</a>
</div>
</div>
</div>
<div class="card-body">
<div class="mb-3">
<div class="alert text-white bg-secondary mb-3" role="alert">
- Bạn vui lòng nhập đúng chính xác thông tin thẻ cào để không bị nuốt thẻ.<br>
- Nếu sau 3 phút thẻ vẫn không thay đổi trạng thái thì bạn vui liên hệ Admin để được hỗ trợ.<br>
- Vui lòng nhập đúng mệnh giá để không bị nuốt thẻ.
</div>
</div>
<div id="divGachthecao">
    <div class="gachthe row" data-row="1">
        <div class="col-lg-3">
            <div class="form-group">
                <select id="loaithe" class="telco form-control" data-row="1"></select>
            </div>
        </div>
    
    <div class="col-lg-3">
        <div class="form-group">
            <select id="menhgia" class="charging-amount form-control" data-row="1">
                <option value="">Chọn mệnh giá</option>
            </select>
        </div>
    </div>
    
    <div class="col-lg-3">
        <div class="form-group">
            <input id="seri" class="serial form-control" type="text" data-row="1" placeholder="Serial">
        </div>
    </div>
    
    <div class="col-lg-3">
         <div class="form-group">
             <input id="pin" class="pin form-control" type="text" data-row="1" placeholder="Mã thẻ">
        </div>
    </div>
</div>
</div>

<div class="row">
<div class="col-6 mb-3">
<div class="form-group">
<label class="form-label"></label>
<button id="btnAddChild" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> THÊM NGAY</button>
</div>
</div>

<div class="col-6 mb-3">
<div class="form-group">
<label class="form-label"></label>
<button onClick="window.location.reload();" style="float:right" class="btn btn-danger btn-sm"><i class="fas fa-time"></i> XÓA TẤT CẢ</button>
</div>
</div>
<input type="hidden" id="token" value="<?=$ManhDev->users('apitoken');?>">
<div class="col-md-12 mb-3">
<button type="button" class="btn btn-block btn-info" id="napthe"><img src="https://img.icons8.com/color/48/000000/soccer-yellow-card.png" height="20px"/> Gửi Thẻ Cào</button>
</div>


</div>
</div>
</div>
</div>
</div>
<div class="row pt-2">
<div class="col-md-12">
<div class="card mb-4">
<div class="card-body">
<h5 class="card-title mb-4">Danh Sách Thẻ Cào</h5>
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
<thead>
<tr>
                                <th class="table-plus datatable-nosort">#</th>
                                <th>SERI</th>
                                <th>PIN</th>
                                <th>LOẠI THẺ</th>
                                <th>MỆNH GIÁ</th>
                                <th>THỰC NHẬN</th>
                                <th>TRẠNG THÁI</th>
                                <th>GHI CHÚ</th>
                                <th>THỜI GIAN</th>
                            </tr>
</thead>
<tbody role="alert" aria-live="polite" aria-relevant="all" class="">
<?php
$i = 1;
$list_ls = $ManhDev->get_list("SELECT * FROM `cards` WHERE `username` = '$username' ORDER BY `id` DESC ");
if($list_ls) {
foreach($list_ls as $row) { ?>
<tr>
                                <td><?=$i++;?></td>
                                <td><?=$row['seri'];?></td>
                                <td><?=$row['pin'];?></td>
                                <td><span class="badge badge-success"><?=$row['loaithe'];?></span></td>
                                <td><?=tien($row['menhgia']);?></td>
                                <td><?=tien($row['thucnhan']);?></td>
                                <td><?=napthe($row['status']);?></td>
                                <td><?=$row['note'];?></td>
                                <td><span class="badge badge-dark"><?=$row['time'];?></span></td>
                            </tr>
<?php } } ?>
</tbody>
</table>
</div>
</div>
</div> </div>
</div>
</div>

<script type="text/javascript">
                        $(document).ready(function() {
                            setTimeout(e => {
                                GetCard()
                            }, 0)
                        });
                        $('#btnAddChild').click(function() {
                            getchildordercardbuy();
                        });

                        function getchildordercardbuy() {
                            var totalRow = $('#divGachthecao .gachthe').length;
                            if (totalRow > 10) {
                                Swal.fire("Thông Báo", "Chỉ Cho Phép Gửi Tối Đa 10 Thẻ 1 Lần", "error");
                            } else {
                                $.ajax({
                                    url: "/api/ajaxs/divGachthe",
                                    method: "GET",
                                    success: function(response) {
                                        $('#divGachthecao').append(response);
                                    }
                                });
                            }
                        }

                        $(document).on('change', '.telco', function() {
                            var dataRow = $(this).data('row');
                            $('.charging-amount[data-row="' + dataRow + '"]').empty();
                            $.ajax({
                                url: "/api/menhgia",
                                method: "GET",
                                data: {
                                    loaithe: $(this).val(),
                                    type: $(this).find(':selected').data('type')
                                },
                                success: function(response) {
                                    $('.charging-amount[data-row="' + dataRow + '"]').html(
                                        response);
                                }
                            });
                        });
                        
                        $("#napthe").click(function() {
                            proccessListOrderCardBuy();
                        });
                        
                        function proccessListOrderCardBuy() {
                            var lstDataSubmit = [];
                            var i = 1;
                            $('#divGachthecao .gachthe').each(function() {
                                var dataRow = $(this).data('row');
                               var dataOne = {
                                    loaithe: $('select.telco[data-row="' + dataRow + '"] :selected').val(),
                                    menhgia: $('select.charging-amount[data-row="' + dataRow +
                                            '"] :selected').val() != undefined ?
                                        $('select.charging-amount[data-row="' + dataRow + '"] :selected')
                                        .val() : '',
                                    type: $('select.telco[data-row="' + dataRow + '"] :selected').data(
                                        'type'),
                                    pin: $('input.pin[data-row="' + dataRow + '"]').val(),
                                    serial: $('input.serial[data-row="' + dataRow + '"]').val(),
                                };
                                lstDataSubmit.push(dataOne);
                            });
                            if (lstDataSubmit.length > 0) {
                                $.ajax({
                                    url: "/auth/NapThe",
                                    type: 'POST',
                                    data: {
                                        data: lstDataSubmit,
                                        token: $("#token").val()
                                    },
                                    beforeSend: function() {
                                        $('#napthe').html('Đang Xử Lý...').prop('disabled', true);
                                    },
                                    success: function (res) {
                                        //setTimeout(function(){ location.href = "" },5000);
                                        $("#thongbaocard").html(res);
                                           $('#napthe').html('Gửi Thẻ Cào').prop('disabled', false);
                                    }
                                    
                                    
                                });
                            }
                        }

                        function GetCard() {
                            $.ajax({
                                url: "/api/loaithe",
                                method: "GET",
                                success: function(response) {
                                    $("#loaithe").html(response);
                                }
                            });
                        }
                        </script>
                        <div id="thongbaocard"></div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>