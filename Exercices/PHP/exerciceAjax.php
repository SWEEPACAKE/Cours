<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Debuging</title>
    </head>
    <body style="text-align: center;">
        <select id="familleFruits" name="familleFruits">
            <option value="">Choisissez une famille de fruits</option>
            <option value="Agrumes">Agrumes</option>
            <option value="Fruits rouges">Fruits rouges</option>
        </select>

        <div id="afficherFruits">

        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $("#familleFruits").on('change', function() {
                $.ajax({
                    method: 'POST', 
                    url: '/ajax/listeFruits.ajax.php',
                    data: { familleFruits: $(this).val() },
                    success: function(response) {
                        var tableau = JSON.parse(response);
                        $('#afficherFruits').html(tableau.join(', '));
                    }
                })
            });
        </script>
    </body>
</html>