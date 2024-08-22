<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://img.icons8.com/ultraviolet/40/person-male.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Moirai+One&family=Tapestry&display=swap" rel="stylesheet">
    <title>Thông Tin Cá Nhân</title>
    <style>
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
            margin-top: 1%;
        }
        .social-icon {
            display: inline-block;
            width: 10%;
            height: 40px;
            background-size: cover;
            background-position: center;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }
        .social-icon:hover {
            transform: scale(1.2);
        }
        .small-icon {
            width: 80%;
            height: 80%;
        }
        .social-icon img {
            object-fit: contain;
            width: 80%;
            height: 90%;
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

    </style>
</head>
<body>
    <div class="container">
        <img class="profile-img" src="https://i.imgur.com/1rOVNoF.png" alt="Ảnh đại diện của bạn">
        <p class="text-head">Trần Đăng Khoa</p>
        <div class="social-head">
            <a class="social-icon" aria-label="Facebook" href="https://www.facebook.com/trandangkhoa.com.vn" target="_blank">
            <img class="small-icon" src="https://img.icons8.com/ios/50/facebook-new.png" alt="logo-facebok"/>
            </a>
            <a class="social-icon" aria-label="TikTok" href="https://www.tiktok.com/@khoatran3112" target="_blank" >
                <svg class="small-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="1.056"></g><g id="SVGRepo_iconCarrier"> <path d="M16.8217 5.1344C16.0886 4.29394 15.6479 3.19805 15.6479 2H14.7293M16.8217 5.1344C17.4898 5.90063 18.3944 6.45788 19.4245 6.67608C19.7446 6.74574 20.0786 6.78293 20.4266 6.78293V10.2191C18.645 10.2191 16.9932 9.64801 15.6477 8.68211V15.6707C15.6477 19.1627 12.8082 22 9.32386 22C7.50043 22 5.85334 21.2198 4.69806 19.98C3.64486 18.847 2.99994 17.3331 2.99994 15.6707C2.99994 12.2298 5.75592 9.42509 9.17073 9.35079M16.8217 5.1344C16.8039 5.12276 16.7861 5.11101 16.7684 5.09914M6.9855 17.3517C6.64217 16.8781 6.43802 16.2977 6.43802 15.6661C6.43802 14.0734 7.73249 12.7778 9.32394 12.7778C9.62087 12.7778 9.9085 12.8288 10.1776 12.9124V9.40192C9.89921 9.36473 9.61622 9.34149 9.32394 9.34149C9.27287 9.34149 8.86177 9.36884 8.81073 9.36884M14.7244 2H12.2097L12.2051 15.7775C12.1494 17.3192 10.8781 18.5591 9.32386 18.5591C8.35878 18.5591 7.50971 18.0808 6.98079 17.3564" stroke="#000000" stroke-linejoin="round"></path> </g></svg>
            </a>
            <a class="social-icon" aria-label="Call" href="tel:+84936763612" target="_blank">
                <img class="small-icon" src="https://img.icons8.com/ios/50/phone--v1.png" alt="logo-call"/>
            </a>
            <a class="social-icon" aria-label="Mail" href="mailto:khoa31122006@gmail.com" target="_blank">
            <img class="small-icon" src="https://img.icons8.com/ios/50/secured-letter--v1.png" alt="logo-mail"/>
            </a>
        </div>
        <div class="info-body">
            <a class="button-social" href="https://www.facebook.com/trandangkhoa.com.vn" target="_blank">
                Facebook
            </a>
            <a class="button-social" href="https://messenger.com/t/100026315003067" target="_blank">
                Messenger
            </a>
            <a class="button-social" href="https://www.tiktok.com/@khoatran3112" target="_blank">
                Tiktok
            </a>
            <a class="button-social" href="https://t.me/+84936763612" target="_blank">
                Telegram
            </a>
            <div class="button-social" data-Viettinbank>
                Viettinbank
            </div>
            <div class="button-social" data-Momo>
                Momo
            </div>
        </div>
    </div>
    <!-- Bảng thông báo -->
    <div id="notification" class="notification-table">
        <h2>Thông báo</h2>
        <p>Số tài khoản đã được sao chép thành công!</p>
        <button id="ok-button" class="ok-button">OK</button>
    </div>
    <script>
        // Tạo một mảng để lưu thông tin về ngân hàng và ứng dụng thanh toán
        let bankingInfo = [
            { name: "Viettinbank", stk: "0936763612" },
            { name: "Momo", stk: "0936763612" }
        ];

        // Lặp qua mỗi phần tử trong mảng bankingInfo
        bankingInfo.forEach(info => {
            // Lấy tất cả các phần tử có class "bank" hoặc "payment"
            let elements = document.querySelectorAll(`[data-${info.name}]`);

            // Duyệt qua mỗi phần tử và thiết lập sự kiện click
            elements.forEach(element => {
                element.addEventListener("click", function() {
                    // Lấy thông tin STK từ mảng bankingInfo bằng cách sử dụng tên ngân hàng hoặc ứng dụng thanh toán
                    let stk = info.stk;

                    // Hiển thị bảng thông báo
                    let notification = document.getElementById('notification');
                    notification.style.display = 'block';
                    notification.classList.add('bounce-in');

                    // Sao chép số tài khoản (STK) vào clipboard
                    navigator.clipboard.writeText(stk)
                        .then(() => {
                            // Chờ 3 giây rồi ẩn bảng thông báo
                            setTimeout(function() {
                                notification.style.display = 'none';
                                notification.classList.remove('bounce-in');
                            }, 3000);
                        })
                        .catch(err => {
                            console.error('Failed to copy: ', err);
                        });
                });
            });
        });

        // Xử lý sự kiện click cho nút OK
        document.getElementById('ok-button').addEventListener('click', function() {
            let notification = document.getElementById('notification');
            notification.style.display = 'none';
            notification.classList.remove('bounce-in');
        });
    </script>
</body>
</html>
