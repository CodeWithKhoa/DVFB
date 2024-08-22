<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Dịch Vụ Tài Khoản Game</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
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
    
    .float-menu{
        position:fixed;
        right:0;
        top:45%;
        z-index:999;
        transition:all ease .3s;
        -moz-transition:all ease .3s;
        -ms-transition:all ease .3s;
        -o-transition:all ease .3s;
        -webkit-transition:all ease .3s
    }
    
    .marb20{
        margin-bottom:20px
    }
    
    .item-cart{
        display:flex;
        justify-content:space-between;
        align-items:center;
        font-size:16px;
        margin-bottom:15px
    }
    
    .item-cart img{
        width:100px;
        max-height:100px
    }
    
    .item-cart .view-acc{
        color:#2626ef
    }
    
    .deleteToCart{
        font-size:13px;
        color:red
    }
    
    @media(max-width:991px){
        .flex-25{
            flex:33.333%;
            max-width:33.333%
        }
        
        .main_title{
            font-size:21px
        }
    }

@media(max-width:767px){
    .flex-25{
        flex:50%;
        max-width:50%
    }
}

@media(max-width:450px){
    .flex-25{
        flex:100%;
        max-width:100%
    }
}
    
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

.viethoa {
    text-transform: uppercase;
}
</style>
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12 mt-12 mt-md-3 p-0">
<center><h3>DANH SÁCH TÀI KHOẢN ACC GAME</h3><div class="bg-warning" style="width: 150px; height: 10px;border:1px solid white;"></div><br></center>

<div class="row">
<?php
$danhsach = $ManhDev->get_list("SELECT * FROM `categoriesGame` ORDER BY `id` DESC");
foreach($danhsach as $row) { 
$conlai = $ManhDev->query("SELECT * FROM `listGame` WHERE `code_categories` = '".$row['code']."' AND `trading` is null AND `status` = 'dangban' ")->num_rows; 
?>
<div class="col-md-3 mb-3">
<div class="card item_acc">
<a href="/service/accGame/<?=$row['code'];?>/order" class="c-img">
<img class="lazy" src="<?=$row['img'];?>">
</a>
<?php  if($row['giamgia'] == "on") { ?>
<div class="giam50"><img src="https://shopaccnamlay.com/assets/images/etYKUTHw2M_1599067944.gif" height="60px"></div>
<?php } ?>
<div class="mt-">
<div class="description p-2">
<h4 class="text-center text-primary viethoa"><?=strtoupper($row['title']);?></h4>
<li>Số Tài Khoản: <b class="text-info"><?=tien($conlai);?></b></li>
</div>
<p class="text-center"><a href="/service/accGame/<?=$row['code'];?>/order" class="sl-btnod">Xem Tất Cả</a></p>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>