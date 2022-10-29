<?php
    session_start();
    $human = false;
    $submit = false;
    if(@$_POST['captcha'] == $_SESSION['captcha']){
        $human = true;
        $submit = true;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Captcha</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <?php if(!$submit): ?>
                <form action="" method="post">
                    <img src="./captcha.php" alt="captcha">
                    <input type="text" name="captcha">
                    <button type="submit">Submit</button>
                </form>
            <?php else: ?>
                <?php if($human): ?>
                    <p>You are human</p>
                <?php else: ?>
                    <p>You are robot</p>
                <?php endif; ?>
            <?php endif; ?>
            
        </div>
    </div>
</body>
</html>