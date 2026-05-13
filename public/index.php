<?php
if (!session_id()) session_start();

require_once '../config/database.php';

// Definisikan BASEURL (sesuaikan dengan nama folder proyekmu)
define('BASEURL', 'http://localhost/mvc_mahasiswa/public');

// Router Sederhana
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home/index';
$url = explode('/', $url);

// Ambil Controller
$controllerName = ucfirst($url[0]) . 'Controller';
if (file_exists('../app/controllers/' . $controllerName . '.php')) {
    require_once '../app/controllers/' . $controllerName . '.php';
} else {
    echo "Controller $controllerName tidak ditemukan.";
}