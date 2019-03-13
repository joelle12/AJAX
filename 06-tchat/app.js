var form = $('form'); // Sélectionne le formulaire

form.on('submit', function (event) {
    event.preventDefault(); // On annule la redirection du formulaire

    // On récupère les données du formulaire
    var formData = form.serialize();

    // On exécute la requête AJAX
    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: formData // On passe les données à message.php
    }).done(function (response) {
        console.log(response);
        $('#messages').append(`
            <div class="media mt-5">
                <div class="media-body">
                    <h5>`+response.pseudo+` à `+response.date+` :</h5>
                    `+response.message+`
                </div>
                <img src="default-avatar.png" alt="`+response.pseudo+`">
            </div>
        `);
    });
});

// Récupère tous les messages quand on arrive sur le tchat
$.get('./list-message.php').done(function (messages) {
    for (message of messages) {
        $('#messages').append(`
            <div class="media mt-5">
                <div class="media-body">
                    <h5>`+message.pseudo+` à `+message.date+` :</h5>
                    `+message.message+`
                </div>
                <img src="default-avatar.png" alt="`+message.pseudo+`">
            </div>
        `);
    }
});
