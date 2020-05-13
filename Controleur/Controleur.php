<?phprequire 'Modele/Modele.php';
// Affiche la liste de tous les élèves
function accueil() {
$eleves = geteleves();
require 'Vue/vueAccueil.php';
}
function activation($cneeleve){
$req=activer($cneeleve);
$eleves = geteleves();
require 'Vue/vueAccueil.php';
}
// Affiche les détails sur un élève
function eleve($cneeleve) {
$eleve = geteleve($cneeleve);
$absences=getabsences($cneeleve);
$Tabsences=totalabsence($cneeleve);
$Tabsencess=totalabsences($cneeleve);
require 'Vue/vueEleve.php';
}
// Affiche une erreur
function erreur($msgErreur) {
require 'Vue/vueErreur.php';
}