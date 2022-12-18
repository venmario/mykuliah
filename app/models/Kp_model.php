<?php

class Kp_model
{
    private $table = 'kp';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKp()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }
}
