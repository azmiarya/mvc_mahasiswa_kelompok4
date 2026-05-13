<?php

class MahasiswaController extends Controller {

    /**
     * SESI 6: Menampilkan daftar mahasiswa dengan fitur Search & Filter
     */
    public function index() {
        $data['judul'] = 'Daftar Mahasiswa';

        // Tangkap parameter GET untuk pencarian dan filter
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $jurusan = isset($_GET['jurusan']) ? $_GET['jurusan'] : '';

        // Jika user melakukan pencarian atau memilih filter jurusan
        if (!empty($search) || !empty($jurusan)) {
            $data['mhs'] = $this->model('Mahasiswa')->searchAndFilter($search, $jurusan);
        } else {
            // Jika tidak ada filter, tampilkan semua data seperti biasa
            $data['mhs'] = $this->model('Mahasiswa')->getAll();
        }

        $this->view('mahasiswa/index', $data);
    }

    /**
     * SESI 4: Menampilkan form tambah data
     */
    public function create() {
        $data['judul'] = 'Tambah Mahasiswa';
        $this->view('mahasiswa/create', $data);
    }

    /**
     * SESI 4: Memproses penyimpanan data baru
     */
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $model = $this->model('Mahasiswa');

            // Validasi NPM Unik
            if ($model->cekNpm($_POST['npm'])) {
                self::setFlash('NPM sudah terdaftar!', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa/create');
                exit;
            }

            // Eksekusi Simpan
            if ($model->create($_POST) > 0) {
                self::setFlash('Data berhasil ditambahkan', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }
    }

    /**
     * SESI 5: Menampilkan form edit data berdasarkan ID
     */
    public function edit($id) {
        $data['judul'] = 'Edit Data Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa')->find($id);

        if (!$data['mhs']) {
            self::setFlash('Data tidak ditemukan!', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }

        $this->view('mahasiswa/edit', $data);
    }

    /**
     * SESI 5: Memproses pembaruan data
     */
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Mahasiswa')->update($id, $_POST) > 0) {
                self::setFlash('Data berhasil diubah', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                // Jika tidak ada perubahan pada input, tetap arahkan ke index
                self::setFlash('Tidak ada perubahan pada data', 'info');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }
    }

    /**
     * SESI 5: Memproses penghapusan data
     */
    public function delete($id) {
        if ($this->model('Mahasiswa')->delete($id) > 0) {
            self::setFlash('Data berhasil dihapus', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            self::setFlash('Gagal menghapus data!', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}