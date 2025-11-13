<?php
/**
 * Fichier de test pour produire une Call Stack importante avec XDebug.
 * Exécutez ce script avec XDebug activé (CLI ou serveur) pour voir la pile d'appels.
 */

function niveau1() { niveau2(); }
function niveau2() { niveau3(); }
function niveau3() { niveau4(); }
function niveau4() { niveau5(); }
function niveau5() { niveau6(); }
function niveau6() { niveau7(); }
function niveau7() { niveau8(); }
function niveau8() { niveau9(); }
function niveau9() { niveau10(); }

function niveau10() {
    // Passe dans une classe (méthodes non publiques incluses dans la stack)
    $p = new Processus();
    $p->etapePublique();
}

class Processus {
    public function etapePublique() {
        $this->etapeInterne();
    }

    private function etapeInterne() {
        $this->etapePrivee(42);
    }

    private function etapePrivee($val) {
        helperA($val);
    }
}

function helperA($v) { helperB($v + 1); }
function helperB($v) { helperC($v + 1); }
function helperC($v) { helperD($v + 1); }
function helperD($v) {
    echo "Mon chiffre est : " . $test;
}

// Démarrage : lance la chaîne d'appels (provoque l'erreur non capturée)
niveau1();