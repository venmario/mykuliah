<?php

class Matkul_model
{
    private $table = 'matakuliah';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMatakuliah()
    {
        $this->db->query("SELECT m.id,m.nama as nama, j.nama as jenis, s.jumlah_sks as sks FROM $this->table m INNER JOIN jenis j on m.jenis_id=j.id INNER JOIN sks s on m.sks_id = s.id");
        return $this->db->resultSet();
    }

    public function getMaktulById($id)
    {
        $this->db->query("SELECT m.id,m.nama as nama,m.prasyarat, m.deskripsi,m.ujian, j.nama as jenis, j.id as idjenis, s.jumlah_sks as sks, s.id as idsks FROM $this->table m INNER JOIN jenis j on m.jenis_id=j.id INNER JOIN sks s on m.sks_id = s.id WHERE m.id = :id");

        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahMatkul($data)
    {
        $this->db->query('INSERT INTO ' . $this->table . ' VALUES (:id, :nama, :prasyarat,:deskripsi,:idjenis,:idsks)');
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', ucwords(strtolower($data['nama'])));
        $this->db->bind('prasyarat', $data['prasyarat']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('idjenis', $data['idjenis']);
        $this->db->bind('idsks', $data['idsks']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function getMatkulTertentu($data)
    {
        $idjenis = $data['idjenis'];
        $idsks = $data['idsks'];
        $namaMatkul = $data['namaMatkul'];
        $this->db->query('SELECT m.id,m.nama as nama, j.nama as jenis, s.jumlah_sks as sks FROM matakuliah m INNER JOIN jenis j on m.jenis_id=j.id INNER JOIN sks s on m.sks_id = s.id WHERE j.id LIKE :idjenis AND s.id LIKE :idsks AND m.nama LIKE :nama');
        $this->db->bind("idjenis", "%$idjenis%");
        $this->db->bind("idsks", "%$idsks%");
        $this->db->bind("nama", "%$namaMatkul%");
        return $this->db->resultSet();
    }

    public function ubahDataMatkul($data)
    {
        $ujian = "Minggu ke " . $data['mingguke'] . ":" . $data['namahari'] . ":" . $data['jam'];
        $query = 'UPDATE matakuliah SET 
                nama = :nama,
                prasyarat =:prasyarat,
                deskripsi =:deskripsi,
                ujian =:ujian,
                jenis_id =:jenis_id,
                sks_id = :sks_id WHERE id =:id';
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('prasyarat', $data['prasyarat']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('ujian', $ujian);
        $this->db->bind('jenis_id', $data['idjenis']);
        $this->db->bind('sks_id', $data['idsks']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteMatkul($data)
    {
        $this->db->query("DELETE FROM matakuliah WHERE id = :id");
        $this->db->bind('id', $data['idmatkul']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
