<?php
class Mahasiswa
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM " . $this->table . " ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cekNpm($npm)
    {
        $stmt = $this->db->prepare("SELECT npm FROM " . $this->table . " WHERE npm = :npm");
        $stmt->execute(['npm' => $npm]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $query = "INSERT INTO " . $this->table . " (npm, nama_lengkap, fakultas, jurusan, tempat_lahir, tanggal_lahir, jenis_kelamin, status_id) 
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
}
