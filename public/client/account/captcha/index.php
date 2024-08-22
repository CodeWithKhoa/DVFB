<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha Example</title>
</head>
<body>
    <h1>Example Captcha</h1>
    <img src="captcha.php" alt="Captcha Image"><br>
    <form action="verify.php" method="post">
        <label for="captcha">Enter Captcha:</label>
        <input type="text" id="captcha" name="key-captcha">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
