<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php'; 
?>

<title>Settup Tool</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
<div class="col-6">
<a href="/service/tool" class="btn btn-outline-primary btn-block"><img src="https://img.icons8.com/nolan/64/code-file.png" alt="" width="25" height="25"> Tải Tool </a>
</div>
<div class="col-6">
<a href="/service/settup" class="btn btn-primary btn-block"><img src="https://img.icons8.com/nolan/64/document.png" alt="" width="25" height="25"> Lệnh Settup </a>
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
              <label class="form-label" for="">Tải Termux Fix Lỗi: <a href="https://f-droid.org/repo/com.termux_117.apk" target="_blank" style="color: pink;"> Nhấp vào đây để tải </a></p></label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label" for="">Lưu Ý: <p style="color:red;">(Để bàn phím dạng English)</p></label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
               <label class="form-label" for="">Lệnh Settup: <br><a style="color:red;href="#" onclick="startDownload('settup'); return false;"">termux-setup-storage && apt update && apt upgrade && pkg install php && pkg install python && pkg install git && pkg install wget && pip install --upgrade pip && pip install requests && pip install pycurl && pip install colorama</a></label>
            </div>
          </div>
        <div class="col-md-12">
            <div class="form-group">
              <label class="form-label" for="">Lệnh vào tool: <br><a style="color:red;href="#" onclick="startDownload('vaotool'); return false;"">cd /sdcard/download && php 5.0.php</a></label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label" for="">Nếu không thành công hãy liên hệ<a href="https://zalo.me/0936763612" target="_blank" style="color:pink;" > Admin </a>để được hỗ trợ</label>
            </div>
          </div>
          <div class="col-md-12 form-group text-center">
            <b id="status"></b>
            <b id="countdown" style="color:red;"></b>
          </div>
      </div>
    </div>
  </div>
</div>
<script>
  function startDownload(loai) {
      if(loai=='settup'){
    // Nội dung bạn muốn sao chép
            var contentToCopy = "termux-setup-storage && apt update && apt upgrade && pkg install php && pkg install python && pkg install git && pkg install wget && pip install --upgrade pip && pip install requests && pip install pycurl && pip install colorama";
      } else {
            var contentToCopy = "cd /sdcard/download && php 5.0.php";
      }
    navigator.clipboard.writeText(contentToCopy)
      .then(function() {
        // Thành công
        Swal.fire({
          icon: 'success',
          title: 'Sao chép thành công!',
          text: 'Nội dung đã được sao chép vào clipboard.',
          timer: 3000, // Hiển thị thông báo trong 3 giây
          showConfirmButton: false
        });

        // Hiển thị nội dung thông báo
        Swal.fire({
          icon: 'success',
          title: 'Thông báo',
          html: '<p>Đã sao chép thành công</p>',
          confirmButtonText: 'OK'
        });
      })
      .catch(function() {
        // Lỗi
        Swal.fire({
          icon: 'error',
          title: 'Sao chép thất bại!',
          text: 'Đã xảy ra lỗi khi sao chép nội dung.',
          timer: 3000, // Hiển thị thông báo trong 3 giây
          showConfirmButton: false
        });
      });
  }
</script>

<?php include $_SERVER['DOCUMENT_ROOT'].'/config/foot.php';?>
