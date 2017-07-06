<?php
    require_once ('user.php');

    class CreateUser extends User {

        public function __construct() {
            parent::__construct();
        }

        public function getQualityPlayers($qualityPlayers) {

            if($this->checkToPressButton($_POST['quality_button']) == true) {
                if($this->checkEnterNumbers($qualityPlayers) == true) {
                    ?>
                    <script>
                        propButtonDisabled($('.quality_button'));
                    </script>
                    <?php
                    for ($i = 0; $i < $qualityPlayers; $i++) {
                        $this->createDataInput();
                    }
                    $this->createPitchButton();
                }
                else { ?>
                    <script>
                        $('.incorrect_quality_data').text('Invalid number.');
                    </script>
                <?php }
            }
        }

        public function changeName($qualityPlayers) {

            for($i = 0; $i < $qualityPlayers; $i++) { ?>
                <script>
                    setName(<?php echo $i + 1; ?>);
                </script>
                <?php
            }
        }
    }
?>