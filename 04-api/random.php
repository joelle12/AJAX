<?php

// Connexion à la BDD
$db = new PDO('mysql:host=localhost;dbname=smartphone;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

/**
 * Ajouter les téléphones suivants dans la base
 *
 * Apple iPhone XS 899
 * Apple iPhone XR 999
 * Apple iPhone X 1199
 * Apple iPhone 8 799
 * Samsung Galaxy S10 999
 * Samsung Galaxy S9 599
 *
 * A chaque exécution du fichier, on pourra TRUNCATE la table pour éviter les doublons.
 */

$smartphones = [
    ['brand' => 'Apple', 'model' => 'iPhone XS', 'price' => 899],
    ['brand' => 'Apple', 'model' => 'iPhone XR', 'price' => 999],
    ['brand' => 'Apple', 'model' => 'iPhone X', 'price' => 1199],
    ['brand' => 'Apple', 'model' => 'iPhone 8', 'price' => 799],
    ['brand' => 'Samsung', 'model' => 'Galaxy S10', 'price' => 999],
    ['brand' => 'Samsung', 'model' => 'Galaxy S9', 'price' => 599]
];

// On reset la table
$db->query('TRUNCATE TABLE smartphone');

// On prépare la requête
$query = $db->prepare('INSERT INTO `smartphone` (brand, model, price) VALUES (:brand, :model, :price)');

// On exécute 6 requêtes
foreach ($smartphones as $smartphone) {
    $query->bindValue(':brand', $smartphone['brand']);
    $query->bindValue(':model', $smartphone['model']);
    $query->bindValue(':price', $smartphone['price']);
    $query->execute();
}
