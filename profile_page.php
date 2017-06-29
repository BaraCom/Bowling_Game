<?php

    require_once('create_user.php');

    $user = new CreateUser();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Bowling_Club</title>
        <link rel="stylesheet" href="main.css">
        <script src="jquery-3.2.1.js"></script>
        <script src="javascript.js"></script>
    </head>
    <body>
        <wrapper class="wrap">
            <div class="greeting">
                <p class="greeting_welcome">
                    Hello, <?php echo $_SESSION['user_data']; ?>!
                </p>
            </div>
            <div class="greeting_quality">
                <p class="quality_of_players">
                    Indicate the number of players:
                </p>
                <p class="incorrect_quality_data">

                </p>
                <form class="quality_form" method="post" action="profile_page.php">
                    <input class="quality_input" type="text" name="quality_input" placeholder="1 - 6" required>
                    <button class="quality_button" type="submit" name="quality_button" >ok</button>
                </form>

            </div>
            <div class="play_container">
                <?php
                    $user->getQualityPlayers($_POST['quality_input']);
                    $user->changeName($_POST['quality_input']);
                ?>
            </div>
        </wrapper>
    </body>
</html>
