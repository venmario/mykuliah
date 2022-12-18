<?php

class Sks_model{
    private $table = 'sks';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getSKS()
    {
        $this->db->query("SELECT * FROM $this->table");
        return $this->db->resultSet();
    }
}