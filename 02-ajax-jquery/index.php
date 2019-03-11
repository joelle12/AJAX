<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<!-- src trouvé sur le site jquery.com, onglet download et clique droit sur le lien "downolaed the compressed, production jQuery 3.3.1 et copier l'adresse du lien " -->
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


 <script>
 $(document).ready(function (){
    // exécuter une requete AJAX avec Jquery
    $.get('../01-bases/worker.php').done(function(response){
        alert(response);
    }).fail(function (xhr){
        alert('la requete à echoué avec un status '+hr.status);
    });
 });
 </script>

</body>
</html>