<?php
$mysqlHost = getenv('MYSQLHOST');
$mysqlHost = ($mysqlHost === false) ? '' : trim($mysqlHost);

// على Railway تُحقن متغيرات مثل RAILWAY_PROJECT_ID — أقوى من الاعتماد على مسار /app فقط
$onRailway = (getenv('RAILWAY_PROJECT_ID') !== false && getenv('RAILWAY_PROJECT_ID') !== '')
    || (getenv('RAILWAY_ENVIRONMENT') !== false && getenv('RAILWAY_ENVIRONMENT') !== '');

$mustUseRailwayMysql = ($mysqlHost === '') && (
    $onRailway
    || __DIR__ === '/app'
    || file_exists('/.dockerenv')
);

if ($mustUseRailwayMysql) {
    die(
        'قاعدة البيانات غير مربوطة: Railway → خدمة التطبيق (PHP) → Variables → أضف مراجع من MySQL: ' .
        'MYSQLHOST، MYSQLPORT، MYSQLUSER، MYSQLPASSWORD، MYSQLDATABASE. ثم Redeploy. ' .
        '(تأكد أن النشر من Git آخر main أو نفّذ railway up بعد git pull.)'
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
