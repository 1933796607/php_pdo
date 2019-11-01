<?php

use Database\DB;

include 'DB.php';
$config = [
    'host' => '127.0.0.1',
    'user' => 'root',
    'password' => 'root',
    'database' => 'hehe',
    'charset' => 'utf8'
];
try {
    $db = new DB($config);
    // $db->execute("INSERT INTO user SET user_name=?,email=?,age=?,password=?", ['jjs', 'fdsfsdaf', '23', '1231234512']);
    // $rows = $db->query("SELECT *FROM user WHERE id>? ", ['2']);
    // print_r($rows);
    // $db->table('user')->where('id > 7')->insert([
    //     'user_name' => '111',
    //     'age' => '12', 'email' => '2323', 'password' => '231414341'
    // ]);
    // $db->table('user')->update([
    //     'user_name' => '222',
    //     'age' => '12', 'email' => '2323', 'password' => '231414341'
    // ]);
    // $rows = $db->table('user')->field('user_name', 'age')
    //     ->limit(1, 2)->get();
    // print_r($rows);
    $db->table('user')->where('id>=9')->delete();
} catch (Exception $e) {
    die($e->getMessage());
}
