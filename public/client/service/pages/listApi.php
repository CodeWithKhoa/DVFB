<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Tích Hợp API Thẻ Cào</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-md-12">
<div class="card mb-4 card-tab">
<div class="card-header">
<div class="row">
<div class="col-4">
<a href="/service/card/order" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/color/48/000000/card-exchange--v1.png" alt="" width="25" height="25"> Đổi Thẻ Cào</a>
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
<div class="form-group">
<label class="form-label" for="">API Token Của Bạn</label>
<input class="form-control" type="text" value="<?=$ManhDev->users('apitoken');?>" readonly="">
</div>
<hr>
<div class="form-group mb-3">
<h5 class="text-danger">1. Gửi Thẻ Qua Api</h5>
<p>Sử dụng HTTP POST để đẩy thẻ qua API:</p>
<p><b>Url nhận:</b> https://{domain}/api/card<br><b>Method:</b> POST</p>
<li>Content-Type=application/json</li>
<li>Dữ liệu gửi dạng JSON gồm các trường như sau:</li>
</div>

<div class="table-responsive mb-3">
                           <div class="table-responsive" tabindex="1">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center text-white"><b>Tên trường</b></th>
                                        <th class="text-center text-white"><b>Kiểu dữ liệu</b></th>
                                        <th class="text-center text-white"><b>Bắt buộc</b></th>
                                        <th class="text-center text-white"><b>Mô tả</b></th>
                                    </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all" class="">
                                    <tr>
                                        <td class="text-center">ApiKey</td>
                                        <td class="text-center">String (100)</td>
                                        <td class="text-center"><b>X</b></td>
                                        <td>API Token duy nhất để xác định đối tác API</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center">Pin</td>
                                        <td class="text-center">String (30)</td>
                                        <td class="text-center"><b>X</b></td>
                                        <td>Mã code của thẻ cào</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center">Seri</td>
                                        <td class="text-center">String (50)</td>
                                        <td class="text-center"><b>X</b></td>
                                        <td>Mã seri của thẻ cào</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center">CardType</td>
                                        <td class="text-center">String</td>
                                        <td class="text-center"><b>X</b></td>
                                        <td>Nhận một trong các giá trị:
                                        <li>Viettel</li>
                                        <li>MobiFone</li>
                                        <li>VinaPhone</li>
                                        <li>Vietnamobile</li>
                                        <li>Zing</li>
                                        <li>Gate</li>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center">CardValue</td>
                                        <td class="text-center">Integer</td>
                                        <td class="text-center"><b>X</b></td>
                                        <td>Mệnh giá thẻ cào (ví dụ: 10000, 20000, 50000…)</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center">Requestid</td>
                                        <td class="text-center">String</td>
                                        <td class="text-center"></td>
                                        <td>Nội dung gửi lên</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center">UrlSite</td>
                                        <td class="text-center">String</td>
                                        <td class="text-center"><b>X</b></td>
                                        <td>Đường Dẫn Link Callback Web Của Bạn</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

<div class="form-group mb-3">
<li>Kết quả trả về JSON gồm các trường sau:</li>
</div>

<div class="table-responsive mb-3">
                           <div class="table-responsive" tabindex="1">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center text-white"><b>Tên trường</b></th>
                                        <th class="text-center text-white"><b>Kiểu dữ liệu</b></th>
                                        <th class="text-center text-white"><b>Mô tả</b></th>
                                    </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all" class="">
                                    <tr>
                                        <td class="text-center">Code</td>
                                        <td class="text-center">Integer</td>
                                        <td>Mã thông báo xác định trạng thái của việc chuyển dữ liệu có thành công hay không:
                                        <li class="text-success">1 - Thành công</li>
                                        <li class="text-danger">0 - Không thành công</li>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center">Message</td>
                                        <td class="text-center">String</td>
                                        <td>Mã seri của thẻ cào</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center">TaskId</td>
                                        <td class="text-center">Integer</td>
                                        <td>TaskId giao dịch để truy vấn trạng thái gạch thẻ sau này</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


<div class="form-group mb-3">
<h5 class="text-danger">2. Dữ Liệu Hệ Thống Trả Về Link Callback [<b class="text-primary">GET</b>]</h5>
<p>Url nhận kết quả xử lý phải đảm bảo:</p>
<li>Chấp nhận HTTP POST</li>
<li>Chấp nhận Content-type=application/json</li>
<li>Dữ liệu JSON trả về bao gồm các trường sau:</li>
</div>

<div class="table-responsive mb-3">
                           <div class="table-responsive" tabindex="1">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center text-white"><b>Tên trường</b></th>
                                        <th class="text-center text-white"><b>Kiểu dữ liệu</b></th>
                                        <th class="text-center text-white"><b>Mô tả</b></th>
                                    </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all" class="">
                                    <tr>
                                        <td class="text-center">TaskId</td>
                                        <td class="text-center">Integer</td>
                                        <td>TaskId của yêu cầu gạch thẻ (ở 1)</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center">Pin</td>
                                        <td class="text-center">String (30)</td>
                                        <td>Mã code của thẻ</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center">Seri</td>
                                        <td class="text-center">String (50)</td>
                                        <td>Mã seri của thẻ</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center">CardValue</td>
                                        <td class="text-center">Integer</td>
                                        <td>Mệnh giá thực của thẻ nạp nếu thành công<br>Giá trị bằng 0 nếu gạch thẻ thất bại</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center">Success</td>
                                        <td class="text-center">Boolean</td>
                                        <td><li class="text-success">true - Gạch thẻ thành công</li>
                                        <li class="text-danger">false - Gạch thẻ lỗi</li></td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center">Hash</td>
                                        <td class="text-center">String</td>
                                        <td>MD5(API Token+Pin+Seri)</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center">requestid</td>
                                        <td class="text-center">String</td>
                                        <td>Dữ liệu đẩy lên lúc đổi thẻ</td>
                                    </tr>
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