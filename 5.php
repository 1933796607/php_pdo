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
    // $sth = $pdo->prepare("SELECT *FROM user WHERE id =:id"); //SQL预准备
    // $sth->execute([':id' => $_GET['id']]); //发送预准备参数
    // print_r($sth->fetchAll());
    $sth = $pdo->prepare("INSERT INTO user (user_name,email,age,password) 
    VALUES (:user_name,:email,:age,:password)");
    $sth->execute([
        ':user_name' => 'jiangjishi',
        ':email' => '2314234',
        ':age' => '18',
        'password' => '4232324'
    ]);
    echo $pdo->lastInsertId();
} catch (PDOException $e) {
    die('Exception' . $e->getMessage());
}
