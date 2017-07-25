<?php
$db = new PDO('sqlite:' . realpath(__DIR__) . '/blog.db');

$sql = "SELECT * FROM users";

$result = $db->exec($sql);

var_dump($result);