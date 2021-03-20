<?php

class DataBase
{
    private string $host ="xxxxx";
    private string $user = "xxxxx";
    private string $pwd ="xxxxx";
    private string $db ="xxxxx";
    private array $driverOpt= [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    protected function connect(): PDO
    {
        return new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db ,$this->user ,$this->pwd ,$this->driverOpt);
    }
}