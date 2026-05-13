<?php
class MahasiswaController extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa')->getAll();
        $this->view('mahasiswa/index', $data);
    }

    public function create() {
        $data['judul'] = 'Tambah Mahasiswa';
        $this->view('mahasiswa/create', $data);
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('Mahasiswa');
            
            // Validasi Sederhana
            if (empty($_POST['npm']) || empty($_POST['nama_lengkap'])) {
                $this->setFlash('NPM dan Nama tidak boleh kosong!', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa/create');
                exit;
            }

            // Cek NPM Unik
            if ($model->cekNpm($_POST['npm'])) {
                $this->setFlash('NPM sudah terdaftar!', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa/create');
                exit;
            }

            // Eksekusi Simpan
            if ($model->create($_POST) > 0) {
                $this->setFlash('Data berhasil ditambahkan', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }
    }
}