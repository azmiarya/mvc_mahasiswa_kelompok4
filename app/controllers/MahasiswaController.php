<?php
class MahasiswaController extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Mahasiswa';
        
        // Memanggil model
        $mahasiswaModel = $this->model('Mahasiswa');
        $data['mhs'] = $mahasiswaModel->getAll();

        $this->view('mahasiswa/index', $data);
    }
}