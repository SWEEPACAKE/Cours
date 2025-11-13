<?php

/**
 * Chaîne d'appels : niveau1() -> niveau2() -> niveau3() -> non_existent_function()
 * L'appel à non_existent_function déclenchera une erreur fatale (Uncaught Error)
 * et XDebug affichera la Call Stack avec les différentes frames.
 */

function niveau1() {
    niveau2();
}

function niveau2() {
    niveau3();
}

function niveau3() {
    non_existent_function('déclencheur');
}

// Appel principal : déclenche la Call Stack
niveau1();

/* 
   Notes :
   - Pour tester d'autres traces, remplacez l'appel ci‑dessus par une TypeError volontaire :
         function expectInt(int $n) { return $n + 1; }
         expectInt("chaine");
     (la TypeError produit aussi une stack trace exploitable par XDebug)
   - Ne pas catcher l'erreur : elle doit rester non capturée pour que XDebug affiche la Call Stack.
*/
?>