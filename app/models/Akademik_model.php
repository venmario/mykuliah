<?php

class Akademik_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getSemesterTerakhir()
    {
        $this->db->query('SELECT * FROM semester ORDER BY id DESC LIMIT 1');
        $semesterTerakhir = $this->db->single();
        var_dump($semesterTerakhir);
    }

    public function getSemesterTertentu($semester)
    {
        $this->db->query('SELECT * FROM semester WHERE semesterke = :semester');
        $this->db->bind('semester', $semester['semesterke']);
        return $this->db->single();
    }

    public function getKHS($semester)
    {
        $this->db->query('SELECT * FROM transkrip WHERE semester_id = :idsemester');
        $this->db->bind('idsemester', $semester['idsemester']);
        return $this->db->resultSet();
    }

    public function getRentangJam()
    {
        $arrJam = [];
        $menitAwal = 7 * 60;
        $menitPerSks = 55;
        while ($menitAwal < 1110) {
            $jam = floor($menitAwal / 60); //7
            $menit = $menitAwal % 60; //0
            if ($menit == 0) $menit = '00'; //00
            $jamMenitAwal = $jam . '.' . $menit; //7.00
            $menitAwal = $menitAwal + $menitPerSks; //475
            $jam = floor($menitAwal / 60); //7
            $menit = $menitAwal % 60; //
            if ($menit == 0) $menit = '00';
            $jamMenitAkhir = $jam . '.' . $menit;
            $jamMenit = $jamMenitAwal . ' - ' . $jamMenitAkhir;
            array_push($arrJam, $jamMenit);
            if ($menitAwal == 750) $menitAwal = $menitAwal + 30;
        }
        return $arrJam;
    }
    public function getJam()
    {
        $arrJam = [];
        $menitAwal = 7 * 60;
        $menitPerSks = 55;
        while ($menitAwal <= 1110) {
            $jam = floor($menitAwal / 60); //7
            $menit = $menitAwal % 60; //0
            if ($menit == 0) $menit = '00'; //00
            $jamMenit = $jam . '.' . $menit; //7.00
            $menitAwal = $menitAwal + $menitPerSks; //475
            array_push($arrJam, $jamMenit);
            if ($menitAwal == 750) {
                $jam = floor($menitAwal / 60); //12,5
                $menit = $menitAwal % 60; //30
                if ($menit == 0) $menit = '00'; //00
                $jamMenit = $jam . '.' . $menit; //12.30
                array_push($arrJam, $jamMenit);
                $menitAwal = $menitAwal + 30;
            }
        }
        return $arrJam;
    }

    public function getKP($data)
    {
        $this->db->query('SELECT j.idmatkul,j.idkp, k.kp FROM jadwal j INNER JOIN kp k on j.idkp = k.id WHERE j.idmatkul = :idmatkul');
        $this->db->bind('idmatkul', $data);
        return $this->db->resultSet();
    }

    public function getJadwalMatkulByKP($data)
    {
        $this->db->query('SELECT * FROM jadwal WHERE idmatkul = :idmatkul AND idkp = :idkp');
        $this->db->bind('idmatkul', $data['idmatkul']);
        $this->db->bind('idkp', $data['idkp']);
        return $this->db->single();
    }
}
