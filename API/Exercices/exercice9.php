<?php

// Consigne : Insérer un auteur dans la base de données du site bibliotheque.loc
$couleur = "";
$message = "";
if(!empty($_POST)) {
   $curl = curl_init("http://bibliotheque.loc/insertAuteur.php");
   curl_setopt($curl, CURLOPT_URL, "http://bibliotheque.loc/insertAuteur.php");
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

   //Vérif du certificat de l’appelant : On ne met ces lignes que pendant le dev !
   curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
   curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

   // Données 
   curl_setopt($curl, CURLOPT_POST, true);
   $data = array(
      "nom" => $_POST['nom'],
      "date_naissance" => $_POST['date_naissance'],
      "nationalite" => $_POST['nationalite'],
      "biographie" => $_POST['biographie']
   );
   curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

   // Headers
   $headers = array(
      "Authorization: FuUKEGgGzIifArjDyAo4eYsRO",
   );
   curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

   $resultat = curl_exec($curl);
   unset($curl);
   $maReponse = json_decode($resultat);
   $message = $maReponse->message;
   if($maReponse->success) {
      $couleur = "success";
   } else {
      $couleur = "danger";
   }
}
?>

<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Insert Auteur</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

   </head>
   <body>
      <h1 class="text-center">Ajout d'auteur</h1>
      <p class="text-center text-<?= $couleur ?>"><?= $message ?></p>
      <div class="container">
         <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
               <form action="" method="POST" class="bg-primary card p-4">
                  <div class="row">
                     <div class="col-6">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control my-2"/>
                     </div>
                     <div class="col-6">
                        <label for="date_naissance">Date de naissance</label>
                        <input type="date" name="date_naissance" id="date_naissance" class="form-control my-2"/>
                     </div>
                     <div class="col-12">
                        <label for="nationalite">Nationalité</label>
                        <input type="text" name="nationalite" id="nationalite" class="form-control my-2"/>
                     </div>
                  </div>
                  <label for="biographie">Biographie</label>
                  <textarea name="biographie" class="form-control my-2"></textarea>
                  
                  <button type="submit" class="btn btn-success">Envoyer</button>
               </form>
            </div>
         </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
   </body>
</html>