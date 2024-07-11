<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../styles/reg.css">
</head>
<body>
    <section id='main'>
        <form method="POST" id="loginForm">
            <input type="text" placeholder="username" name="userName" id="login">
            <input type="text" placeholder="password" name="userPassword" id="password">
            <button id="btn-cta" type="submit">login</button>
        </form>
        <section id='buttons'>
            <a href="adminsReg.php">i'm admin</a>
            <a href="register.php">registration</a>
        </section>
    </section>
    <script src="../scripts/login.js"></script>
</body>
</html>