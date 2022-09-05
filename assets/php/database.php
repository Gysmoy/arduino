<?php

class Database
{
    private $host;
    private $database;
    private $username;
    private $password;
    private $charset;
    public $message;
    public function __construct()
    {
        $this->host = '45.132.157.52';
        $this->database = 'u163873840_arduino_db';
        $this->username = 'u163873840_arduino_user';
        $this->password = '[l8Qw$E2^XG';
        $this->charset = 'utf8mb4';
    }
    function connect()
    {
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->database . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($connection, $this->username, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            $this->message = $e -> getMessage();
            return false;
        }
    }
}