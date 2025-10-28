<?php
/*********************************
 * 
 *          TROISIEME CONSIGNE
 *  
 *********************************/
// Nous allons créer la classe Acheteur. Un acheteur a un nom, prénom, un solde bancaire (une somme en euros) défini. 

// Inclure la classe ici

// Puis créer un acheteur et afficher son solde bancaire en face de son nom et prénom.

require 'classes/Acheteur.class.php';

$acheteur = new Acheteur("SAVOCA", "Nicolas", 10000000.50);

echo $acheteur->getPrenom() . " " . $acheteur->getNom() . " possède " . number_format($acheteur->getSolde(), 2, ",", " ") . "€ sur son compte";