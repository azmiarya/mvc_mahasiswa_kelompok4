<?php
class Controller {
    // ... method view dan model yang lama tetap ada ...

    public static function setFlash($pesan, $tipe) {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'tipe'  => $tipe
        ];
    }

    public static function flash() {
        if (isset($_SESSION['flash'])) {
            echo '<div style="padding: 10px; margin-bottom: 20px; background-color: ' . 
                 ($_SESSION['flash']['tipe'] == 'success' ? '#d4edda' : '#f8d7da') . 
                 '; color: ' . ($_SESSION['flash']['tipe'] == 'success' ? '#155724' : '#721c24') . ';">' . 
                 $_SESSION['flash']['pesan'] . '</div>';
            unset($_SESSION['flash']);
        }
    }
}