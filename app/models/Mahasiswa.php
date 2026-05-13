<?php
class Mahasiswa {
    private $table = 'mahasiswa';
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Method baru untuk cek NPM unik
    public function cekNpm($npm) {
        $stmt = $this->db->prepare("SELECT npm FROM " . $this->table . " WHERE npm = :npm");
        $stmt->bindParam(':npm', $npm);
        $stmt->execute();
        return $stmt->fetch();
    }

    // Method baru untuk simpan data
    public function create($data) {
        $query = "INSERT INTO " . $this->table . " 
                  (npm, nama_lengkap, fakultas, jurusan, tempat_lahir, tanggal_lahir, jenis_kelamin, status_id) 
                  VALUES (:npm, :nama_lengkap, :fakultas, :jurusan, :tempat_lahir, :tanggal_lahir, :jenis_kelamin, 1)";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute($data);
        return $stmt->rowCount();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}