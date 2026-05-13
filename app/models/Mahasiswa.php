<?php
class Mahasiswa {
    private $table = 'mahasiswa';
    private $db;

    public function __construct() {
        // Menginisialisasi koneksi dari core/Database
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}