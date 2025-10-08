<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Debuging</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3">
                    <button type="button" class="btn btn-primary bonjour" data-personne="0">
                        Bonjour Personne N°1
                    </button>
                </div>
                <div class="col-12 col-md-3">
                    <button type="button" class="btn btn-primary bonjour" data-personne="1">
                        Bonjour Personne N°2
                    </button>
                </div>
                <div class="col-12 col-md-3">
                    <button type="button" class="btn btn-primary bonjour" data-personne="2">
                        Bonjour Personne N°3
                    </button>
                </div>
                <div class="col-12 col-md-3">
                    <button type="button" class="btn btn-primary bonjour" data-personne="3">
                        Bonjour Personne N°4
                    </button>
                </div>
            </div>
            <div id="afficherBonjour" class="text-center">
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <script>
            // ECRIVEZ ICI ET SEULEMENT ICI
            $(".bonjour").on('click', function() {
                $.ajax({
                    method: 'POST', 
                    url: '/ajax/bonjourPersonnes.ajax.php',
                    data: { personne: $(this).data('personne') },
                    success: function(response) {
                        var data = JSON.parse(response);
                        $('#afficherBonjour').html("Bonjour " + data);
                    }
                });
            });
        </script>
    </body>
</html>