<?php

// Connexion à la BDD
$db = new PDO('mysql:host=localhost;dbname=cars;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$voiture = [
    ['brand'=> 'Renault', 'model'=>'Megane', 'price'=> 23300, 'picture'=>'megane.jpg'],
    ['brand'=> 'Dacia', 'model'=>'Sandero', 'price'=> 23300, 'picture'=>'dacia.jpg'],
    ['brand'=> 'Peugeot', 'model'=> '208' , 'price'=> 23300, 'picture'=>'peugeot.jpg'],

];

$db->query('TRUNCATE TABLE cars');

$query = $db->prepare('INSERT INTO `cars` (brand, model, price, picture) VALUES (:brand, :model, :price, :picture)');

foreach ($voiture as $cars) {
    $query->bindValue(':brand', $cars['brand']);
    $query->bindValue(':model', $cars['model']);
    $query->bindValue(':price', $cars['price']);
    $query->bindValue(':picture', $cars['picture']);
    $query->execute();
}