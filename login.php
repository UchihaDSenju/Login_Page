<?php
    include('server.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="main" style="margin-top: 15%;">
        <?php include('error.php') ?>
        <div id="form_div" style="padding-bottom: 10px ;">
            <h1 style="margin: 15px 0px 0px 0px;">LOGIN</h1>
            <form action="login.php" method="post">
                <input type="text" placeholder="Enter your email" name="email" value="<?php echo $email; ?>">
                <input type="password" placeholder="Enter your password" name="password">
                <input type="submit" value="login" id="button" name="login">
                <hr>
                <h3 style="margin: 3px 0px ;">Don't Have an Account?</h3>
                <button formaction="signup.php">Register Here</button>
            </form>
            
        </div>
    </div>
</body>
</html>