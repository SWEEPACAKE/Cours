<?php
$articles = array(
    array(
        "titre" => "Halloween",
        "description" => "Une fête qui fait très peur, et où on engraisse les fabricants de bonbons >:)",
        "image" => "https://picsum.photos/id/237/200/300"
    ),
    array(
        "titre" => "11 Novembre",
        "description" => "Signature de l'Armistice de la Première Guerre Mondiale, mettant fin aux combats",
        "image" => "https://picsum.photos/id/235/200/300"
    ),
    array(
        "titre" => "Saint Nicolas",
        "description" => "C'est le 6 décembre, oubliez pas ;) (vous serez en stage mais je peux vous filer mon PayPal)",
        "image" => "https://picsum.photos/id/244/200/300"
    ),
    array(
        "titre" => "Noël",
        "description" => "HO HO HO soyez sages sinon pas de cadeaux",
        "image" => "https://picsum.photos/id/235/200/300"
    ),
    array(
        "titre" => "Nouvel an",
        "description" => "Une nouvelle année, l'heure est aux bonnes résolutions !",
        "image" => "https://picsum.photos/id/235/200/300"
    )
);

// Exemple de div pour un article
/*
            <div class="article p-2">
                <img src="https://picsum.photos/id/235/200/300" class="img-fluid"/>
                <h3>Titre de l'article</h3>
                <p>Description de l'article'</p>
            </div>
*/
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Slick slider 2</title>
        <!-- Inclusion du CSS de Slick -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
        <!-- Inclusion de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    </head>
    <body class="bg-primary">
        <div class="container">
            <!-- Votre slider ici -->
            <div class="slider">
                <?php
                foreach($articles as $article) {
                    ?>
                    <div class="article text-center p-2">
                        <img src="<?= $article['image'] ?>" class="img-fluid mx-auto"/>
                        <h3><?= $article['titre'] ?></h3>
                        <p><?= $article['description'] ?></p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>


    
    <!-- Inclusion de jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <!-- Inclusion du JS de Slick -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <!-- Inclusion de Boostrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <script>
            // Votre script SLICK ici
            $(function() {
                $('.slider').slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    arrows: false,
                    autoplay: true,
                    autoplaySpeed: 500,
                    mobileFirst: true,
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 2,
                                arrows: true
                            }
                        }
                    ]
                });
            });
        </script>
    </body>
</html>