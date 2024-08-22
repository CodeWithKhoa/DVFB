<?php 
$year = date("Y");
$url = "https://" . $_SERVER['HTTP_HOST'];
$data = [
    "Admin" => ["Trần Đăng Khoa", "https://i.imgur.com/1rOVNoF.png"],
    "small_icon" => [
        ["Facebook","https://www.facebook.com/trandangkhoa.com.vn","https://img.icons8.com/ios/50/facebook-new.png"],
        ["Tiktok","https://www.tiktok.com/@khoatran3112","https://img.icons8.com/ios/50/tiktok--v1.png"],
        ["Call","tel:+84936763612","https://img.icons8.com/ios/50/phone.png"],
        ["Mail","mailto:khoa31122006@gmail.com","https://img.icons8.com/ios/50/secured-letter--v1.png"],
    ],
    "services" => [
        ["_blank", "Facebook", "https://www.facebook.com/trandangkhoa.com.vn"],
        ["_blank", "Messenger", "https://messenger.com/t/100026315003067"],
        ["_blank", "Tiktok", "https://www.tiktok.com/@khoatran3112"],
        ["_blank","Youtube","https://www.youtube.com/c/Tr%E1%BA%A7n%C4%90%C4%83ngKhoa206"],
        ["_blank", "Telegram", "https://t.me/+84936763612"],
        ["copy", "Viettinbank", "0936763612", "Ngân hàng: Vietinbank <br> CTK: Trần Đăng Khoa <br>Đã Sao chép STK: 0936763612"],
        ["copy", "Momo", "0936763612", "Ngân hàng: Momo <br> CTK: Trần Đăng Khoa <br>Đã Sao chép STK: 0936763612"],
    ],
    "Copyright" => [$year, $url],
];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://img.icons8.com/ultraviolet/40/person-male.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Moirai+One&family=Tapestry&display=swap" rel="stylesheet">
    <title><?php echo$data["Admin"][0]?></title>
    <style>
        /* CSS không thay đổi */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 70%;
            margin: auto;
            background: #fff;
            padding: 10%;
            border-radius: 2%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            line-height: 1.6;
            color: #666;
        }
        .text-head {
            text-align: center;
            color: #333;
            font-family: "Tapestry", serif;
            font-weight: 600;
            font-size: 150%;
            margin-top: 2%;
            margin-bottom: 20px;
        }
        .profile-img {
            display: block;
            margin: 0 auto;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .social-head {
            text-align: center;
            margin-top: 0%;
        }
        .social-icon {
            display: inline-block;
            width: 45px; /* Điều chỉnh kích thước của biểu tượng nhỏ */
            height: 45px; /* Điều chỉnh kích thước của biểu tượng nhỏ */
            background-size: cover;
            background-position: center;
            border-radius: 50%;
            transition: transform 0.3s ease;
            margin: 5px; /* Thêm khoảng cách giữa các biểu tượng */
        }
        .social-icon:hover {
            transform: scale(1.2);
        }
        .social-icon img {
            width: 90%;
            height: 80%;
            object-fit: contain;
        }
        .info-body {
            text-align: center;
            line-height: 40px;
        }
        .button-social {
            font-family: "Moirai One", system-ui;
            font-weight: 1000;
            display: inline-block;
            margin: 1% 0%;
            padding: 1% 0;
            width: 100%;
            background-color: #0056ff8f;
            color: #fff;
            border: none;
            border-radius: 20px;
            text-decoration: none;
            font-size: 100%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button-social:hover {
            background-color: #0056b3;
        }
        /* CSS cho bảng thông báo */
        .notification-table {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 9999;
            max-width: 80%;
            max-height: 80%;
            overflow: auto;
            text-align: center;
        }
        .notification-table h2 {
            margin-bottom: 10px;
            font-size: 1.2em;
            color: #333;
        }
        .notification-table p {
            font-size: 1.1em;
            color: #666;
        }
        .ok-button {
            background-color: #0056ff8f;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .ok-button:hover {
            background-color: #0056b3;
        }
        .bounce-in {
            animation: bounceIn 0.5s ease;
            display: inline-block;
        }
        @keyframes bounceIn {
            0% {
                transform: scale(0) translate(-50%, -50%);
                opacity: 0;
            }
            50% {
                transform: scale(1.2) translate(-50%, -50%);
                opacity: 1;
            }
            100% {
                transform: scale(1) translate(-50%, -50%);
                opacity: 1;
            }
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #f1f1f1;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
        .footer a {
            color: #0056ff;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="profile-img" src="<?php echo $data['Admin'][1]; ?>" alt="Ảnh đại diện của bạn">
        <p class="text-head"><?php echo $data['Admin'][0]; ?></p>
        <div class="social-head">
            <?php foreach($data['small_icon'] as $icon): ?>
                <a class="social-icon" aria-label="<?php echo $icon[0]; ?>" href="<?php echo $icon[1]; ?>" target="_blank">
                    <img src="<?php echo $icon[2]; ?>" alt="logo-<?php echo $icon[0]; ?>"/>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="info-body">
            <?php foreach($data['services'] as $service): ?>
                <?php if ($service[0] === "copy"): ?>
                    <div class="button-social" data-message="<?php echo $service[3]; ?>" data-account="<?php echo $service[2]; ?>">
                        <?php echo $service[1]; ?>
                    </div>
                <?php else: ?>
                    <a class="button-social" data-message="Đã chuyển hướng đến <?php echo $service[1]; ?>" href="<?php echo $service[2]; ?>" target="<?php echo $service[0]; ?>">
                        <?php echo $service[1]; ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Bảng thông báo -->
    <div id="notification" class="notification-table">
        <h2>Thông báo</h2>
        <p id="notification-message"></p>
        <button id="ok-button" class="ok-button">OK</button>
    </div>
    <!-- Đuôi bản quyền -->
    <div class="footer">
        &copy; Copyright <?php echo $data["Copyright"][0]; ?> <a href="<?php echo $data["Copyright"][1]; ?>"><?php echo explode("://",$data["Copyright"][1])[1]; ?></a>. All rights reserved.
    </div>
     <script>
        let buttons = document.querySelectorAll('.button-social');

        buttons.forEach(button => {
            button.addEventListener('click', function(event) {
                if (this.hasAttribute('data-account')) {
                    event.preventDefault();
                    let notification = document.getElementById('notification');
                    let message = document.getElementById('notification-message');
                    let account = this.getAttribute('data-account');

                    message.innerHTML = this.getAttribute('data-message');
                    notification.style.display = 'block';
                    notification.classList.add('bounce-in');

                    navigator.clipboard.writeText(account)
                        .then(() => {
                            setTimeout(function() {
                                notification.style.display = 'none';
                                notification.classList.remove('bounce-in');
                            }, 3000);
                        })
                        .catch(err => {
                            console.error('Failed to copy: ', err);
                        });
                }
            });
        });

        document.getElementById('ok-button').addEventListener('click', function() {
            let notification = document.getElementById('notification');
            notification.style.display = 'none';
            notification.classList.remove('bounce-in');
        });
    </script>
</body>
</html>
