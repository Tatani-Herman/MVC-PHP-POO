<?php
require 'Modele.php';
try{
$eleves = geteleves();
require 'vueAccueil.php';
}
catch (Exception $e) {
$msgErreur = $e->getMessage();
require 'vueErreur.php';}
