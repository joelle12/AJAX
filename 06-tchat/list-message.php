<?php

$db = new PDO('mysql:host=mysql.docker;dbname=tchat;charset=utf8', 'root', 'root', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

header('Content-Type: application/json');

// On récupère tous les messages
$messages = $db->query('SELECT * FROM message')->fetchAll();

// On renvoie les messages en json
echo json_encode($messages);
