<?php

// Connexion à la BDD
$db = new PDO('mysql:host=localhost;dbname=smartphone;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// On récupère les smartphones en associatif

$sql = 'SELECT * FROM smartphone';
$query = $db->query($sql);
$smartphone = $query->fetchall(PDO::FETCH_ASSOC);

// transformer le tableau en Json (json_encode)
header('Content-Type: application/json');
echo json_encode($smartphone);