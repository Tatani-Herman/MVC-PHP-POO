<?php
require('Controleur/Controleur.php');
try {
if (isset($_GET['action'])) {
if ($_GET['action'] == 'eleve') {
if (isset($_GET['cneeleve'])) {
$cneeleve = intval($_GET['cneeleve']);
if ($cneeleve != 0)
eleve($cneeleve);
else
throw new Exception("Identifiant d eleve non valide");
}
else
throw new Exception("Identifiant d eleve non défini");
}
elseif ($_GET['action'] == 'activer'){
if (isset($_GET['cneeleve'])) {
$cneeleve = intval($_GET['cneeleve']);
if ($cneeleve != 0)
activation($cneeleve);
else
throw new Exception("Identifiant d eleve non valide");
}
else
throw new Exception("Identifiant d eleve non défini");
}
else
throw new Exception("Action non valide");
}
else {
accueil(); // action par défaut
} }
catch (Exception $e) {
erreur($e->getMessage());
}