<?php

class Akademik extends Controller
{
    public function index()
    {
        $data['judul'] = 'Kartu Hasil Studi';
        // $data['khs'] = $this->model('Akademik_model')->getKHS();
        $this->view('templates/header', $data);
        $this->view('akademik/index', $data);
        $this->view('templates/footer');
    }

    public function transkrip()
    {
    }

    public function perwalian()
    {
        $data['judul'] = 'Perwalian';
        $data['matkul'] = $this->model('Matkul_model')->getAllMatakuliah();
        $data['jenis'] = $this->model('JenisMatkul_model')->getAllJenis();
        $data['rentangjam'] = $this->model('Akademik_model')->getRentangJam();
        $data['jam'] = $this->model('Akademik_model')->getJam();
        $this->view('templates/header', $data);
        $this->view('akademik/perwalian', $data);
        $this->view('templates/footer');
    }

    public function getjadwalmatkul()
    {
        echo json_encode($this->model('Akademik_model')->getKP($_POST['idmatkul']));
    }
    public function getjadwalmatkulbykp()
    {
        echo json_encode($this->model('Akademik_model')->getJadwalMatkulByKP($_POST));
    }
}
