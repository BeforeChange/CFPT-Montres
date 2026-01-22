<?php

namespace Cfpt\Montres\Infrastructure;

class Database extends \PDO {
    public function __construct(string $host, string $dbname, string $user, string $pass) {
        parent::__construct("mysql:host={$host};dbname={$dbname}", $user, $pass);
        try {
            $this->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}