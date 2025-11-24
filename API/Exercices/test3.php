<?php

if($_SERVER['HTTP_AUTHORIZATION'] == "FuUKEGgGzIifArjDyAo4eYsRO") {
    $array = array(
        "texte" => "Bravo, ton appel est bien sécurisé"
    );
} else {
    $array = array(
        "texte" => "Ptdr t'es qui ?"
    );
}
echo json_encode($_SERVER);