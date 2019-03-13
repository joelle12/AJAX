<?php

$db = new PDO('mysql:host=mysql.docker;dbname=tchat;charset=utf8', 'root', 'root', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

header('Content-Type: application/json');

if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $pseudo = $_POST['pseudo'];
    $message = $_POST['message'];
    // date('Y-m-d');
    $date = (new DateTime())->format('Y-m-d H:i:s');

    // On ajoute le message en BDD
    $query = $db->prepare('INSERT INTO `message` (`pseudo`, `date`, `message`) VALUES (:pseudo, :date, :message)');
    $query->bindValue(':pseudo', $pseudo);
    $query->bindValue(':message', $message);
    $query->bindValue(':date', $date);
    $query->execute();

    // On renvoie le message en json
    echo json_encode([
        'pseudo' => $pseudo,
        'message' => $message,
        'date' => $date
    ]);
}
