<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
//echo "<script>location.href = '/auth/login'</script>";
}
?>

<title>Tải Tool Auto</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<style>
#status {
    position: absolute;
    left: 55%;
    top: 50%;
    transform: translate(-50%, -50%);
}

</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
<div class="col-6">
<a href="/service/tool" class="btn btn-primary btn-block"><img src="https://img.icons8.com/nolan/64/code-file.png" alt="" width="25" height="25"> Tải Tool </a>
</div>
<div class="col-6">
<a href="/service/settup" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/nolan/64/document.png" alt="" width="25" height="25"> Lệnh Settup </a>
</div>
</div>
<br>
  <div class="row">
    <div class="col-md-12">
      <div class="alert text-white bg-primary mb-3" role="alert">
        - Nếu bạn chạy Tool, có lỗi gì thì hãy báo Admin để được hỗ trợ.<br>
        - Bạn hãy vào<a href="https://zalo.me/g/zjuifu583" target="_blank" style="color: pink;"> box zalo này </a>để trao đổi kinh nghiệm.
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <div class="card">
        <div class="card-header">
          <h4>Tải Tool Mới nhất</h4>
        </div>
        <div class="row p-3">
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label" for="">Phiên Bản <p style="color:green;">5.0</p></label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label" for="">Được Cập Nhật Mới Nhất: <p style="color:red;">17/07/2023</p></label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label" for="">Tên File: <p style="color:red;">5.0.php</p></label>
            </div>
          </div>
          <div class="col-md-12 form-group text-center">
            <b id="status"></b>
            <b id="countdown" style="color:red;"></b>
          </div>
          <hr class="my-3" />
          <div class="col-md-12">
            <button type="button" class="btn btn-block btn-info" id="laytool" onclick="startDownload()"><img src="https://img.icons8.com/material-outlined/24/000000/download--v1.png" height="20px"/> Tải Ngay</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function startDownload() {
    var countdown = 30;
    var statusElement = document.getElementById('status');
    var countdownElement = document.getElementById('countdown');
    statusElement.innerText = 'Đang Tải Dữ Liệu...';
    countdownElement.innerText = countdown;
    document.getElementById('laytool').disabled = true;

    var countdownInterval = setInterval(function() {
      countdown--;
      countdownElement.innerText = countdown;
      if (countdown === 0) {
        clearInterval(countdownInterval);
        statusElement.innerText = '';
        countdownElement.innerText = '';
        document.getElementById('laytool').disabled = false;

        // Tạo phần tử <a> ẩn và kích hoạt sự kiện tải xuống
        var downloadLink = document.createElement('a');
        downloadLink.href = '/download.php'; // Đường dẫn đến file PHP trung gian
        downloadLink.style.display = 'none';
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
      }
    }, 1000);
  }
</script>




<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>
