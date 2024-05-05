<?php

//namespace src;

class Db
{
    private $pdo;
    private static $instance;
    private $log = [];

    private function __construct(){}
    private function __clone(){}

    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function getConnection(){
        $host = DB_HOST;
        $dbName = DB_NAME;
        $dbUser = DB_USER;
        $dbPass = DB_PASSWORD;

        if (!$this->pdo) {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbPass);
        }

        return $this->pdo;
    }
    public function exec($query, $_method, array $params = []){
        $t = microtime(1);
        $prepared = $this->getConnection()->prepare($query);
        $ret = $prepared->execute($params);

        if (!$ret){
            $errorInfo = $prepared->errorInfo();
            trigger_error("{$errorInfo[0]}#{$errorInfo[1]}: " . $errorInfo[2]);
            return false;
        }

        $affectedRows = $prepared->rowCount();
        $this->log[] = [$query, microtime(1) - $t, $_method, $affectedRows];
        return $affectedRows;
    }
    public function fetchAll($query, $_method, array $params = []){
        $t = microtime(1);
        $prepared = $this->getConnection()->prepare($query);
        $ret = $prepared->execute($params);

        if (!$ret){
            $errorInfo = $prepared->errorInfo();
            trigger_error("{$errorInfo[0]}#{$errorInfo[1]}: " . $errorInfo[2]);
            return [];
        }

        $data = $prepared->fetchAll(PDO::FETCH_ASSOC);
        $affectedRows = $prepared->rowCount();
        $this->log[] = [$query, microtime(1) - $t, $_method, $affectedRows];

        return $data;
    }
    public function fetchOne($query, $_method, array $params = []){
        $t = microtime(1);
        $prepared = $this->getConnection()->prepare($query);
        $ret = $prepared->execute($params);

        if (!$ret) {
            $errorInfo = $prepared->errorInfo();
            trigger_error("{$errorInfo[0]}#{$errorInfo[1]}: " . $errorInfo[2]);
            return [];
        }
        $data = $prepared->fetchAll(PDO::FETCH_ASSOC);
        $affectedRows = $prepared->rowCount();
        $this->log[] = [$query, microtime(1) - $t, $_method, $affectedRows];

        if (!$data) {
            return false;
        }

        return reset($data);
    }
    public function lastInsertId(){
        return $this->getConnection()->lastInsertId();
    }
    public function getLog()
    {
        if (!$this->log) {
            return '';
        }
        $res = '';
        foreach ($this->log as $elem) {
            $res = $elem[1] . ': ' . $elem[0] . ' (' . $elem[2] . ') [' . $elem[3] . ']' . "\n";
        }
        return '<pre>' . $res .'</pre>';
    }

}