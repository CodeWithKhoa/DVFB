<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
$ALL = $_SERVER['REQUEST_URI'];
$type = explode("/", explode("service/", $ALL)[1])[0]; #dịch vụ
$code = explode("/buy", explode("/", $ALL)[3])[0];

if($code == "like-post") {
$title = "Tăng Like Bài Viết";
$note = "<p>Mua bằng link bài viết ở chế độ công khai, phải có nút like</p>";
} else if($code == "sub-follow") {
$title = "Tăng Theo Dõi Trang Cá Nhân";
$note = "<p>Tài khoản mua phải mở chế độ công khai, có nút theo dõi, không đè đơn, cố tình đè đơn sẽ không được hỗ trợ!</p>";
} else if($code == "like-page") {
$title = "Tăng Like/Follow Page";
$note = "<p>Mua bằng ID Page đã mở chế độ công khai, có nút like.</p>";
} else if($code == "comment") {
$title = "Tăng Bình Luận Bài Viết";
$note = "<p>Nhập Link bài viết công khai, có nút like commen!</p>";
} else if($code == "eye-live") {
$title = "Tăng Mắt Live Stream";
$note = "<p>Mua bằng ID bài viết ở chế độ công khai</p><p>Không hỗ trợ bài viết trong nhóm, không chạy livestream chia sẻ âm nhạc.</p>";
} else if($code == "view-video") {
$title = "Tăng Lượt Xem Video";
$note = "<p>Mua bằng link bài viết ở chế độ công khai</p><p>Chọn loại nào thì thời hạn video phải dài hơn thời chọn, vd: chọn 3s thì video phải dài tối tiểu 4s.</p>";
} else if($code == "share") {
$title = "Tăng Chia Sẻ Bài Viết";
$note = "<p>Mua bằng link bài viết ở chế độ công khai, phải có nút like.</p>";
} else if($code == "member-group") {
$title = "Tăng Thành Viên Nhóm (Group)";
$note = "<p>Mua bằng ID Group phải mở chế độ công khai, tắt phê đuyệt để member có thể tham gia được luôn</p>";
} else if($code == "view-story") {
$title = "Tăng Lượt Xem Tin";
$note = "<p>Mua bằng link story phải mở chế độ công khai</p>";
} else if($code == "vip-like") {
$title = "Vip Like Bài Viết Tháng";
$note = "<p>
 Mua bằng link bài viết ở chế độ công khai, phải có nút like</p>";
} else if($code == "like") {
$title = "Tăng Like Bài Viết";
} else if($code == "view") {
$title = "Tăng View";
} else {
include$_SERVER['DOCUMENT_ROOT'].'/public/client/pages/404.php';
die();
}
?>
<title><?=$title;?></title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<div class="row">
<div class="col-md-8">
<div class="card mb-3">
<div class="card-header">
<div class="row">
<div class="col-6">
<a href="" class="btn btn-primary btn-block"><img src="https://img.icons8.com/stickers/100/null/shopping-basket-success.png" alt="" width="25" height="25"> Đơn Hàng</a>
</div>
<div class="col-6">
<a href="/service/<?=$type;?>/<?=$code;?>/list" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/dusk/64/000000/list--v1.png" alt="" width="25" height="25">Danh Sách Đơn</a>
</div>
</div>
</div>
<div class="card-body">
<?php
if ($type == "facebook"){
?>
<!-- Đoạn mã HTML -->
<div class="form-group row mb-3">
    <label for="" class="form-label col-md-3">UID Hoặc Link Cần Mua</label>
    <div class="col-md-9">
        <input type="text" class="form-control" name="idpost" id="idpost" placeholder="Nhập UID Hoặc Link Cần Mua" onblur="getIDFromURL()">
    </div>
</div>

<!-- Đoạn mã JavaScript -->
<script>
function getIDFromURL() {
    // Lấy giá trị từ ô input có id="idpost"
    var url_or_uid = document.getElementById('idpost').value;
    
    // Kiểm tra nếu giá trị là URL
    if (isURL(url_or_uid)) {
        // Kiểm tra và thêm tự động "https://" vào đầu URL nếu chưa có
        if (!url_or_uid.startsWith('http://') && !url_or_uid.startsWith('https://')) {
            url_or_uid = 'https://' + url_or_uid;
        }

        // Gửi yêu cầu Ajax để lấy ID từ URL bằng PHP
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Gán giá trị ID vào ô input
                document.getElementById('idpost').value = this.responseText;
            }
        };
        xmlhttp.open("POST", "/uid.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("idpost=" + encodeURIComponent(url_or_uid));
    }
}

// Hàm kiểm tra xem chuỗi có phải là URL hay không
function isURL(str) {
     var pattern = new RegExp('^(https?:\\/\\/)', 'i');
    return pattern.test(str);
}
</script>
<?php } else { ?>
<!-- Đoạn mã HTML -->
<div class="form-group row mb-3">
    <label for="" class="form-label col-md-3">UID Hoặc Link Cần Mua</label>
    <div class="col-md-9">
        <input type="text" class="form-control" name="idpost" id="idpost" placeholder="Nhập UID Hoặc Link Cần Mua">
    </div>
</div>
<?php }?>

<div class="form-group row mb-3">
<label for="" class="form-label col-md-3">Máy Chủ</label>
<div class="col-md-9">
<div class="mb-2">
<?php
$i = 1;
$a = 1;
$server = $ManhDev->get_list("SELECT * FROM `server` WHERE `code_service` = '$code' AND `code_type` = '$type' ");
$getrate = $server;
foreach($server as $row_MDV) {
if($i++ == 1) { ?>
<div class="mb-1">
<div class="form-check">
<input class="form-check-input" id="m<?=$row_MDV['sever'];?>" type="radio" name="server_order" checked="" value="<?=$row_MDV['sever'];?>">
<label class="form-check-label " for="m<?=$row_MDV['sever'];?>">SV<?=$a++;?> (<?=$row_MDV['title'];?><?=$row_MDV['display'];?>) - <span class="badge badge-warning"><?=tien($row_MDV['money']);?> Coin</span> - <?=keytool($row_MDV['status']);?></label>
</div>
</div>
<?php } else { ?>
<div class="mb-1">
<div class="form-check">
<input class="form-check-input" id="m<?=$row_MDV['sever'];?>" type="radio" name="server_order" value="<?=$row_MDV['sever'];?>">
<label class="form-check-label " for="m<?=$row_MDV['sever'];?>">SV<?=$a++;?> (<?=$row_MDV['title'];?><?=$row_MDV['display'];?>) - <span class="badge badge-warning"><?=tien($row_MDV['money']);?> Coin</span> - <?=keytool($row_MDV['status']);?></label>
</div>
</div>
<?php } } ?>
</div>
</div>
</div>
<?php if($code == "like-post") { ?>
<div class="form-group row mb-3">
<label for="" class="form-label col-md-3">Cảm xúc</label>
<div class="col-md-9">
    <div class="">
        <div class="form-check form-check-inline">
            <label class="form-check-label " for="reaction0">
                <input class="form-check-input checkbox" type="radio" data-prices="101" id="reaction0" name="reaction" value="like" checked=""><img src="/image/like.png" alt="image" class="d-block ml-2 rounded-circle" width="35">
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label " for="reaction1">
                <input class="form-check-input checkbox" type="radio" data-prices="100" id="reaction1" name="reaction" value="love"><img src="/image/love.png" alt="image" class="d-block ml-2 rounded-circle" width="35">
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label " for="reaction2">
                <input class="form-check-input checkbox" type="radio" data-prices="100" id="reaction2" name="reaction" value="care"><img src="/image/care.png" alt="image" class="d-block ml-2 rounded-circle" width="35">
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label " for="reaction3">
                <input class="form-check-input checkbox" type="radio" data-prices="100" id="reaction3" name="reaction" value="haha"><img src="/image/haha.png" alt="image" class="d-block ml-2 rounded-circle" width="35">
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label " for="reaction4">
                <input class="form-check-input checkbox" type="radio" data-prices="100" id="reaction4" name="reaction" value="wow"><img src="/image/wow.png" alt="image" class="d-block ml-2 rounded-circle" width="35">
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label " for="reaction6">
                <input class="form-check-input checkbox" type="radio" data-prices="100" id="reaction6" name="reaction" value="sad"><img src="/image/sad.png" alt="image" class="d-block ml-2 rounded-circle" width="35">
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label " for="reaction7">
                <input class="form-check-input checkbox" type="radio" data-prices="100" id="reaction7" name="reaction" value="angry"><img src="/image/angry.png" alt="image" class="d-block ml-2 rounded-circle" width="35">
            </label>
        </div>
    </div>
</div>
</div>
<?php } ?>

<?php if($code == "vip-like") { ?>
<div class="form-group row mb-3">
<label for="" class="form-label col-md-3">Số Lượng</label>
<div class="col-md-9">
<select name="soluong" id="soluong" class="form-control">
    <option value="100" data-price="100">100 like</option>
    <option value="150" data-price="150">150 like</option>
    <option value="200" data-price="200">200 like</option>
    <option value="300" data-price="300">300 like</option>
    <option value="500" data-price="500">500 like</option>
    <option value="600" data-price="600">600 like</option>
    <option value="700" data-price="700">700 like</option>
    <option value="800" data-price="800">800 like</option>
    <option value="900" data-price="900">900 like</option>
    <option value="1000" data-price="1000">1000 like</option>
    <option value="1500" data-price="1500">1500 like</option>
    <option value="2000" data-price="2000">2000 like</option>
</select>
</div>
</div>
<?php } else { ?>
<div class="form-group row mb-3">
<label for="" class="form-label col-md-3">Số Lượng</label>
<div class="col-md-9">
<input type="number" class="form-control" name="soluong" id="soluong" onpaste="" placeholder="Nhập Số Tương Tác Cần Tăng">
</div>
</div>
<?php } ?>

<?php if($code == "comment") { ?>
<div class="form-group row mb-3">
<label for="" class="form-label col-md-3">Nội Dung Bình Luận </label>
<div class="col-md-9">
<textarea class="form-control mb-3" name="comment" id="comment" rows="4" placeholder="Nhập Bình Luận Cần Tăng"></textarea>
</div>
</div>
<?php } ?>

<?php if($code == "eye-live") { ?>
<div class="form-group row mb-3">
<label for="" class="form-label col-md-3">Số Phút</label>
<div class="col-md-9">
<input type="number" class="form-control" name="minutes" id="minutes" value="30" placeholder="Nhập Số Phút">
</div>
</div>
<?php } ?>

<?php if($code == "view-video") { ?>
<div class="form-group row mb-3">
<label for="" class="form-label col-md-3">Thời Gian</label>
<div class="col-md-9">
<select class="form-control" name="time" id="time">
    <option value="3"  data-price="3">Xem video trong 3 giây</option>
    <option value="10" data-price="10">Xem video trong 10 giây</option>
    <option value="15" data-price="15">Xem video trong 15 giây</option>
</select>
</div>
</div>
<?php } ?>

<?php if($code == "vip-like") { ?>
<div class="form-group row mb-3">
<label for="" class="form-label col-md-3">Thời Gian</label>
<div class="col-md-9">
<select name="days" class="form-control" id="days">
    <option value="30" data-price="30">30 ngày</option>
    <option value="60" data-price="60">60 ngày</option>
    <option value="90" data-price="90">90 ngày</option>
</select>
</div>
</div>
<?php } ?>

<div class="form-group row mb-3">
<label for="" class="form-label col-md-3">Ghi Chú </label>
<div class="col-md-9">
<textarea class="form-control mb-3" name="note" id="note" rows="4" placeholder="Nhập ghi chú nếu cần"></textarea>
<?php if($code == "like" or $code == "view") { } else { ?>
<div class="alert bg-danger text-white" role="alert">
<div class="card-body p-0">
<h4>Vui lòng đọc tránh mất tiền</h4>
<?=$note;?>
</div>
</div>
<?php } ?>
</div>
</div>

<div class="form-group row mb-2">
<div class="col-sm-12">
<div class="alert alert-success" role="alert">
<div class="card-body p-0">
<h4 class="font-bold text-center">Tổng thanh toán: <span class="bold green"><span id="total_payment" class="text-danger">0</span> coin</span></h4>
</div>
</div>
</div>
</div>
<button type="submit" class="btn btn-primary btn-block" id="mua_ngay"><img src="https://img.icons8.com/external-nawicon-flat-nawicon/64/000000/external-cart-black-friday-nawicon-flat-nawicon.png" height="30px"/> Thanh Toán</button>
</div>
</div>
</div>

<div class="col-md-4">
<div class="alert bg-danger text-white" role="alert">
    <h4 class="text-white">Lưu ý</h4>
    <ul>
        <li>
            <p>Nghiêm cấm buff các đơn có nội dung vi phạm pháp luật, chính trị, đồ trụy... Nếu cố tình buff bạn
                sẽ
                bị trừ hết tiền và ban khỏi hệ thống vĩnh viễn, và phải chịu hoàn toàn trách nhiệm trước pháp
                luật.</p>
        </li>
        <li>
            <p>Nếu đơn đang chạy trên hệ thống mà bạn vẫn mua ở các hệ thống bên khác, nếu có tình trạng hụt,
                thiếu
                số lượng giữa 2 bên thì sẽ không được xử lí.</p>
        </li>
        <li>
            <p>Đơn cài sai thông tin hoặc lỗi trong quá trình tăng hệ thống sẽ không hoàn lại tiền.</p>
        </li>
        <li>
            <p>Nếu gặp lỗi hãy nhắn tin hỗ trợ phía bên phải góc màn hình hoặc vào mục liên hệ hỗ trợ để được hỗ
                trợ
                tốt nhất</p>
        </li>
    </ul>
</div>
                    </div>
</div>
<script>
$(document).ready(function(){
		$('#mua_ngay').click(function() {
		$('#mua_ngay').html('Đang Xử Lý...').prop('disabled', true);
		var formData = {
		    'code'         : '<?=$code;?>',
		    'type'         : '<?=$type;?>',
		    'idpost'       : $("#idpost").val(),
		    'server_order' : $('input[name=server_order]:checked').val(),
		    'amount'       : $("#soluong").val(),
		    'note'         : $("#note").val(),
		    <?php if($code == "like-post") { ?>
		    'reaction'     : $('input[name=reaction]:checked').val(),
		    <?php } ?>
		    <?php if($code == "comment") { ?>
		    'comment'      : $("#comment").val(),
		    <?php } ?>
		    <?php if($code == "eye-live") { ?>
		    'minutes'      : $("#minutes").val(),
		    <?php } ?>
		    <?php if($code == "view-video") { ?>
		    'time'         : $("#time").val(),
		    <?php } ?>
		    <?php if($code == "vip-like") { ?>
		    'days'         : $("#days").val(),
		    <?php } ?>
		};
		$.post("/api/service/<?=$type;?>/<?=$code;?>/buy", formData,
			function (data) {
			    if(data.status == 'error') {
				Swal.fire('Thông Báo', data.msg, data.status);
				$('#mua_ngay').html('<img src="https://img.icons8.com/external-nawicon-flat-nawicon/64/000000/external-cart-black-friday-nawicon-flat-nawicon.png" height="30px"/> Thanh Toán').prop('disabled', false);
			    } else {
			   setTimeout(function(){ location.href = "" },2000); 
			    Swal.fire('Thông Báo', data.msg, data.status);
			     $('#mua_ngay').html('<img src="https://img.icons8.com/external-nawicon-flat-nawicon/64/000000/external-cart-black-friday-nawicon-flat-nawicon.png" height="30px"/> Thanh Toán').prop('disabled', false);
			    }
		}, "json");
	});
});
</script>
<script>
<?php if($code == "vip-like") { ?>
$('#soluong').on('change', function() {
        var server = $('input[name=server_order]:checked').val();
        var soluong = $('[name=soluong]').val();
        var days = $('[name=days]').val();
        
         <?php foreach($getrate as $runrate){?>
        if(server == '<?=$runrate['sever']?>') {
            total = $(this).children('option:selected').attr('data-price') * <?=$runrate['money']?>;
        }
        <?php } ?>
          var ketqua = total * days;
          $('#total_payment').html(ketqua.toString().replace(/(.)(?=(\d{3})+$)/g,'$1.'));
          
          });
<?php } else if($code == "view-video") { ?>
$('#soluong').on('change', function() {
        var server = $('input[name=server_order]:checked').val();
        var soluong = $('[name=soluong]').val();
        var time = $("#time").val();
        
         <?php foreach($getrate as $runrate){?>
        if(server == '<?=$runrate['sever']?>') {
            price = <?=$runrate['money']?>;
        }
        <?php } ?>
          var ketqua = soluong * price * time;
          $('#total_payment').html(ketqua.toString().replace(/(.)(?=(\d{3})+$)/g,'$1.'));
          
          });
<?php } else if($code == "eye-live") { ?>
$('#soluong').keyup(function() {
        var server = $('input[name=server_order]:checked').val();
        var soluong = $('[name=soluong]').val();
        var days = $("#minutes").val();
        <?php foreach($getrate as $runrate){?>
        if(server == '<?=$runrate['sever']?>'){
        var price = <?=$runrate['money']?>;
        }
        <?php } ?>
        var ketqua = price * soluong * days;
        $('#total_payment').html(ketqua.toString().replace(/(.)(?=(\d{3})+$)/g,'$1.'));
});
<?php } else { ?>
$('#soluong').keyup(function() {
        var server = $('input[name=server_order]:checked').val();
        var soluong = $('[name=soluong]').val();
        <?php foreach($getrate as $runrate){?>
        if(server == '<?=$runrate['sever']?>'){
        var price = <?=$runrate['money']?>;
        }
        <?php } ?>
        var ketqua = price * soluong;
        $('#total_payment').html(ketqua.toString().replace(/(.)(?=(\d{3})+$)/g,'$1.'));
});
<?php } ?>
</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>