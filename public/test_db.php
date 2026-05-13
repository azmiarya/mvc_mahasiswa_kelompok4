<?php
require_once '../config/database.php';

$db = getConnection();
if ($db) {
    echo "<h1>Koneksi berhasil</h1>";
}