<?php
$mysqlHost = getenv('MYSQLHOST');
$mysqlHost = ($mysqlHost === false) ? '' : trim($mysqlHost);

// صورة Docker هذا المشروع: الملفات تحت /app — Railway لا يضمن وجود /.dockerenv
$mustUseRailwayMysql = ($mysqlHost === '') && (__DIR__ === '/app' || file_exists('/.dockerenv'));

if ($mustUseRailwayMysql) {
    die(
        'قاعدة البيانات غير مربوطة: Railway → خدمة التطبيق (PHP) → Variables → أضف من خدمة MySQL: ' .
        'MYSQLHOST، MYSQLPORT، MYSQLUSER، MYSQLPASSWORD، MYSQLDATABASE (Reference). ' .
        'ثم Redeploy. إن كان النشر من GitHub: ادفع آخر commit من المستودع.'
    );
}

$servername = $mysqlHost !== '' ? $mysqlHost : '127.0.0.1';

$username = getenv('MYSQLUSER') ?: 'root';
$password = getenv('MYSQLPASSWORD');
$password = $password === false ? '' : $password;
$dbname = getenv('MYSQLDATABASE') ?: 'graduation_projects';
$port = (int)(getenv('MYSQLPORT') ?: 3306);

$conn = new mysqli($servername, $username, $password, $dbname, $port);
$conn->set_charset('utf8mb4');

if ($conn->connect_error) {
    die('فشل الاتصال: ' . $conn->connect_error);
}
