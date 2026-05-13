<?php

class Mahasiswa {
    private $table = 'mahasiswa';
    private $db;

    public function __construct() {
        // Mengambil koneksi database dari core/Database
        $database = new Database();
        $this->db = $database->getConnection();
    }

    /**
     * SESI 3: Mengambil semua data mahasiswa
     */
    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * SESI 6: FITUR PENCARIAN DAN FILTER DATA
     * Method ini menyusun query dinamis berdasarkan input user
     */
    public function searchAndFilter($search = '', $jurusan = '') {
        // Gunakan WHERE 1=1 agar penambahan AND di bawahnya lebih mudah
        $query = "SELECT * FROM " . $this->table . " WHERE 1=1";
        $params = [];

        // Jika user mengisi kolom pencarian (NPM atau Nama)
        if (!empty($search)) {
            $query .= " AND (npm LIKE :search OR nama_lengkap LIKE :search)";
            $params['search'] = "%$search%";
        }

        // Jika user memilih filter jurusan tertentu
        if (!empty($jurusan)) {
            $query .= " AND jurusan = :jurusan";
            $params['jurusan'] = $jurusan;
        }

        $query .= " ORDER BY id DESC";

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * SESI 4: Mengecek apakah NPM sudah ada (untuk validasi unik)
     */
    public function cekNpm($npm) {
        $stmt = $this->db->prepare("SELECT npm FROM " . $this->table . " WHERE npm = :npm");
        $stmt->execute(['npm' => $npm]);
        return $stmt->fetch();
    }

    /**
     * SESI 4: Menambahkan data mahasiswa baru
     */
    public function create($data) {
        $query = "INSERT INTO " . $this->table . " 
                  (npm, nama_lengkap, fakultas, jurusan, tempat_lahir, tanggal_lahir, jenis_kelamin, status_id) 
                  VALUES (:npm, :nama_lengkap, :fakultas, :jurusan, :tempat_lahir, :tanggal_lahir, :jenis_kelamin, 1)";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'npm' => $data['npm'],
            'nama_lengkap' => $data['nama_lengkap'],
            'fakultas' => $data['fakultas'],
            'jurusan' => $data['jurusan'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'jenis_kelamin' => $data['jenis_kelamin']
        ]);
        return $stmt->rowCount();
    }

    /**
     * SESI 5: Mencari satu data mahasiswa berdasarkan ID (untuk form Edit)
     */
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * SESI 5: Mengupdate data mahasiswa yang sudah ada
     */
    public function update($id, $data) {
        $query = "UPDATE " . $this->table . " SET 
                    npm = :npm, 
                    nama_lengkap = :nama_lengkap, 
                    fakultas = :fakultas, 
                    jurusan = :jurusan, 
                    tempat_lahir = :tempat_lahir, 
                    tanggal_lahir = :tanggal_lahir, 
                    jenis_kelamin = :jenis_kelamin 
                  WHERE id = :id";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            'id' => $id,
            'npm' => $data['npm'],
            'nama_lengkap' => $data['nama_lengkap'],
            'fakultas' => $data['fakultas'],
            'jurusan' => $data['jurusan'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'jenis_kelamin' => $data['jenis_kelamin']
        ]);
        return $stmt->rowCount();
    }

    /**
     * SESI 5: Menghapus data mahasiswa
     */
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM " . $this->table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->rowCount();
    }
}