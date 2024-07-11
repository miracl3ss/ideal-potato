<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register page</title>
    <link rel="stylesheet" href="../styles/reg.css">
</head>
<body>
    <section id='main'>
        <form method="POST" id="register">
            <input type="text" placeholder="full Name" name="fullName" id="name">
            <input type="text" placeholder="phone Number" name="phoneNumber" id="phone">
            <input type="text" placeholder="email" name="emailID" id="email">
            <input type="text" placeholder="username" name="userName" id="login">
            <input type="text" placeholder="password" name="userPassword" id="password">
            <button id="btn-cta" type="submit">register</button>
        </form>
        <a href="login.php">Sign In</a>
    </section>
    
    <script src="../scripts/reg.js"></script>
</body>
</html>
