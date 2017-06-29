<?php
class PDOMain {

    private $MPDO;

    function __construct($dbname = "bowling_users", $host = "localhost", $user = "root", $password = "") {

        try {
            $this->MPDO = new PDO("mysql: dbname = $dbname;
                                               host = $host",
                                                $user,
                                                $password);
            return $this->MPDO;
        }
        catch(PDOException $e) {
            echo "Autologic error </br>" . $e->getMessage();
        }
    }

    function selectPDO($db, $cols, $where = "", $order = "", $limit = "") {
        $sql = "SELECT {$cols} FROM '{$db}' {$where} {$order} {$limit}";
        $result = $this->MPDO->query($sql);
        $result->execute();

        if ($where != "") {
            $row = $result->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
        else {
            echo "Incorrect data (not specified 'WHERE') </br>";
        }
    }

    function insertPDO($db, $cols = "", $values = "") {
        if ($cols == "") {
            echo "not find cols </br>";
        }
        $sql = "INSERT INTO '{$db}' {($cols)} VALUES {($values)}";
        $this->MPDO->query($sql);
    }
}
?>