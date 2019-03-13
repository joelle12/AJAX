<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body>

    <?php
        $db = new PDO('mysql:host=localhost;dbname=cars;charset=utf8', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);

        $brand = null;
        $model = null;
        $price = null;
        $image = null;

        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $price = intval($_POST['price']);
            $image = $_FILES['image'];

            $errors = [];

            if (strlen($brand) <= 2) {
                $errors['brand'] = 'Marque invalide.';
            }

            if (strlen($model) <= 2) {
                $errors['model'] = 'Modèle invalide.';
            }

            if (!is_numeric($price) || $price < 1) {
                $errors['price'] = 'Prix invalide.';
            }

            if ($image['error'] !== 0) {
                $errors['image'] = 'Vous n\'avez pas ajouté d\'image.';
            }

            // L'image est un jpg, jpeg, png, gif
            if (!isset($errors['image'])) {
                $extension = pathinfo($image['name'])['extension']; // Renvoie l'extension du fichier uploadé

                if (!in_array(strtolower($extension), ['jpeg', 'jpg', 'png', 'gif'])) {
                    $errors['image'] = 'Image pas valide';
                }

                // if (!preg_match('/\.(jpg|jpeg|png|gif)$/mi', $extension)) {
                //     $errors['image'] = 'Image pas valide';
                // }
            }

            var_dump($errors);

            if (empty($errors)) {
                // On fait l'upload
                var_dump($image);
                $fileName = uniqid().'_'.$image['name'];
                move_uploaded_file($image['tmp_name'], __DIR__ . '/img/'.$fileName);

                // On peut faire la requête
                $query = $db->prepare('INSERT INTO cars (brand, model, price, image) VALUES (:brand, :model, :price, :image)');
                $query->bindValue(':brand', $brand);
                $query->bindValue(':model', $model);
                $query->bindValue(':price', $price);
                $query->bindValue(':image', $fileName);
                
                if ($query->execute()) {
                    echo '<div class="alert alert-success">
                        La voiture a été ajoutée!
                    </div>';
                }
            }
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="brand">Marque :</label>
                        <input type="text" name="brand" id="brand" class="form-control" value="<?= $brand; ?>">
                    </div>
                    <div class="form-group">
                        <label for="model">Modèle :</label>
                        <input type="text" name="model" id="model" class="form-control" value="<?= $model; ?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="text" name="price" id="price" class="form-control" value="<?= $price; ?>">
                    </div>
                    <div class="form-group">
                        <label for="image">Image :</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <button class="btn btn-primary btn-block">Envoyer</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>
    
        

    </script>
  </body>
</html>
