<?php include $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
if (isset($_GET['code'])) {
$code = $_GET['code'];
}

$result = $ManhDev->query("SELECT * FROM `checkscam_uytin` WHERE `code` = '$code' ");
while($row = mysqli_fetch_assoc($result)) { ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
    <meta name="csrf-token" content="<?=random('qwertyuiopasdfghjklzxcvbnm1234567890', 20);?>">
    <meta name="description" content="Chúng Tôi Cam Kết Bảo Hiểm <?=tien($row['money']);?> VND Cho Mọi Giao Dịch Của Bạn Với &quot;<?=$row['name'];?>&quot;  Khi Tuân Theo Nội Quy Giao Dịch Của Website">
    <meta name="author" content="Mạnh Dev">
    <link id="favicon" rel="icon" type="image/png" sizes="16x16" href="https://graph.facebook.com/<?=$row['id_fb'];?>/picture?width=200&height=200&access_token=6628568379|c1e620fa708a1d5696fb991c1bde5662">
    <title>[ <?=$row['name'];?> ] Quỹ Bảo Hiểm Website</title>
    <meta property="og:rich_attachment" content="true">
    <meta property="og:type" content="website">
    <meta id="og-image" property="og:image" content="https://graph.facebook.com/<?=$row['id_fb'];?>/picture?width=200&height=200&access_token=6628568379|c1e620fa708a1d5696fb991c1bde5662">
    <meta property="og:image:width" content="720">
    <meta property="og:image:height" content="480">
    <meta id="og-title" property="og:title" content="[ <?=$row['name'];?> ] <?=$row['dich_vu'];?> Uy Tín Tại Website">
    <meta id="og-description" property="og:description" content="Chúng Tôi Cam Kết Bảo Hiểm <?=tien($row['money']);?> VND Cho Mọi Giao Dịch Của Bạn Với &quot;<?=$row['name'];?>&quot;  Khi Tuân Theo Nội Quy Giao Dịch Của Website">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="/assets/js/sweetalert.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet">
    <link href="/assets/css/style2.css" rel="stylesheet">
    <link href="/assets/css/custom-style.css?<?=time();?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
  <script src="/assets/js/function.js?v=<?=time();?>" aria-hidden="true"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.14/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.14/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
    <style>
        
        .manhdev-title {
            text-align:center;
            font-size:1.8em;
            font-weight:700;
            margin-bottom:10px
        }
        
        .avatar img {
            width:100px;
            height:100px;
            border-radius:50%;
            display:block;
        }
        
        .ct {
            text-align:center;
             margin-bottom:10px;
             font-weight:700;
        }
        
        .text {
            font-weight:700;
            margin-bottom:10px
        }
    </style>
    <script type="application/ld+json">
{ "@context": "https://schema.org",
 "@type": "TechArticle",
 "headline": "[ <?=$row['name'];?> ] Quỹ Bảo Hiểm Website",
 "dependencies": "[ <?=$row['name'];?> ] Quỹ Bảo Hiểm Website",
 "proficiencyLevel": "Expert",
 "alternativeHeadline": "[ <?=$row['name'];?> ] Quỹ Bảo Hiểm Website",
 "image": "https://graph.facebook.com/<?=$row['id_fb'];?>/picture?width=200&height=200&access_token=6628568379|c1e620fa708a1d5696fb991c1bde5662",
 "author": "ManhDev",
 "award": "Medal",
 "editor": "Mạnh Dev",
 "genre": "website",
 "keywords": "<?=$ManhDev->site('tukhoaWeb');?>",
 "wordcount": "<?=$row['id'];?>",
 "publisher": "member",
 "url": "<?=$base_url;?>",
 "datePublished": "<?=date('Y-m-d');?>",
 "description": "[ <?=$row['name'];?> ] Quỹ Bảo Hiểm Website",
 "articleBody": "Website chuẩn SEO"
 }
</script>
</head>

<body>
    <div id="">
        <div class="wrapper">
        <div class="container-fluid">
            <div class="pt-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="avatar">
                        <img src="https://graph.facebook.com/<?=$row['id_fb'];?>/picture?width=200&amp;height=200&amp;access_token=6628568379|c1e620fa708a1d5696fb991c1bde5662" alt="" >
                        </div>
                    </div>
                    <div class="manhdev-title pt-2"><?=$row['name'];?></div>
                    <div class="col-md-12 ct">
                        <a href="//m.me/<?=$row['id_fb'];?>" target="_blank">
                            <button class="btn btn-info">Check Mess</button>
                        </a>
                        <a href="tel:<?=$row['phone'];?>" target="_blank">
                            <button class="btn btn-info">Check Phone</button>
                        </a>
                    </div>
                    
                    <div class="row ">
                                <div class="col-md-6 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-9 pr-0">
                                                    <h6 class="text">Thông Tin Liên Hệ</h6>
                                                    <p>
                                                        <b><i class="fab fa-facebook-f"></i>
                                                    Facebook:
                                                    <a href="https://fb.com/<?=$row['id_fb'];?>" target="_blank">
                                                        <?=$row['id_fb'];?>
                                                    </a></b>
                                                <br>
                                                
                            <b><i class="fa fa-phone text-dam"></i> Zalo: <a href="https://zalo.me/<?=$row['phone'];?>" target="_blank"><?=$row['phone'];?></a></b>
                            <br>
                            <b><i class="fas fa-globe"></i> Website: <a href="https://<?=$row['website'];?>" target="_blank"><?=$row['website'];?></a></b>
                            </p>
                            </div>
                            <div class="col-3 pl-0 text-right">
                                <img src="https://admin.vn/assets/default/images/info.webp" alt="Mạnh Dev | Code Số 1 Việt Nam" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-9 pr-0">
                                                    <h6 class="text">Quỹ Bảo Hiểm Website</h6>
                                                    <p>Khách hàng sẽ được <b>Chúng tôi bảo hiểm an toàn giao dịch</b> với số
                                                    tiền trong quỹ bảo hiểm <strong class="text-danger"><?=tien($row['money']);?> VND</strong> của <strong><?=$row['name'];?></strong></p>
                            </div>
                            <div class="col-3 pl-0 text-right">
                                <img src="https://admin.vn/assets/default/images/shield.webp" alt="Mạnh Dev | Code Số 1 Việt Nam" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                                <h6 class="text">Thông Tin Ngân Hàng</h6>
                                                <manhdev class="text-danger">Vui lòng kiểm tra kỹ thông tin trước khi giao dịch tránh
                                        Fake:</manhdev>
                                        <ul class="pl-3 mb-0">
                                        <?=$row['mo_ta'];?>
                                    </ul>
                                    
                                    <div class="mb-3 ">
                                        <p><strong><span style="color:#e67e22">- Điều hành&nbsp;trang Data Center! Chúng tôi có quyền quyết định sử phạt tất cả các vi phạm về điều khoản.</span></strong>
                                        <br>
                                        <span style="color:#e67e22"><strong>- Có quyền trích quỹ hoàn trả toàn bộ số tiền quỹ bảo&nbsp;hiểm lại cho nạn nhận nếu giao dịch xảy ra sự cố không mong muốn.</strong></span></p>
                                    </div>
                                    
                                    <p><strong>Lưu Ý:</strong> Tránh trường hợp Nick Fake, Ảnh Fake, Link Fake, Rửa Tiền…. Người dùng hãy nhớ Chát đúng Facebook, Gọi đúng SĐT, Chuyển khoản đúng những STK có ở trong trong link bảo hiểm này Admin cam kết bạn sẽ an toàn trong mọi giao dịch..!!!</p>
                        </div>
                    </div>
                    <p class="pt-2">Mọi giao dịch của bạn với <b style="color:#ff225c">"<?=$row['name'];?>"</b> sẽ được <b>Chúng Tôi Bảo vệ</b> với số tiền nằm trong <strong style="color:#ff225c">Quỹ bảo hiểm <?=tien($row['money']);?> VND</strong> khi bạn tuân theo <a href="/">Điều Khoản Sử Dụng</a> của ADMINSTRATOR VIETNAM</p>
                </div>
                
                
                
                
                </div>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="/assets/js/jquery-3.2.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/sweetalert.min.js"></script>
</body>
</html>
<?php } ?>