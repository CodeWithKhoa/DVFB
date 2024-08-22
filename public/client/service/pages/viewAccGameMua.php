<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}

if(empty($_GET['id'])) {
die("Code Dịch Vụ Không Tồn Tại");
} else {
$id = $_GET['id'];
}
?>
<style>
    .flex-25{
        flex:25%;max-width:25%
    }
    
    .c-img{
        display:block;
        padding-top:57%;
        position:relative;
        overflow:hidden
    }
    
    .c-img>img,.c-img iframe,.c-img .bg{
        position:absolute;
        top:0;
        left:0;
        right:0;
        bottom:0;
        width:100%;
        height:100%;
        object-fit:cover
    }
    
    .item_acc .c-img .bg{
        opacity:0;
        overflow:hidden;
        top:100%
    }
    
    .h-100{
        height:100%
    }
    
    .w-100{
        width:100%
    }
    
    .h150px{
        height:150px!important
    }
    
    .marb10{
        margin-bottom:10px
    }
    
    .clwhite{
        color:#fff
    }
    
    .item_acc{
        border:2px solid red;
        }
    
    .item_acc .short_content{
        padding:5px;
        background:#000
    }
    
    .p10{
        padding:10px
    }
    
    .item_acc .price_acc{
        position:absolute;
        top:10px;
        right:10px;
        z-index:1
    }
    
    .clvang{
        color:#fde100
    }
    
    .item_acc .price_acc span{
        display:block;
        font-size:18px;
        color:#fde100
    }
    
    .swiper-slide iframe{
        width:100%!important;
        height:auto!important
    }
    
    a.float-btn{
        background:#000;
        min-width:100px;
        max-width:150px;
        padding:0 10px;
        height:35px;
        display:block;
        font-size:14px;
        line-height:34px;
        border-radius:10px;
        text-align:center;
        color:#fff;
        margin:0 0 2px 0
    }
    
    .float-menu{position:fixed;right:0;top:45%;z-index:999;transition:all ease .3s;-moz-transition:all ease .3s;-ms-transition:all ease .3s;-o-transition:all ease .3s;-webkit-transition:all ease .3s}.marb20{margin-bottom:20px}.item-cart{display:flex;justify-content:space-between;align-items:center;font-size:16px;margin-bottom:15px}.item-cart img{width:100px;max-height:100px}.item-cart .view-acc{color:#2626ef}.deleteToCart{font-size:13px;color:red}@media(max-width:991px){.flex-25{flex:33.333%;max-width:33.333%}.main_title{font-size:21px}}@media(max-width:767px){.flex-25{flex:50%;max-width:50%}}@media(max-width:450px){.flex-25{flex:100%;max-width:100%}}
    
    .ribbon{
        font-size:10px;
        font-weight:700;
        color:#fff;
        text-align:center;
        line-height:20px;
        transform:rotate(45deg);-webkit-transform:rotate(45deg);
        width:126px;
        display:block;
        background:#0099FF;
        box-shadow:0 3px 10px -5px #000;
        position:absolute;
        top:25px;
        right:-30px
    }
    
    .giam50 {
        text-align:center;
        display:block;
        position:absolute;
        top:1px;
        left:-10px
    }
    
    .sl-btnod, .sl-btnod:hover {
    color: #000
}

.sl-btnod {
    display: inline-block;
    width: 136px;
    height: 36px;
    line-height: 36px;
    text-align: center;
    font-size: 18px;
    border: none;
    outline: 0;
    background: url(/img/bgbtn.png) center no-repeat
}

.sa-lognav-tabs li a, .sl-btn, .sl-btnod, .sl-ftadds a, .sl-hdbot table tbody td:last-child, .sl-htit, .sl-lpvmos span, .sl-menu>li>a, .sl-prpri {
    font-weight: 700
}
</style>
<?php
$info_lichsu = $ManhDev->get_row("SELECT * FROM `history_accGame` WHERE `idGame` = '$id' AND `username` = '".$ManhDev->users('username')."' ");

$danhsach = $ManhDev->get_list("SELECT * FROM `listGame` WHERE `idGame` = '$id' AND `trading` = '".$info_lichsu['trading']."' ");
if($danhsach) {
foreach($danhsach as $row) { ?>
<title>Thông Tin Tài Khoản Đã Mua</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row mb-3">
<div class="col-sm-12 col-md-12 col-lg-12 mt-12 mt-md-3 p-0">
<div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <h4>Mã Số: <b class="text-danger"><?=$row['idGame'];?></b></h4>
                                </div>
                                
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <h4>Người Mua: <b class="text-info"><?=$info_lichsu['username'];?></b></h4>
                            </div>
                            
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                    <h4>Giá Tiền: <b class="text-warning"><?=tien($row['giagiam']);?></b><sup>Coin</sup></h4>
                            </div>
                            </div>
                        <div class="alert alert-info" role="alert">
                            <center><h5>Tài Khoản Đăng Nhập</h5></center>
                            <p><?php $data = explode(PHP_EOL, $info_lichsu['noteAcc']); 
                            for($f = 0;$f < count($data);$f++) {
                            echo $data[$f].'<br>';
                            } ?></p>
                        </div>
                        
                        <div class="alert alert-danger" role="alert">
                            <center><h5>Thông Tin Sản Phẩm</h5></center>
                            <p><?=$row['note'];?></p>
                        </div>
                        
                       <div class="row">
                           <?php $data2 = explode(PHP_EOL, $row['imgDemo']); 
                            for($m = 0;$m < count($data2);$m++) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                               <img src="<?=$data2[$m];?>" class="card-img-top img-fluid rounded" alt="ManhDev | Zalo: 0528139892">
                           </div>
                            <?php } ?>
                       </div>
                    </div>
                </div>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';
}
} else { ?>
<title>Dịch Vụ Không Tồn Tại</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php';?>
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 mt-12 mt-md-3 p-0">
<center><img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/bc70c43b-aeca-448a-a158-0f8e7c281a0d/dceqwb1-a75b8ac9-8340-45bb-8049-4883b81baa3c.gif?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2JjNzBjNDNiLWFlY2EtNDQ4YS1hMTU4LTBmOGU3YzI4MWEwZFwvZGNlcXdiMS1hNzViOGFjOS04MzQwLTQ1YmItODA0OS00ODgzYjgxYmFhM2MuZ2lmIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.Xmt2peugw4IY64xOXTkc3Q1IFo5T861ncwbHc1E4rhM" alt="" height="100px" class="pt-3"><p class="pt-3">Dữ Liệu Không Đúng Hoặc Tài Khoản Đã Được Bán</p></center>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';
}
?>