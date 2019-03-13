<?php

// Connexion à la BDD
$db = new PDO('mysql:host=localhost;dbname=cars;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// On récupère les cars en associatif

$sql = 'SELECT * FROM cars';
$query = $db->query($sql);
$cars = $query->fetchall(PDO::FETCH_ASSOC);

// transformer le tableau en Json (json_encode)
header('Content-Type: application/json');
echo json_encode($cars);