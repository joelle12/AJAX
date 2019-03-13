<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout véhicule</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
<div class="row">
    <div class="col-6 offset-3">
        <form action="add.php" method="post">
            <div class="form-group">
                <label for="marque">Marque</label>
                <input type="text" name="mark" id="mark" class="form-control">
               
            </div>
            <div class="form-group">
                <label for="model">Modèle</label>
                <input type="text" name="model" id="model" class="form-control">
               
            </div>
            <div class="form-group">
                <label for="price">Prix </label>
                <input type="text" name="price" id="price" class="form-control">
                
            </div>
            <div class="form-group">
                <label for="picture">Photo</label>
                <input type="text" name="picture" id="picture" class="form-control">
                
            </div>
            <button class="btn btn-primary btn-block">Envoyer</button>
        </form>
    </div>
</div>
</div>
<ul id="succès"></ul>


<?php 

// On vérifie que le formulaire a été soumis
if ('POST' === $_SERVER['REQUEST_METHOD']) {
    // On récupère les champs du formulaire
    $mark = $_POST['mark'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $picture = $_POST['picture'];

    // On prépare le tableau avec les erreurs
    $errors = [];

    // On vérifie le champ mark
    if (strlen($mark) < 2) {
        $errors['mark'] = 'Erreur marque';
        // echo 'Erreur mark';
    }

    // On vérifie le champ model
    if (strlen($model) < 2) {
        $errors['model'] = 'Erreur modele';
        // echo 'Erreur model';
    }
    // On vérifie le champ price
    if (strlen($price) < 2) {
        $errors['price'] = 'Erreur prix';
        // echo 'Erreur price';
    }

    // On vérifie le champ picture
    if (strlen($picture) < 2) {
        $errors['picture'] = 'Erreur image';
        // echo 'Erreur picture';
    }

    // On vérifie si le formulaire contient des erreurs
    if (empty($errors)) {
        echo json_encode(['success' => [
            'mark' => $mark,
            'model' => $model,
            'price' => $price,
            'picture' => $picture

       ]]); 
    } else {
        echo json_encode(['errors' => $errors]);
    }
}

// Connexion à la BDD
$db = new PDO('mysql:host=localhost;dbname=cars;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);


?>



    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    


</body>
</html>
