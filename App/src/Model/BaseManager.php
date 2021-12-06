<?php

namespace App\Model;

use PDOException;

abstract class BaseManager
{
    protected $db;

    public function __construct()
    {
        try {
            $this->db = new \PDO('mysql:host=localhost;dbname=mvc', 'root', 'root', [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            
        }
    }
}