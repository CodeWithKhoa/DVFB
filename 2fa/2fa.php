<?php
include $_SERVER['DOCUMENT_ROOT'].'/config/head.php'; 

if (empty($ManhDev->users('username'))) {
    echo "<script>location.href = '/'</script>";
}
?>

<title>Get Mã 2Fa</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="alert text-white bg-primary mb-3" role="alert">
                - Lưu ý: Nhập Không Để Khoảng Trống<br>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header"><h4>Get Mã 2Fa</h4></div>
                <div class="row p-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="">Mã 2Fa</label>
                            <input class="form-control" type="text" id="2fa" placeholder="Nhập 2Fa Của Bạn">
                        </div>
                    </div>
                    <div style="padding: 20px;">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-block btn-info" id="get2fa">
                                <img src="https://img.icons8.com/arcade/64/null/unlock-2.png" height="20px"/> 
                                Get Mã Ngay
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#get2fa").click(function() {
            var twofa = $("#2fa").val();
            $.ajax({
                type: 'POST',
                url: '/2fa/api.php',
                data: {
                    key: twofa
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    var key = data.key;
                    $("#2fa").val(key);
                    var tempInput = $("<input>");
                    $("body").append(tempInput);
                    tempInput.val(key).select();
                    document.execCommand("copy");
                    tempInput.remove();
                    $(".alert").html("Đã sao chép mã 2FA <strong>" + data.key + "</strong> vào clipboard.").removeClass("bg-primary").addClass("bg-success");
                },
                error: function() {
                    var tempInput = $("<input>");
                    tempInput.remove();
                    $(".alert").html("Lỗi khi lấy mã 2FA, vui lòng thử lại sau!").removeClass("bg-primary").addClass("bg-danger");
                }
            });
        });
    });
</script>

<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>
