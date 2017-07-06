<?php
    require_once('PDOConfig.php');
    require_once('config_game.php');

    class User {

        private $points;

        public function __construct() {
            $this->points = 0;
        }

        public function checkToPressButton($button) {
            if (isset($button)) {
                return true;
            }
        }

        public function checkEnterNumbers($num) {
            $enterNum = (int) $num;

            if($enterNum >= 1 && $enterNum <= 6) {
                return true;
            }
        }

        public function createDataInput() {
            static $i = 1;
            ?>
            <div class="user_data_container_<?php echo $i; ?> user_data_container">
                <span class="user_name_<?php echo $i; ?> user_name">
                    Name:
                </span>
                <span class="user_point_<?php echo $i; ?> user_point">
                    Points: 0
                </span>
            </div>
        <?php $i++;
        }

        public function createPitchButton() {
            ?>
            <span class="pitch">
                pitch
                <script>
                    var data_input = <?php echo $_POST['quality_input']; ?> ;

                    $('.pitch').bind('click', function () {
                        clickButtonPitch(data_input);
                    });
                </script>
            </span>
            <p class="final_button">
                re-play
                <script>
                    $('.final_button').bind('click', function () {
                        redirect();
                    });
                </script>
            </p>
            <?php
        }
    }
?>