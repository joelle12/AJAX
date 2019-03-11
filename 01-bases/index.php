<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>AJAX - Les bases</title>
</head>
<body>
    
<h1>Mon site</h1>

<script>
// on instancie le moteur AJAX 
var xhr = new XMLHttpRequest();

// On veut suivre l'évolution de la requête AJAX
xhr.addEventListener('readystatechange', function () {
    if (4 === xhr.readyState) {
        if (200 === xhr.status) {
            // on récupère la reponse HtTP
            console.log(xhr.response);
            document.getElementsByTagName('h1')[0].innerHTML = xhr.response;
        }
    }
});


// Exécute une requete HTTP
xhr.open('GET', './worker.php');
xhr.send();

/**
         * Exercice
         * 1. Ecouter l'événement au clic sur le bouton
         * 2. A chaque clic, on exécute une nouvelle requête AJAX sur le serveur
         * pour récupérer une nouvelle phrase et modifier le contenu du h1.
         */



</script>

<button type="button" id ='btn' class="btn">Primary</button>

<script>

var element = document.getElementById('btn');

element.addEventListener('click', function(){
    xhr.open('GET', './worker.php');
    xhr.send();
});
</script>



</body>
</html>