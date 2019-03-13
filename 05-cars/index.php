<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cars</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>


<ul></ul>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script>

    $(document).ready(function (){

        $.ajax({
            type: 'POST',
            url: "cars.php",
            dataType: "json"
            
        }).done(function(cars){
            var liste = $("ul")[0];
            $.each(cars, function(id, val){
                var li = $("<li></li>").html(val.brand+" "+val.model+ "<br>"+val.price +"€");
                li.appendTo(liste);
               
            })

        });  
    });




</script>


</body>
</html>