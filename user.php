<?php
    require_once('PDOConfig2.php');

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
            if($num >= 1 && $num <= 6) {
                return true;
            }
        }

        public function createDataInput() {
            static $i = 1;
            ?>
            <div class="user_data_container_<?php echo $i; ?> user_data_container">
                <p class="user_name_<?php echo $i; ?>">
                    Name:
                </p>
                <p class="user_point_<?php echo $i; ?>">
                    Points: 0
                </p>
                <p class="pitch_<?php echo $i; ?>">
                    pitch
                </p>
            </div>
        <?php $i++;
        }
    }
?>