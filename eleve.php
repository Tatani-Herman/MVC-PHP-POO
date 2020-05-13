<?php
require 'Modele.php';
try {
if(isset($_GET['cne'])){
// intval renvoie la vleur numérique du paramètre ou 0 en cas d'échec
$cne=intval($_GET['cne']);
if($cne!=0){
$eleve=geteleve($cne);
$absences=getabsences($cne);
$Tabsences=totalabsence($cneeleve);
$Tabsencess=totalabsences($cneeleve);
require 'vueEleve.php';
}
else
throw new Exception("Identifiant d eleve incorrect");
}
else
throw new Exception("Aucun identifiant d eleve");
}
catch (Exception $e){
$msgErreur=$e->getMessage();
require 'vueErreur.php';
}
