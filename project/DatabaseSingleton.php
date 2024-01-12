<?php

class DatabaseSingleton {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        // database connection details
        $hostname = 'localhost';
        $database = 'tv_series_db';
        $username = 'root';
        $password = 'dbadmin123';

        try {
            $this->pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }
}

