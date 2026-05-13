<?php
if (!session_id()) session_start();

require_once '../config/database.php';
require_once '../core/Router.php';
require_once '../core/Controller.php';
require_once '../core/Database.php';

define('BASEURL', 'http://localhost/mvc_mahasiswa/public');

$app = new Router();
$app->run();