<?php
    require_once('PDOConfig.php');

    $pdo = new PDOConfig();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bowling_Club</title>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <script src="jquery-3.2.1.js"></script>
    <script src="javascript.js"></script>
</head>
<body>
    <wrapper class="wrap">
        <div class="message_container">
            <span class="correct_data"></span>
            <span class="incorrect_data"></span>
        </div>
        <div class="enter_container">
            <span class="enter_link">
                enter
            </span>
            <form action="index.php" method="post" class="enter_form">
                <input class="enter_login" name="enter_login" type="text" placeholder="login..." required onkeyup="checkInputsForEnter()">
                <input class="password" name="password" type="password" placeholder="password..." required onkeyup="checkInputsForEnter()">
                <button class="enter_button" name="enter_button" type="submit" value="enter" disabled>
                    enter
                </button>
            </form>
            <?php
                if ($pdo->checkToPressEnterButton() == true) {
                    if ($pdo->checkEnterUser('singup') == true) {
                        $_SESSION['user_data'] = $_POST['enter_login']; ?>

                        <script type="text/javascript">
                            window.location = "profile_page.php";
                        </script>
                    <?php }
                }
            ?>
        </div>
        <div class="reg_container">
            <span class="reg_link">
                registration
            </span>
            <form action="index.php" method="post" class="reg_form">
                <input class="reg_login" name="reg_login" type="text" placeholder="login..." required onkeyup="checkInputsForReg()">
                <input class="password pass_1" name="password_1" type="password" placeholder="password..." required onkeyup="checkInputsForReg()">
                <input class="password pass_2" name="password_2" type="password" placeholder="password again..." required onkeyup="checkInputsForReg()">
                <button class="reg_button" name="reg_button" type="submit" value="enter" disabled>
                    registration
                </button>
            </form>
            <?php
                if ($pdo->checkToPressRegButton() == true) {
                    if ($pdo->checkRegUser('singup') == true) {
                        $_SESSION['user_data'] = $_POST['reg_login'];

                        $pdo->userRegistration('singup', $_POST['reg_login'], $_POST['password_1']);
                        ?>
                        <script type="text/javascript">
                            window.location = "profile_page.php";
                        </script>
                        <?php
                    }
                }
             ?>
        </div>
    </wrapper>
</body>
</html>

