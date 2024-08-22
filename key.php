<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sao chép Key Tool</title>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7231862282532435"
     crossorigin="anonymous"></script>
     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7231862282532435"
     crossorigin="anonymous"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #2f3542, #4c4c6a);
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
            flex-direction: column;
        }

        .key-container {
            display: inline-block;
            position: relative;
            margin-top: 123px;
            width: 203px;
            height: 76px;
            border-radius: 5%;
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
            top: 170px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-block;
            transition: opacity 0.3s;
        }
        .ghichu {
            position: absolute;
            top: 230px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 13px;
            text-transform: uppercase;
            white-space: nowrap;
            display: inline-block;
            transition: opacity 0.3s;

        }
        @property --rotate {
          syntax: "<angle>";
          initial-value: 132deg;
          inherits: false;
        }
        
        :root {
          --card-height: 65vh;
          --card-width: calc(var(--card-height) / 1.5);
        }
        
        
        body {
          min-height: 100vh;
          background: #212534;
          display: flex;
          align-items: center;
          flex-direction: column;
          padding-top: 2rem;
          padding-bottom: 2rem;
          box-sizing: border-box;
        }
        
        
        .card {
          background: #191c29;
          width: var(--card-width);
          height: var(--card-height);
          padding: 3px;
          position: relative;
          border-radius: 6px;
          justify-content: center;
          align-items: center;
          text-align: center;
          display: flex;
          font-size: 1.5em;
          color: rgb(88 199 250 / 50%);
          cursor: pointer;
          font-family: Bacasime Antique;
        }
        
        .card:hover {
          color: rgb(88 199 250 / 100%);
          transition: color 1s;
        }
        .card:hover:before, .card:hover:after {
          animation: none;
          opacity: 0;
        }
        
        
        .card::before {
          content: "";
          width: 104%;
          height: 102%;
          border-radius: 8px;
          background-image: linear-gradient(
            var(--rotate)
            , #5ddcff, #3c67e3 43%, #4e00c2);
            position: absolute;
            z-index: -1;
            top: -1%;
            left: -2%;
            animation: spin 2.5s linear infinite;
        }
        
        .card::after {
          position: absolute;
          content: "";
          top: calc(var(--card-height) / 6);
          left: 0;
          right: 0;
          z-index: -1;
          height: 100%;
          width: 100%;
          margin: 0 auto;
          transform: scale(0.8);
          filter: blur(calc(var(--card-height) / 6));
          background-image: linear-gradient(
            var(--rotate)
            , #5ddcff, #3c67e3 43%, #4e00c2);
            opacity: 1;
          transition: opacity .5s;
          animation: spin 2.5s linear infinite;
        }
        /* Điện thoại di động */
        @media (max-width: 767px) {
            .key-container {
                margin-top: 167px;
            }
        }
        
        /* Máy tính */
        @media (min-width: 768px) {
            .key-container {
                margin-top: 180px;
            }
        }
        
        @keyframes spin {
          0% {
            --rotate: 0deg;
          }
          100% {
            --rotate: 360deg;
          }
        }
        
        a {
          color: #212534;
          text-decoration: none;
          font-family: sans-serif;
          font-weight: bold;
          margin-top: 2rem;
        }
    </style>
</head>
<body>
    <div class="card">
    <div class="container">
        <div class="key-container" onclick="countdownAndCopyKey()">
            <div class="key-text" id="keyText">Nhấn vào đây để lấy key</div>
        </div>
        <div class="profile-image">
            <img src="https://imgur.com/wOVRBxJ.png" alt="Profile Image">
        </div>
        <h1><div class="profile-name">Trần Đăng Khoa</div></h1>
    </div>
    <div class="ghichu">Click Bên Dưới Để Coppy</div>
    <div class="notification" id="notification">Key đã được sao chép!</div>
    </div>
    <script>
        var keyElement = document.getElementById("keyText");
        var keyContainer = document.querySelector(".key-container");
        var notification = document.getElementById("notification");
        var countdownInterval;

        function countdownAndCopyKey() {
            keyContainer.classList.add("disabled");
            keyElement.innerText = "Vui lòng chờ (10 giây)";
            startCountdown(10);
        }

        function startCountdown(count) {
            clearInterval(countdownInterval);
            countdownInterval = setInterval(function() {
                count--;
                if (count > 0) {
                    keyElement.innerText = "Vui lòng chờ (" + count + " giây)";
                } else {
                    clearInterval(countdownInterval);
                    copyKey();
                }
            }, 1000);
        }

        function copyKey() {
            var key = keyElement.dataset.key;

            navigator.clipboard.writeText(key).then(function() {
                showNotification();
                keyElement.innerText = key;
                keyContainer.classList.remove("disabled");
            }, function() {
                alert("Lỗi khi sao chép key!");
                resetKeyText();
            });
        }

        function showNotification() {
            notification.classList.add("show-notification");
            setTimeout(function() {
                notification.classList.remove("show-notification");
            }, 2000);
        }

        function resetKeyText() {
            keyElement.innerText = "Nhấn vào đây để lấy key";
        }

        // Set key value after 5 seconds (replace with your actual key)
        setTimeout(function() {
            keyElement.dataset.key = "<?php echo $_GET["key"]?>";
        }, 5000);
    </script>
</body>
</html>
