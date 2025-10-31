<!-- Tous les liens du CDN de Slick sont trouvables sur : https://kenwheeler.github.io/slick/
 En cliquant sur "Get it now" -->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Démo du slick-slider</title>
        <!-- Inclusion du CSS de Slick -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        <!-- Inclusion de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    </head>
    <body class="bg-primary">
        <div class="container">
            <div class="exemple-1 my-5">
                <img src="https://picsum.photos/400/250" class="mx-2 img-fluid"/>
                <img src="https://picsum.photos/400/250" class="mx-2 img-fluid"/>
                <img src="https://picsum.photos/400/250" class="mx-2 img-fluid"/>
                <img src="https://picsum.photos/400/250" class="mx-2 img-fluid"/>
                <img src="https://picsum.photos/400/250" class="mx-2 img-fluid"/>
            </div>
            <div class="exemple-2 my-5">
                <img src="https://picsum.photos/350/250" class="mx-2 img-fluid"/>
                <img src="https://picsum.photos/350/250" class="mx-2 img-fluid"/>
                <img src="https://picsum.photos/350/250" class="mx-2 img-fluid"/>
                <img src="https://picsum.photos/350/250" class="mx-2 img-fluid"/>
                <img src="https://picsum.photos/350/250" class="mx-2 img-fluid"/>
            </div>
        </div>
        <!-- Inclusion de jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <!-- Inclusion du JS de Slick -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <!-- Inclusion de Boostrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <script>
            $(function() {
                $('.exemple-1').slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: true
                });
                $('.exemple-2').slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    mobileFirst: true, // Les paramètres par défaut sont ceux de la résolution "mobile"
                    responsive: [ // Listing des paramètres à modifier selon le breakpoint
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2 // Une fois passé les 768px de large, on met 2 slides
                            }
                        },
                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToShow: 3 // Puis 3 slides une fois passé les 1280px
                            }
                        },
                    ]
                });
            });
        </script>
    </body>
</html>