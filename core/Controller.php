<?php
class Controller
{
    // Memanggil file tampilan (View)
    public function view($view, $data = [])
    {
        extract($data);
        require_once '../app/views/' . $view . '.php';
    }

    // Memanggil file data (Model) - Ini yang tadi error!
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    // Sistem Notifikasi (Flash Message)
    public static function setFlash($pesan, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'tipe'  => $tipe
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div style="padding: 10px; margin-bottom: 20px; border: 1px solid; background-color: ' .
                ($_SESSION['flash']['tipe'] == 'success' ? '#d4edda' : '#f8d7da') . '; color: ' .
                ($_SESSION['flash']['tipe'] == 'success' ? '#155724' : '#721c24') . ';">' .
                $_SESSION['flash']['pesan'] . '</div>';
            unset($_SESSION['flash']);
        }
    }
}
