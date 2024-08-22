<?php include $_SERVER['DOCUMENT_ROOT'].'/config/head.php';
if(empty($ManhDev->users('username'))) {
echo "<script>location.href = '/auth/login'</script>";
}
?>
<title>AUTO TOOL TDS & TTC</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/config/nav.php'; ?>
<?php if(dec($_COOKIE['type'],$_SESSION['key'],'trandangkhoa2006')!='traodoisub' && dec($_COOKIE['type'],$_SESSION['key'],'trandangkhoa2006')!='tuongtaccheo'){?>
<div class="row">
    <div class="card">
        <div class="card-body">
            <center><h4>Chào mừng bạn đến với hệ thống auto của chúng tôi</h4></center>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <center>
            <h5>Bạn vui lòng chọn loại tool</h5>
            <input type="radio" id="tds" name="tool_type" value="tds">
            <label for="tds">Trao Đổi Sub</label><br>
            <input type="radio" id="ttc" name="tool_type" value="ttc">
            <label for="ttc">Tương Tác Chéo</label>
        </center>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var tdsRadio = document.getElementById("tds");
    var ttcRadio = document.getElementById("ttc");

    tdsRadio.addEventListener("change", function() {
        if (tdsRadio.checked) {
            sendData("api", "tool_type=tds");
        }
    });

    ttcRadio.addEventListener("change", function() {
        if (ttcRadio.checked) {
            sendData("api", "tool_type=ttc");
        }
    });

    function sendData(url, data) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    location.reload();
                } else {
                    console.error("Lỗi khi gửi yêu cầu");
                }
            }
        };
        xhr.send(data);
    }
});
</script>

<?php } else if(dec($_COOKIE['type'],$_SESSION['key'],'trandangkhoa2006')=='tuongtaccheo') {?>
<?php if(!isset($_SESSION['cookiettc'])){?>
<div class="row">
<div class="d-flex justify-content-between">
<div class="col-md-4">
<h3>Tool Tương Tác Chéo</h3>
</div><button class='btn ripple btn-min w-sm btn-outline-primary me-2 my-auto' id="stopButton">Dừng lại.</button>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var stopButton = document.getElementById("stopButton");

    stopButton.addEventListener("click", function() {
        localStorage.removeItem('tableData');
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "api", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if(xhr.status !== 200){
                    Swal.fire({
                        title: 'Thất Bại',
                        text: "Lỗi Hệ Thống",
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        title: 'Thành Công',
                        text: "Đã Dừng Thành Công",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            }
        };
        xhr.send("stop=true");
    });
});
</script>
</div>
<div class="card">
    <div class="card-body">
        <label class="form-label" for="tokentds">Nhập Token TTC:</label>
        <div class="input-group mb-3">
            <input type="text" id="tokenttc" class="form-control" placeholder="Nhập Token">
        </div>
        <button id="submitToken" class="btn btn-primary">Gửi</button>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var submitButton = document.getElementById("submitToken");
    var tokenInput = document.getElementById("tokenttc");

submitButton.addEventListener("click", function() {
    var tokenValue = tokenInput.value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "api", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var responseData = xhr.responseText;
                console.log("Dữ liệu đã được gửi lên máy chủ thành công.");
                console.log("Dữ liệu phản hồi từ máy chủ: " + responseData);
                    location.reload();
            } else {
                console.error("Lỗi khi gửi yêu cầu");
            }
        }
    };
    var formData = "tokenttc=" + encodeURIComponent(tokenValue);
    xhr.send(formData);
});

});
</script>
<?php } else if(!$_SESSION["list_job"]){?>
<div class="row">
<div class="d-flex justify-content-between">
<div class="col-md-4">
<h3>Tool Tương Tác Chéo</h3>
</div><button class='btn ripple btn-min w-sm btn-outline-primary me-2 my-auto' id="stopButton">Dừng lại.</button>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var stopButton = document.getElementById("stopButton");

    stopButton.addEventListener("click", function() {
        localStorage.removeItem('tableData');
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "api", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if(xhr.status !== 200){
                    Swal.fire({
                        title: 'Thất Bại',
                        text: "Lỗi Hệ Thống",
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        title: 'Thành Công',
                        text: "Đã Dừng Thành Công",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            }
        };
        xhr.send("stop=true");
    });
});
</script>
</div>
<div class="card">
    <div class="card-body">
        <label class="form-label" for="cookiefb">Nhập Cookie Fb:</label>
        <div class="input-group mb-3">
            <input type="text" id="cookiefb" class="form-control" placeholder="Nhập Cookie">
        </div>
        <label class="form-label" for="loaijob">Chọn loại Job: </label><br>
        <input type="checkbox" id="Like" value="like">
        <label for="like">Like</label><br>
        <input type="checkbox" id="camxuc" value="camxuc">
        <label for="cx">Cảm Xúc</label><br>
        <input type="checkbox" id="follow" value="Follow">
        <label for="fl">Follow</label><br>
        <input type="checkbox" id="comment" value="comment">
        <label for="cmt">Comment</label><br>
        <input type="checkbox" id="share" value="share">
        <label for="share">Share</label><br>
        <input type="checkbox" id="cxcmt" value="cxcmt">
        <label for="cxcmt">Cảm Xúc Comment</label><br>
        <input type="checkbox" id="likepage" value="likepage">
        <label for="likepage">Like Page</label><br>
        <input type="checkbox" id="joingr" value="joingr">
        <label for="joingr">Tham gia nhóm</label><br>
        <label class="form-label" for="delay">Nhập Delay:</label>
        <div class="input-group mb-3">
            <input type="text" id="delay" class="form-control" placeholder="Nhập Delay">
        </div>
        <button id="submit" class="btn btn-primary">Gửi</button>
    </div>
</div>

<script>
document.getElementById("submit").addEventListener("click", function() {
    var cookiefb = document.getElementById("cookiefb").value;
    var like = document.getElementById("Like").checked;
    var camxuc = document.getElementById("camxuc").checked;
    var follow = document.getElementById("follow").checked;
    var comment = document.getElementById("comment").checked;
    var share = document.getElementById("share").checked;
    var cxcmt = document.getElementById("cxcmt").checked;
    var likepage = document.getElementById("likepage").checked;
    var joingr = document.getElementById("joingr").checked;
    var delay = document.getElementById("delay").value;

    var data = {
        type: "runttc",
        cookiefb: cookiefb,
        like: like,
        camxuc: camxuc,
        follow: follow,
        comment: comment,
        share: share,
        cxcmt: cxcmt,
        likepage: likepage,
        joingr: joingr,
        delay: delay
    };

    fetch('/sevice/api', {
       method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
    body: new URLSearchParams(data)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Không kết nối được với mạng');
        }
        return response.text();
    })
    .then(text => {
        if (text) {
            try {
                const jsonData = JSON.parse(text);
                if(jsonData.status==="error"){
                    Swal.fire({
                        title: 'Thất Bại',
                        text: jsonData.msg,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        title: 'Thành Công',
                        text: jsonData.msg,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }, 2000);
                    location.reload();
                }
            } catch (error) {
                console.error('Lỗi khi phân tích JSON:', error);
            }
        } else {
            console.log('API trả về dữ liệu trống');
        }
    })
    .catch(error => {
        console.error('Có lỗi khi gửi dữ liệu đến API:', error);
    });
});
</script>

<?php } else {?>
<div class="row">
<div class="d-flex justify-content-between">
<div class="col-md-4">
<h3>Tool Trao Đổi Sub</h3>
</div>
</div>
<div class="row">
<div class="d-flex justify-content-between">
<div class="col-md-4"  bis_skin_checked="1">
<div class="card">
<div class="card-body">
    <div class="d-flex justify-content-between">
        <div  bis_skin_checked="1" >
            <h6 class="font-size-15">Cấu Hình</h6>
            <h5 class="font-size-10">Tài Khoản: <?php echo $_SESSION['userttc']?></h5>
            <h5 class="font-size-10">Xu: <?php echo $_SESSION['xuttc']?></h5>
        </div>
    </div>
</div>
</div>
</div>
<div class="col-md-4"  bis_skin_checked="1">
<div class="card">
<div class="card-body">
    <div class="d-flex justify-content-between">
        <div  bis_skin_checked="1" >
            <h6 class="font-size-15">Facebook</h6>
            <h5 class="font-size-10">Name: <?php echo $_SESSION['name']?></h5>
            <h5 class="font-size-10">ID: <?php echo $_SESSION['id']?></h5>
            <h5 class="font-size-10">Loại Tài Khoản: <?php echo $_SESSION['loaitk']?></h5>
        </div>
    </div>
</div>
</div>
</div>

<button class='btn ripple btn-min w-sm btn-outline-primary me-2 my-auto' id="stopButton">Dừng lại.</button>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var stopButton = document.getElementById("stopButton");

    stopButton.addEventListener("click", function() {
        localStorage.removeItem('tableData');
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "api", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if(xhr.status !== 200){
                    Swal.fire({
                        title: 'Thất Bại',
                        text: "Lỗi Hệ Thống",
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        title: 'Thành Công',
                        text: "Đã Dừng Thành Công",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            }
        };
        xhr.send("stop=true");
    });
});
</script>
</div>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive" bis_skin_checked="1">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">#</th>
                        <th>ID</th>
                        <th>TYPE</th>
                        <th>TRẠNG THÁI</th>
                        <th>XU NHẬN</th>
                        <th>XU</th>
                        <th>NOTE</th>
                        <th>THỜI GIAN</th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all" class="" id="tableBody">
                </tbody>
            </table>
        </div>
        <div id="delayDisplay"></div> <!-- Thẻ để hiển thị thời gian trễ -->
    </div>
</div>

<script>
function fetchDataAndDisplay() {
    var data = {
        type: "workttc",
    };

    fetch('/sevice/api', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams(data)
    })
    .then(response => response.json())
    .then(jsonData => {
        if(jsonData.error){
            Swal.fire({
                title: 'Thất Bại',
                text: jsonData.error,
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
        }
        var tableBody = document.getElementById("tableBody");
        var newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${jsonData.row}</td>
            <td>${jsonData.id}</td>
            <td>${jsonData.type}</td>
            <td>${jsonData.status}</td>
            <td>${jsonData.xunhan}</td>
            <td>${jsonData.xu}</td>
            <td>${jsonData.note}</td>
            <td><span class="badge badge-dark">${jsonData.time}</span></td>
        `;
        tableBody.appendChild(newRow);

        startCountdown();
        var tableData = JSON.parse(localStorage.getItem('tableData')) || [];
        tableData.push(jsonData);
        localStorage.setItem('tableData', JSON.stringify(tableData));
    })
    .catch(error => {
        console.error('Có lỗi khi gửi dữ liệu đến API:', error);
    });
}

function startCountdown() {
    var delayInSeconds = <?php echo $_SESSION['delay']; ?>;
    var countdown = delayInSeconds;

    function updateDelayDisplay() {
        var delayDisplay = document.getElementById("delayDisplay");
        delayDisplay.innerHTML = `Đợi trong ${countdown} giây`;
        countdown--;

        if (countdown < 0) {
            clearInterval(countdownInterval);
            fetchDataAndDisplay();
        }
    }

    updateDelayDisplay();
    var countdownInterval = setInterval(updateDelayDisplay, 1000);
}

function restoreTableData() {
    var tableData = JSON.parse(localStorage.getItem('tableData')) || [];
    var tableBody = document.getElementById("tableBody");

    tableData.forEach(function(rowData) {
        var newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${rowData.row}</td>
            <td>${rowData.id}</td>
            <td>${rowData.type}</td>
            <td>${rowData.status}</td>
            <td>${rowData.xunhan}</td>
            <td>${rowData.xu}</td>
            <td>${rowData.note}</td>
            <td><span class="badge badge-dark">${rowData.time}</span></td>
        `;
        tableBody.appendChild(newRow);
    });
}

window.addEventListener('load', function() {
    restoreTableData();
    fetchDataAndDisplay();
});
</script>
<?php }?>



<?php } else if(dec($_COOKIE['type'],$_SESSION['key'],'trandangkhoa2006')=='traodoisub') {?>
<?php if(!isset($_SESSION['tokentds'])){?>
<div class="row">
<div class="d-flex justify-content-between">
<div class="col-md-4">
<h3>Tool Trao Đổi Sub</h3>
</div><button class='btn ripple btn-min w-sm btn-outline-primary me-2 my-auto' id="stopButton">Dừng lại.</button>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var stopButton = document.getElementById("stopButton");

    stopButton.addEventListener("click", function() {
        localStorage.removeItem('tableData');
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "api", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if(xhr.status !== 200){
                    Swal.fire({
                        title: 'Thất Bại',
                        text: "Lỗi Hệ Thống",
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        title: 'Thành Công',
                        text: "Đã Dừng Thành Công",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            }
        };
        xhr.send("stop=true");
    });
});
</script>
</div>
<div class="card">
    <div class="card-body">
        <label class="form-label" for="tokentds">Nhập Token TDS:</label>
        <div class="input-group mb-3">
            <input type="text" id="tokentds" class="form-control" placeholder="Nhập Token">
        </div>
        <button id="submitToken" class="btn btn-primary">Gửi</button>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var submitButton = document.getElementById("submitToken");
    var tokenInput = document.getElementById("tokentds");

submitButton.addEventListener("click", function() {
    var tokenValue = tokenInput.value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "api", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var responseData = xhr.responseText;
                console.log("Dữ liệu đã được gửi lên máy chủ thành công.");
                console.log("Dữ liệu phản hồi từ máy chủ: " + responseData);
                    location.reload();
            } else {
                console.error("Lỗi khi gửi yêu cầu");
            }
        }
    };
    var formData = "tokentds=" + encodeURIComponent(tokenValue);
    xhr.send(formData);
});

});
</script>
<?php } else if(!$_SESSION["list_job"]){?>
<div class="row">
<div class="d-flex justify-content-between">
<div class="col-md-4">
<h3>Tool Trao Đổi Sub</h3>
</div><button class='btn ripple btn-min w-sm btn-outline-primary me-2 my-auto' id="stopButton">Dừng lại.</button>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var stopButton = document.getElementById("stopButton");

    stopButton.addEventListener("click", function() {
        localStorage.removeItem('tableData');
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "api", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if(xhr.status !== 200){
                    Swal.fire({
                        title: 'Thất Bại',
                        text: "Lỗi Hệ Thống",
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        title: 'Thành Công',
                        text: "Đã Dừng Thành Công",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            }
        };
        xhr.send("stop=true");
    });
});
</script>
</div>
<div class="card">
    <div class="card-body">
        <label class="form-label" for="cookiefb">Nhập Cookie Fb:</label>
        <div class="input-group mb-3">
            <input type="text" id="cookiefb" class="form-control" placeholder="Nhập Cookie">
        </div>
        <label class="form-label" for="loaijob">Chọn loại Job: </label><br>
        <input type="checkbox" id="Like" value="like">
        <label for="like">Like</label><br>
        <input type="checkbox" id="camxuc" value="camxuc">
        <label for="cx">Cảm Xúc</label><br>
        <input type="checkbox" id="follow" value="Follow">
        <label for="fl">Follow</label><br>
        <input type="checkbox" id="comment" value="comment">
        <label for="cmt">Comment</label><br>
        <input type="checkbox" id="share" value="share">
        <label for="share">Share</label><br>
        <input type="checkbox" id="cxcmt" value="cxcmt">
        <label for="cxcmt">Cảm Xúc Comment</label><br>
        <input type="checkbox" id="likepage" value="likepage">
        <label for="likepage">Like Page</label><br>
        <input type="checkbox" id="joingr" value="joingr">
        <label for="joingr">Tham gia nhóm</label><br>
        <label class="form-label" for="delay">Nhập Delay:</label>
        <div class="input-group mb-3">
            <input type="text" id="delay" class="form-control" placeholder="Nhập Delay">
        </div>
        <button id="submit" class="btn btn-primary">Gửi</button>
    </div>
</div>

<script>
document.getElementById("submit").addEventListener("click", function() {
    var cookiefb = document.getElementById("cookiefb").value;
    var like = document.getElementById("Like").checked;
    var camxuc = document.getElementById("camxuc").checked;
    var follow = document.getElementById("follow").checked;
    var comment = document.getElementById("comment").checked;
    var share = document.getElementById("share").checked;
    var cxcmt = document.getElementById("cxcmt").checked;
    var likepage = document.getElementById("likepage").checked;
    var joingr = document.getElementById("joingr").checked;
    var delay = document.getElementById("delay").value;
    var data = {
        type: "runtds",
        cookiefb: cookiefb,
        like: like,
        camxuc: camxuc,
        follow: follow,
        comment: comment,
        share: share,
        cxcmt: cxcmt,
        likepage: likepage,
        joingr: joingr,
        delay: delay
    };
    fetch('/sevice/api', {
       method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
    body: new URLSearchParams(data)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Không kết nối được với mạng');
        }
        return response.text();
    })
    .then(text => {
        if (text) {
            try {
                const jsonData = JSON.parse(text);
                if(jsonData.status==="error"){
                    Swal.fire({
                        title: 'Thất Bại',
                        text: jsonData.msg,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        title: 'Thành Công',
                        text: jsonData.msg,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }, 2000);
                    location.reload();
                }
            } catch (error) {
                console.error('Lỗi khi phân tích JSON:', error);
            }
        } else {
            console.log('API trả về dữ liệu trống');
        }
    })
    .catch(error => {
        console.error('Có lỗi khi gửi dữ liệu đến API:', error);
    });
});
</script>

<?php } else {?>
<div class="row">
<div class="d-flex justify-content-between">
<div class="col-md-4">
<h3>Tool Trao Đổi Sub</h3>
</div>
</div>
<div class="row">
<div class="d-flex justify-content-between">
<div class="col-md-4"  bis_skin_checked="1">
<div class="card">
<div class="card-body">
    <div class="d-flex justify-content-between">
        <div  bis_skin_checked="1" >
            <h6 class="font-size-15">Cấu Hình</h6>
            <h5 class="font-size-10">Tài Khoản: <?php echo $_SESSION['usertds']?></h5>
            <h5 class="font-size-10">Xu: <?php echo $_SESSION['xutds']?></h5>
            <h5 class="font-size-10">Xu Die: <?php echo $_SESSION['xutdsdie']?></h5>
        </div>
    </div>
</div>
</div>
</div>
<div class="col-md-4"  bis_skin_checked="1">
<div class="card">
<div class="card-body">
    <div class="d-flex justify-content-between">
        <div  bis_skin_checked="1" >
            <h6 class="font-size-15">Facebook</h6>
            <h5 class="font-size-10">Name: <?php echo $_SESSION['name']?></h5>
            <h5 class="font-size-10">ID: <?php echo $_SESSION['id']?></h5>
            <h5 class="font-size-10">Loại Tài Khoản: <?php echo $_SESSION['loaitk']?></h5>
        </div>
    </div>
</div>
</div>
</div>

<button class='btn ripple btn-min w-sm btn-outline-primary me-2 my-auto' id="stopButton">Dừng lại.</button>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var stopButton = document.getElementById("stopButton");

    stopButton.addEventListener("click", function() {
        localStorage.removeItem('tableData');
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "api", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if(xhr.status !== 200){
                    Swal.fire({
                        title: 'Thất Bại',
                        text: "Lỗi Hệ Thống",
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        title: 'Thành Công',
                        text: "Đã Dừng Thành Công",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            }
        };
        xhr.send("stop=true");
    });
});
</script>
</div>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive" bis_skin_checked="1">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">#</th>
                        <th>ID</th>
                        <th>TYPE</th>
                        <th>TRẠNG THÁI</th>
                        <th>XU NHẬN</th>
                        <th>XU</th>
                        <th>NOTE</th>
                        <th>THỜI GIAN</th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all" class="" id="tableBody">
                </tbody>
            </table>
        </div>
        <div id="delayDisplay"></div> <!-- Thẻ để hiển thị thời gian trễ -->
    </div>
</div>

<script>
function fetchDataAndDisplay() {
    var data = {
        type: "worktds",
    };

    fetch('/sevice/api', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams(data)
    })
    .then(response => response.json())
    .then(jsonData => {
        if(jsonData.error){
            Swal.fire({
                title: 'Thất Bại',
                text: jsonData.error,
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
        }
        var tableBody = document.getElementById("tableBody");
        var newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${jsonData.row}</td>
            <td>${jsonData.id}</td>
            <td>${jsonData.type}</td>
            <td>${jsonData.status}</td>
            <td>${jsonData.xunhan}</td>
            <td>${jsonData.xu}</td>
            <td>${jsonData.note}</td>
            <td><span class="badge badge-dark">${jsonData.time}</span></td>
        `;
        tableBody.appendChild(newRow);
        startCountdown();
        var tableData = JSON.parse(localStorage.getItem('tableData')) || [];
        tableData.push(jsonData);
        localStorage.setItem('tableData', JSON.stringify(tableData));
    })
    .catch(error => {
        console.error('Có lỗi khi gửi dữ liệu đến API:', error);
    });
}

function startCountdown() {
    var delayInSeconds = <?php echo $_SESSION['delay']; ?>;
    var countdown = delayInSeconds;

    function updateDelayDisplay() {
        var delayDisplay = document.getElementById("delayDisplay");
        delayDisplay.innerHTML = `Đợi trong ${countdown} giây`;
        countdown--;

        if (countdown < 0) {
            clearInterval(countdownInterval);
            fetchDataAndDisplay();
        }
    }

    updateDelayDisplay();
    var countdownInterval = setInterval(updateDelayDisplay, 1000);
}

function restoreTableData() {
    var tableData = JSON.parse(localStorage.getItem('tableData')) || [];
    var tableBody = document.getElementById("tableBody");

    tableData.forEach(function(rowData) {
        var newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${rowData.row}</td>
            <td>${rowData.id}</td>
            <td>${rowData.type}</td>
            <td>${rowData.status}</td>
            <td>${rowData.xunhan}</td>
            <td>${rowData.xu}</td>
            <td>${rowData.note}</td>
            <td><span class="badge badge-dark">${rowData.time}</span></td>
        `;
        tableBody.appendChild(newRow);
    });
}

window.addEventListener('load', function() {
    restoreTableData();
    fetchDataAndDisplay();
});
</script>



<?php }?>
<?php }?>
<?php require($_SERVER['DOCUMENT_ROOT'].'/config/foot.php'); ?>
