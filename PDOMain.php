<?php

session_start();

class PDOMain {

    private $connect;

    public function __construct($dbName = 'bowling_users', $host = 'localhost', $login = 'root', $password = '', $charset = 'utf8') {

        $dsn = "mysql:host=$host;dbname=$dbName;charset=$charset";

        try {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $this->connect = new PDO($dsn, $login, $password, $options);

            //Check connection
            if ($this->connect->connect_error) {
                die("<br/>Connection failed: " . $this->connect->connect_error . "<br/>");
            }
        }
        catch(PDOException $e) {
            echo "<br/> CONNECT ERROR <br/>" . $e->getMessage() . "<br/>";
        }
        return $this->connect;
    }

    public function PDOSelect($cols, $dbTable) {

        $sql = "SELECT $cols FROM `$dbTable`";
        $result = $this->connect->query($sql);

        return $result;
    }

    public function PDOInsert($dbTable, $loginValue, $passwordValue) {

        $sql = "INSERT INTO $dbTable (`user_login`, `user_password`) VALUES (:login, :password)";

        $query = $this->connect->prepare($sql);
        $query->bindValue(':login', $loginValue);
        $query->bindValue(':password', $passwordValue);

        $result = $query->execute();

        return $result;
    }
}
?>