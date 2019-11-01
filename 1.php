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
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    // $pdo->query('select *from user');
    // echo $pdo->exec("INSERT INTO user (user_name,email,age,password) 
    // VALUES ('test','1234235','18','23213123')");
    // echo $pdo->exec("UPDATE user set fee='123.45' where id<3 ");
    // echo $pdo->exec("DELETE FROM user where id=4");
    echo $pdo->exec("INSERT INTO user (user_name,email,age,password) 
    VALUES ('test','1234235','18','23213123')");
    echo $pdo->lastInsertId(); //获取最后自增主键
} catch (PDOException $e) {
    die('Exception' . $e->getMessage());
}
