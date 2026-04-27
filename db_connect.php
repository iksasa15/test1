<?php

/**
 * يقرأ MYSQLHOST… أو يفك MYSQL_URL (موصى به على Railway: مرجع واحد من خدمة MySQL).
 */
function db_parse_mysql_url(string $raw): ?array
{
    $raw = trim($raw);
    $raw = preg_replace('#^mysql2:#i', 'mysql:', $raw);
    if ($raw === '' || stripos($raw, 'mysql://') !== 0) {
        return null;
    }
    $u = parse_url($raw);
    if ($u === false || empty($u['host'])) {
        return null;
    }

    return [
        'host' => $u['host'],
        'port' => isset($u['port']) ? (int) $u['port'] : 3306,
        'user' => isset($u['user']) ? rawurldecode((string) $u['user']) : 'root',
        'pass' => isset($u['pass']) ? rawurldecode((string) $u['pass']) : '',
        'db' => isset($u['path']) ? rawurldecode(trim((string) $u['path'], '/')) : '',
    ];
}

$host = getenv('MYSQLHOST');
$host = ($host === false) ? '' : trim($host);
$user = getenv('MYSQLUSER');
$user = ($user === false) ? '' : $user;
$pass = getenv('MYSQLPASSWORD');
$pass = $pass === false ? '' : $pass;
$db = getenv('MYSQLDATABASE');
$db = ($db === false) ? '' : $db;
$port = (int) (getenv('MYSQLPORT') ?: 0);

$url = getenv('MYSQL_URL');
if (($url === false || $url === '') && ($du = getenv('DATABASE_URL')) !== false && str_starts_with(strtolower((string) $du), 'mysql://')) {
    $url = $du;
}

$p = ($url !== false && $url !== '') ? db_parse_mysql_url((string) $url) : null;
if ($p !== null) {
    if ($host === '') {
        $host = $p['host'];
    }
    if ($port <= 0) {
        $port = $p['port'];
    }
    if ($user === '') {
        $user = $p['user'];
    }
    if ($pass === '') {
        $pass = $p['pass'];
    }
    if ($db === '') {
        $db = $p['db'];
    }
}

$onRailway = (getenv('RAILWAY_PROJECT_ID') !== false && getenv('RAILWAY_PROJECT_ID') !== '')
    || (getenv('RAILWAY_ENVIRONMENT') !== false && getenv('RAILWAY_ENVIRONMENT') !== '');

$mustUseRailwayMysql = ($host === '') && (
    $onRailway
    || __DIR__ === '/app'
    || file_exists('/.dockerenv')
);

if ($mustUseRailwayMysql) {
    die(
        'قاعدة البيانات غير مربوطة على خدمة PHP (ليس على MySQL): Variables → أضف مراجع من خدمة MySQL. ' .
        'إما الخمسة: MYSQLHOST, MYSQLPORT, MYSQLUSER, MYSQLPASSWORD, MYSQLDATABASE ' .
        'أو مرجع واحد: MYSQL_URL. ثم احفظ وانتظر Redeploy.'
    );
}

if ($port <= 0) {
    $port = 3306;
}
if ($user === '') {
    $user = 'root';
}
if ($db === '') {
    $db = 'graduation_projects';
}

$conn = new mysqli($host, $user, $pass, $db, $port);
$conn->set_charset('utf8mb4');

if ($conn->connect_error) {
    die('فشل الاتصال: ' . $conn->connect_error);
}
