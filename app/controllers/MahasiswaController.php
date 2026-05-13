<?php
class MahasiswaController extends Controller
{

    // Tampilan Tabel Utama
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa')->getAll();
        $this->view('mahasiswa/index', $data);
    }

    // Tampilan Form Tambah
    public function create()
    {
        $data['judul'] = 'Tambah Mahasiswa';
        $this->view('mahasiswa/create', $data);
    }

    // Proses Simpan Data
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('Mahasiswa');

            // Cek NPM Duplikat
            if ($model->cekNpm($_POST['npm'])) {
                self::setFlash('NPM sudah ada!', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa/create');
                exit;
            }

            if ($model->create($_POST) > 0) {
                self::setFlash('Data berhasil ditambah', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }
    }
}
