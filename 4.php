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
    $sql = "SELECT *FROM user WHERE id ={$_GET['id']} ";
    $query = $pdo->query($sql);
    print_r($query->fetchAll());
} catch (PDOException $e) {
    die('Exception' . $e->getMessage());
}
