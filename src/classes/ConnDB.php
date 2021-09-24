<?php
namespace MyApp\classes;

use PDO;
use PDOException;

class ConnDB{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'assignment_2';

    protected function connect(){
        $db = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        try {
            $pdo = new PDO($db,$this->username,$this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            print_r($th);
        }
        return $pdo;

    }
}