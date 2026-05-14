<?php

class Controller
{
    /**
     * Memanggil file tampilan (View) dengan sistem Layouting
     * Menggunakan Output Buffering untuk menangkap konten view
     */
    public function view($view, $data = [])
    {
        // Extract data agar key array menjadi variabel (misal: $data['judul'] menjadi $judul)
        extract($data);

        // 1. Mulai Output Buffering
        ob_start();

        // 2. Panggil file view yang spesifik (konten inti)
        require_once '../app/views/' . $view . '.php';

        // 3. Simpan isi buffer ke dalam variabel $content dan bersihkan buffer
        $content = ob_get_clean();

        // 4. Sertakan header, tampilkan $content, lalu sertakan footer
        // Header dan Footer akan mengenali variabel yang sudah di-extract di atas
        require_once '../app/views/layouts/header.php';
        echo $content;
        require_once '../app/views/layouts/footer.php';
    }

    /**
     * Memanggil file Model
     */
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    /**
     * Menetapkan Pesan Flash (Sistem Notifikasi)
     */
    public static function setFlash($pesan, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'tipe'  => $tipe // Gunakan nilai seperti: success, danger, warning, info
        ];
    }

    /**
     * Menampilkan Pesan Flash dengan class Bootstrap 5
     */
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                    ' . $_SESSION['flash']['pesan'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';

            // Hapus session flash setelah ditampilkan agar tidak muncul berulang kali
            unset($_SESSION['flash']);
        }
    }
}
