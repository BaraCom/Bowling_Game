<?php
    class Game {

        public function randomNumbers() {
            $randomNum = rand(0, 10);

            return $randomNum;
        }

        public function rulesGame($randomNumber) {

            if($randomNumber == 10) {
                return 'strike';
            }
            else if ($randomNumber == 0) {
                return 'fall';
            }
            else {
                return true;
            }
        }

        public function getPoints($totalPointsValue, $i) {
            $getPoints = $totalPointsValue[$i];

            return $getPoints;
        }
    }
?>