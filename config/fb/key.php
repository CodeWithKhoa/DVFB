<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sao chép Key Tool</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #667eea, #764ba2);
            font-family: Arial, sans-serif;
            color: #fff;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .key-container {
            display: inline-block;
            position: relative;
            width: 200px;
            height: 99px;
            border-radius: 20%;
            background: linear-gradient(to bottom right, #dcd7f7, #8c7ae6);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            cursor: pointer;
        }

        .key-container:hover {
            transform: scale(1.1);
        }

        .key-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 16px;
            text-align: center;
            color: #333;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .notification {
            position: fixed;
            top: 20px;
            left: 50%;
            white-space: nowrap;
            transform: translateX(-50%);
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }

        .show-notification {
            opacity: 1;
            visibility: visible;
        }

        .profile-image {
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-name {
            position: absolute;
            top: 180px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 19px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .ghichu {
            position: absolute;
            top: 230px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 15px;
            text-transform: uppercase;
            white-space: nowrap;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="key-container" onclick="copyKey()">
            <div class="key-text" id="keyText"><?php echo $_GET['key']; ?></div>
        </div>
        <div class="profile-image">
            <img src="https://scontent.fhan14-4.fna.fbcdn.net/v/t39.30808-6/292349428_1055414745345682_8005314375414430934_n.jpg?_nc_cat=102&cb=99be929b-59f725be&ccb=1-7&_nc_sid=8bfeb9&_nc_ohc=qCHWyhx89EsAX_g8CKC&_nc_ht=scontent.fhan14-4.fna&oh=00_AfDNTJToGVfEAlik4Zz5pt_TGyCrc9ZGd2sE9pNl1SHTJQ&oe=649DDB88" alt="Profile Image">
        </div>
        <h1><div class="profile-name">Trần Đăng Khoa</div></h1>
    </div>
    <div class="ghichu">Click Bên Dưới Để Coppy</div>
    <div class="notification" id="notification">Key đã được sao chép!</div>

    <script>
        function copyKey() {
            var keyElement = document.getElementById("keyText");
            var key = keyElement.innerText;

            navigator.clipboard.writeText(key).then(function() {
                showNotification();
            }, function() {
                alert("Lỗi khi sao chép key!");
            });
        }

        function showNotification() {
            var notification = document.getElementById("notification");
            notification.classList.add("show-notification");
            setTimeout(function() {
                notification.classList.remove("show-notification");
            }, 2000);
        }
    </script>
</body>
</html>
