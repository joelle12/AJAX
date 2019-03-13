<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Tchat Webforce</title>
  </head>
  <body>
    <div class="container">
        <h1>Tchat Webforce</h1>

        <div id="messages"></div>

        <form class="mt-5" action="./message.php" method="post">
            <div class="row">
                <div class="col-md-10">
                    <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Votre pseudo">
                    <textarea name="message" id="message" class="form-control" placeholder="Votre message"></textarea>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary btn-block">Envoyer</button>
                </div>
            </div>
        </form>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="app.js"></script>
  </body>
</html>
