<?php

require_once("PDOMain.php");

class Config extends PDOMain {

    private $table;

    function __construct($table) {
        parent::__construct();

        $this->table = $table;
    }

    function getUser($login) {
        $user = $this->selectPDO($this->table, "*", "WHERE login = '$login'");
        if (count($user) > 0) {
            return $user;
        }
        else {
            echo "Not found user! </br>";
        }
    }
}

?>