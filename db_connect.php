<?php
$servername = getenv('MYSQLHOST');
if ($servername === false || $servername === '') {
    // داخل Docker (ومنها Railway) لا يوجد MySQL على localhost بدون متغيرات الخدمة
    if (file_exists('/.dockerenv')) {
        die(
            'قاعدة البيانات غير مربوطة: في Railway → خدمة التطبيق → Variables أضف مراجع MySQL: ' .
            'MYSQLHOST، MYSQLPORT، MYSQLUSER، MYSQLPASSWORD، MYSQLDATABASE. ' .
            'ثم تأكد أن آخر كود مرفوع إلى Git وأن النشر اكتمل (إعادة نشر يدوية إن لزم).'
        );
    }
    // محليًا بدون Docker: 127.0.0.1 يجبر TCP
    $servername = '127.0.0.1';
}

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
