<?php


namespace App;


class Connect
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db = 'myjnia';

    public function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db;
        $pdo = new \PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        return $pdo;
    }
}