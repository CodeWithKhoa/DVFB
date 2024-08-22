<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>Check Quỹ Bảo Hiểm CSC</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="card">
<div class="card-body">
<div id="uytin">
<div class="a">
<h1>QUỸ BẢO HIỂM CSC</h1>
<div class="ut2" style="margin-bottom: 40px">
<p style="text-align: center; font-size: 18px;display:block; margin:0 auto;margin-bottom: 20px;max-width: 99%;text-align:center"><?=$url_site_name;?> giới thiệu các dịch vụ mxh, và Profile chuẩn của các Admin<br> <b>Lưu ý:</b> Các Admin tạo Quỹ BH để đảm bảo uy tín với bạn rằng họ không bao giờ Scam. Trong bảng này có rất nhiều Admin. Hãy lựa chọn cho mình một Admin có dịch vụ và hỗ trợ tốt, phù hợp, thân thiện để giao dịch.</p>
</div>

<div class="ut" style="border: 1px solid #005fbf;border-radius: 10px;-moz-border-radius: 10px;-webkit-border-radius:10px;margin-top: 20px;">
<div>
<div class="b">
<?php
$i = 1;
$result = $ManhDev->query("SELECT * FROM `checkscam_uytin` ");
while($check = mysqli_fetch_assoc($result)) { ?>
<div class="it">
<a href="/profile/<?=$check['code'];?>" target="_blank"><img src="https://graph.facebook.com/<?=$check['id_fb'];?>/picture?width=200&amp;height=200&amp;access_token=6628568379|c1e620fa708a1d5696fb991c1bde5662" alt="<?=$check['name'];?>"></a>
<a href="/profile/<?=$check['code'];?>" target="_blank"><?=$i++;?>.<?=$check['name'];?></a>
</div>
<?php  } ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<style>
        #uytin{
            width: 950px;
            max-width: 100%;
            margin: 30px auto;
            margin-top: 0px;
            display: block;
            position: relative;
        }
        #uytin > .a > h1{
        display: block;
        text-align: center;
        font-size: 30px;
        font-family: auto;
        font-weight: 700;
        color: red;
        margin: 0  0 20px;
        padding-top: 0;
        }
       
          #uytin .ut{
            padding: 20px;
            -webkit-border-radius: 10px;

          }
        #uytin .ut > div{
            width: 100%;
            display: table;
        }
        #uytin .ut > div > span{
            display: inline-block;
            width: 290px;
            float: left;
            margin-bottom: 20px;
            font-weight: bold;
            position: relative;
            padding-left: 30px;
        }
        #uytin .b{
            width: calc(112% - 170px);
            float: left;
            display: inline-block;
        }
        #uytin .it{
            width: 72px;
            display: inline-block;
            float: left;
            margin-right: 20px;
            margin-bottom: 20px;
        }
         #uytin .it img{
            border-radius: 50%;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            width: 55px;
            display: block;
            margin: 0 auto;
        }
        #uytin .it:nth-child(9n+1){
            clear:both;
        }
         #uytin .it a:nth-child(2){
            display: block;
            color: #000;
            text-transform: capitalize;
            margin-top: 10px;
            text-align: center;
             font-size: 11px;
        }
        @media screen and (max-width: 1023px){
            #uytin .it:nth-child(9n+1){
                clear:unset;
            }
            #uytin .it:nth-child(6n+1){
                clear:both;
            }
        }
        @media screen and (max-width: 767px){
            #uytin .it:nth-child(6n+1){
                clear:unset;
            }
            #uytin .it:nth-child(4n+1){
                clear: both;
            }

            #uytin .it{
                margin-right: 0;
                width: calc(100% / 4);
                padding: 0 5px;
            }
        }
        @media screen and (max-width: 639px){
            #uytin .ut > div > span{
                width: 100%;
            }
            #uytin .b{
                width: 100%;
            }
            #uytin .b{
                margin-left: 0px;
                float: unset;
            }
            #uytin > .a > h1{
                font-size: 30px;
            }


        }
        @media screen and (max-width: 413px){
            #uytin > .a > h1{
                font-size: 30px;
            }
        }

    </style>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>