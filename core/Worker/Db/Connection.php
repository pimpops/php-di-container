<?php

namespace Core\Worker\Db;

use \PDO;

class Connection {

    private $link;

    public function __construct()
    {
        $this->connect();
    }
    private function connect()
    {
        $config = [
            'host' => 'mysql',
            'db_name' => 'moe_db',
            'username' => 'moeuser',
            'password' => 'moepass',
            'charset' => 'utf8'
        ];
        $dsn = 'mysql:host='.$config['host'].';port=3306;dbname='. $config['db_name'];
        $this->link = new PDO($dsn, $config['username'], $config['password']);
        return $this;
    }
    public function execute($sql, $values = [])
    {
        $sth = $this->link->prepare($sql);
        return $sth->execute($values);
    }
    public function query($sql, $values = [], $statement = PDO::FETCH_OBJ)
    {
        $sth = $this->link->prepare($sql);
        $sth->execute($values);
        $result = $sth->fetchAll($statement);
        if($result === false) {
            return [];
        }
        return $result;
    }
    public function lastInsertId()
    {
        return $this->link->lastInsertId();
    }
}
