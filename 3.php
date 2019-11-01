<?php
$config = [
    'host' => '127.0.0.1',
    'user' => 'root',
    'password' => 'root',
    'database' => 'hehe',
    'charset' => 'utf8'
];

$dsn = sprintf(
    "mysql:host=%s;dbname=%s;charset=%s",
    $config['host'],
    $config['database'],
    $config['charset']
);
// echo $dsn;
try {
    $pdo = new PDO(
        $dsn,
        $config['user'],
        $config['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    $query = $pdo->query("SELECT *FROM user WHERE id >2");
    while ($fileld = $query->fetch()) {
        echo sprintf(
            "用户名：%s\t年龄：%s<br/>",
            $fileld['user_name'],
            $fileld['age']
        );
    }
} catch (PDOException $e) {
    die('Exception' . $e->getMessage());
}
