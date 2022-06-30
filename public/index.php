<?php
if (!session_id()) session_start();

// untuk menghubungkan file yang menghubungkan semua file class
require_once '../app/init.php';

// jalankan class App
$app = new App();
