<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';?>
<title>Danh Sách API Website</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="card">
<div class="card-header"><center><h4>Danh Sách API Website</h4></center></div>
<div id="faqAccordion" class="container-fluid">
<div class="iq-accordion career-style faq-style">
<div class="card iq-accordion-block">
<div class="active-faq clearfix" id="headingOne">
<div class="container-fluid">
<label class="form-label" for="">Sever API:</label>
https://<?=$_SERVER['SERVER_NAME'];?>/api
<a role="contentinfo" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
<div class="alert bg-white alert-success" role="alert">
<div class="iq-alert-text"> <button class="btn btn-sm btn-success">POST</button> /info</div>
</div>
</a>
</div>
</div>
<div class="accordion-details collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#faqAccordion" style="">
<ul class="nav nav-tabs" id="myTab-1" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="home-tab" data-toggle="tab" href="#yeucau_profile" role="tab" aria-controls="home" aria-selected="true">Yêu Cầu Data</a>
</li>
<li class="nav-item">
<a class="nav-link" id="profile-tab" data-toggle="tab" href="#phanung_profile" role="tab" aria-controls="profile" aria-selected="false">Phản Ứng</a>
</li>
</ul>
<div class="tab-content" id="myTabContent-2">
<div class="tab-pane fade show active" id="yeucau_profile" role="tabpanel" aria-labelledby="home-tab">
<p><b>api</b> : <code>{Api Tài Khoản Của Bạn}</code></p>
</div>
<div class="tab-pane fade" id="phanung_profile" role="tabpanel" aria-labelledby="profile-tab">
<pre class="text-success">                        {
                           "status" : "success",
                           "msg" : "Lấy Thông Tin Thành Công",
                           "name" : Nguyễn Văn A,
                           "email/phone" : nguyenvana@gmail.com,
                           "username" : nguyenvana,
                           "money" : 50000,
                           "top_nap" : 99999,
                           "ip" : 2402:800:62cd:17de:dcec:f9d9:40e1:97da, 162.158.178.69,
                           "user_agent" : Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.88 Safari/537.36,
                           "time" : 22:10 03-05-2022,
                           "success" : "Get Info Success"
                        }
                    </pre>
</div>
</div>
</div>
</div>
<div class="card iq-accordion-block">
<div class="active-faq clearfix" id="headingOne">
<div class="container-fluid">
<a role="contentinfo" data-toggle="collapse" data-target="#muakey" aria-expanded="false" aria-controls="collapseOne">
<div class="alert bg-white alert-success" role="alert">
<div class="iq-alert-text"> <button class="btn btn-sm btn-success">POST</button> /mua-key</div>
</div>
</a>
</div>
</div>
<div class="accordion-details collapse" id="muakey" aria-labelledby="headingOne" data-parent="#faqAccordion" style="">
<ul class="nav nav-tabs" id="myTab-1" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="home-tab" data-toggle="tab" href="#yeucau_key" role="tab" aria-controls="home" aria-selected="true">Yêu Cầu Data</a>
</li>
<li class="nav-item">
<a class="nav-link" id="profile-tab" data-toggle="tab" href="#phanung_key" role="tab" aria-controls="profile" aria-selected="false">Phản Ứng</a>
</li>
</ul>
<div class="tab-content" id="myTabContent-2">
<div class="tab-pane fade show active" id="yeucau_key" role="tabpanel" aria-labelledby="home-tab">
<p><b>api</b> : <code>{Api Tài Khoản Của Bạn}</code><br>
<b>name</b> : <code>{Tên Người Mua}</code><br>
<b>amount</b> : <code>{Số Ngày Cần Mua}</code><br>
<b>key_code</b> : <code>{Key Cần Mua}</code></p>
</div>
<div class="tab-pane fade" id="phanung_key" role="tabpanel" aria-labelledby="profile-tab">
<pre class="text-success">                        {
                           "status" : "success",
                           "msg" : "Mua Key Tool 2 Ngày Thành Công",
                           "name" : Nguyễn Văn A,
                           "amount" : 2,
                           "key" : test,
                           "success" : "successful key tool purchase",
                           "start_int" : 1651590600,
                           "end_int"   : 1651590600,
                           "start" : 22:10 03-05-2022,
                           "end" : 22:10 03-05-2022                        }
                    </pre>
</div>
</div>
</div>
</div>
<div class="card iq-accordion-block">
<div class="active-faq clearfix" id="headingOne">
<div class="container-fluid">
<a role="contentinfo" data-toggle="collapse" data-target="#napthe" aria-expanded="false" aria-controls="collapseOne">
<div class="alert bg-white alert-success" role="alert">
<div class="iq-alert-text"> <button class="btn btn-sm btn-success">POST</button> /nap-the</div>
</div>
</a>
</div>
</div>
<div class="accordion-details collapse" id="napthe" aria-labelledby="headingOne" data-parent="#faqAccordion" style="">
<ul class="nav nav-tabs" id="myTab-1" role="tablist">
<li class="nav-item">
<a class="nav-link active" id="home-tab" data-toggle="tab" href="#yeucau_napthe" role="tab" aria-controls="home" aria-selected="true">Yêu Cầu Data</a>
</li>
<li class="nav-item">
<a class="nav-link" id="profile-tab" data-toggle="tab" href="#phanung_napthe" role="tab" aria-controls="profile" aria-selected="false">Phản Ứng</a>
</li>
</ul>
<div class="tab-content" id="myTabContent-2">
<div class="tab-pane fade show active" id="yeucau_napthe" role="tabpanel" aria-labelledby="home-tab">
<h5>POST GỬI LÊN:</h5>
<b>api</b> : <code>{Api Tài Khoản Của Bạn}</code><br>
<b>type</b> : <code>{Loại Thẻ VIETTEL, MOBIFONE, VINAPHONE}</code><br>
<b>menhgia</b> : <code>{Mệnh Giá Thẻ 10000, 20000, 30000}</code><br>
<b>seri</b> : <code>{Seri Thẻ Cào}</code><br>
<b>pin</b> : <code>{Mã Thẻ Cào}</code><br>
<b>code</b> : <code>{Số Request Nhận Dạng Thẻ}</code><br>
 <b>url</b> : <code>{Link Callback Web Bạn}</code><br><br>
<h5>CallBack Trả Về Dạng GET Kiểu:</h5><b>status</b> : <code>{Trạng Thái Thẻ hoantat, thatbai}</code><br><b>code</b> : <code>{Số Request Bạn Gửi Lên}</code>
</div>
<div class="tab-pane fade" id="phanung_napthe" role="tabpanel" aria-labelledby="profile-tab">
<pre class="text-success">                        {
                           "status" : "success",
                           "type" : VIETTEL,
                           "denominations" : 10.000,
                           "seri" : 100039420934234,
                           "pin" : 20324994324267,
                           "actually_received" : 7.000,
                           "msg" : "Nạp Thành Công! Chờ Hệ Thống Check Thẻ",
                           "success" : "Success! Card loaded successfully"
                        }
                    </pre>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>