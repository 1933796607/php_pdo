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
    // $pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_UPPER); //强制列名改为大写
    $pdo->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    ); //设置默认的提取方式（返回一个索引为结果集列名的数组）
    $query = $pdo->query("SELECT *FROM user");
    $rows = $query->fetchAll(); //$rows = $query->fetchAll(FETCH_NUM);
    // print_r($rows);
    echo $rows[0]['email'];
} catch (PDOException $e) {
    die('Exception' . $e->getMessage());
}
