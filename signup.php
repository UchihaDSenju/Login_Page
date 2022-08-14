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
    <div class="main" style="margin-top: 8%;">
        <?php include('error.php'); ?>
        <div id="form_div" style="padding-bottom: 10px ;">
        <h1 style="margin: 15px 0px 0px 0px;">REGISTER</h1>
            <form action='signup.php' method="post">
                <input type="text" placeholder="Username" name='name' value="<?php echo $name; ?>" required>

                <input type="email" placeholder="Your email" name='email' value="<?php echo $email; ?>" required>

                <input type="password" placeholder="Required password" name="pass1" required>

                <input type="password" placeholder="Re-Enter password" name="pass2" required>

                <select name="dept" class="input" id="" required>
                    <option value disabled selected>Choose Department</option>
                    <option value="CSE">Computer Science and Engineering</option>
                    <option value="Mech">Mechnical Engineering</option>
                    <option value="Civil">Civil Engineering</option>
                    <option value="Marine Engg">Marine Engineering</option>
                    <option value="Aero">Aeronautical Engineering</option>
                </select>

                <select name="year" class="input" id="" required>
                    <option value disabled selected>Choose Year of Study</option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                </select>
                <input type="submit" value="Register" id="button" name="register">
                <hr>
                <h3 style="margin: 3px 0px ;">Already a Member?</h3>
            </form>
            <a href="login.php"><button style="margin-top: 0px">Login Here</button></a>
            
        </div>
    </div>
</body>
</html>