<?php

class Jadwal_model
{
    private $table = 'jadwal';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambahJadwal($data)
    {
        $this->db->query('INSERT INTO jadwal VALUES (:idmatkul, :idkp, :hari, :jam_mulai, :jam_selesai)');
        $this->db->bind('idmatkul', $data['idmatkul']);
        $this->db->bind('idkp', $data['idkp']);
        $this->db->bind('hari', $data['hari']);
        $this->db->bind('jam_mulai', $data['jam_mulai']);
        $this->db->bind('jam_selesai', $data['jam_selesai']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
