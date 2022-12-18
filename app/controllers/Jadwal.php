<?php

class Jadwal extends Controller
{
    public function index()
    {
    }

    public function inputjadwal()
    {
        $data['judul'] = 'Input Jadwal';
        $data['jenis'] = $this->model('JenisMatkul_model')->getAllJenis();
        $data['matkul'] = $this->model('Matkul_model')->getAllMatakuliah();
        $data['kp'] = $this->model('Kp_model')->getAllKp();
        $data['jam'] = $this->model('Akademik_model')->getJam();
        $this->view('templates/header', $data);
        $this->view('jadwal/inputjadwal', $data);
        $this->view('templates/footer');
    }

    public function tambahjadwal()
    {
        var_dump($_POST);
        if ($this->model('Matkul_model')->tambahJadwal($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/matkul/inputjadwal');
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/matkul/inputjadwal');
        }
    }
}
