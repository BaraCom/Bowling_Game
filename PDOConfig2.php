<?php
require_once ('PDOMain2.php');

class PDOConfig2 extends PDOMain2 {

    function __construct() {
        parent::__construct();
    }

    public function checkToPressEnterButton() {

        if (isset($_POST['enter_button'])) {
            return true;
        }
    }

    public function checkToPressRegButton() {

        if (isset($_POST['reg_button'])) {
            return true;
        }
    }

    public function checkEnterUser($dbTable) {
        $user = $this->PDOSelect('*', $dbTable);

        while ($postResult = $user->fetch()) {
            if (trim($_POST['enter_login']) == $postResult['user_login'] && $_POST['password'] == $postResult['user_password']) {

                return true;
            }
        }
         ?>
            <script>
                $('.incorrect_data').text('Non-existent login or password!');
            </script>
        <?php

        return;

    }

    public function checkRegUser($dbTable) {
        $user = $this->PDOSelect('*', $dbTable);

        while ($postResult = $user->fetch()) {
            if (trim($_POST['reg_login']) == $postResult['user_login']) {

//                echo '<span style="color: #7e2d2d;"><br/>This login already exists!<br/>
//                        Please enter another.<br/></span>';
                ?>
                    <script>
                        $('.incorrect_data').text('This login already exists! Please enter another.');
                    </script>
                <?php

                return;
            }
        }
        if ($_POST['password_1'] != $_POST['password_2']) {

//            echo '<span style="color: #7e2d2d;"><br/>Passwords do not match!<br/>';

            ?>
                <script>
                    $('.incorrect_data').text('Passwords do not match!');
                </script>
            <?php

            return;
        }

        return true;
    }

    public function userRegistration($dbTable, $loginValue, $passwordValue) {

        $result_reg = $this->PDOInsert($dbTable, $loginValue, $passwordValue);

        return $result_reg;
    }
}
?>