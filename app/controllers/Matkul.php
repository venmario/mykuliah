<?php

class Matkul extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Matkul';
        $data['matkul'] = $this->model('Matkul_model')->getAllMatakuliah();
        $this->view('templates/header', $data);
        $this->view('matkul/index', $data);
        $this->view('templates/footer');
    }

    public function editmatkul()
    {
        $data['judul'] = 'Edit Matkul';
        $data['matkul'] = $this->model('Matkul_model')->getAllMatakuliah();
        $this->view('templates/header', $data);
        $this->view('matkul/editmatkul', $data);
        $this->view('templates/footer');
    }


    public function edit()
    {
        if ($this->model('Matkul_model')->ubahDataMatkul($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/matkul/editmatkul');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/matkul/editmatkul');
        }
    }

    public function tambah()
    {
        if ($this->model('Matkul_model')->tambahMatkul($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/matkul/editmatkul');
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/matkul/editmatkul');
        }
    }



    public function delete()
    {
        if ($this->model('Matkul_model')->deleteMatkul($_POST) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            // header('Location: '. BASEURL.'/matkul/editmatkul');
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            // header('Location: '. BASEURL.'/matkul/editmatkul');
        }
    }

    public function getdetail()
    {
        echo json_encode($this->model('Matkul_model')->getMaktulById($_POST['id']));
    }

    public function getjenis()
    {
        echo json_encode($this->model('JenisMatkul_model')->getAllJenis());
    }

    public function getsks()
    {
        echo json_encode($this->model('Sks_model')->getSKS());
    }

    public function getmatkultertentu()
    {
        echo json_encode($this->model('Matkul_model')->getMatkulTertentu($_POST));
    }

    public function getmatkulbyid()
    {
        echo json_encode($this->model('Matkul_model')->getMaktulById($_POST['id']));
    }
}
