<?php
//renvoi la liste de tous les élèves
function geteleves(){
$bdd = getBdd();
$eleves = $bdd->query('select cne,nom,prenom,photo, etat from eleves');
return $eleves;
}
//Effectue la connexion à la BDD, instancie et renvoie l'objet PDO associé
function getBdd(){
$bdd = new PDO('mysql:host=localhost;dbname=ensat2;charset=utf8', 'root', ''
, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
return $bdd;
}
// modifie l'état d 'un élève
function activer($cneeleve){
$bdd=getBdd();
$eleve=geteleve($cneeleve);
if($eleve["etat"]=="true"){
$req=$bdd->prepare("update eleves set etat='false'
 where cne='".$cneeleve."'");
$req->execute();
}
else{
$req=$bdd-
>prepare("update eleves set etat='true' where cne='".$cneeleve."'");
$req->execute();
}
return $req;
}
//renvoie les informaions sur un élève
function geteleve($cneeleve){
$bdd=getBdd();
$eleve=$bdd->prepare('select cne,nom,prenom,photo,etat
from eleves where cne=?');
$eleve->execute(array($cneeleve));
if($eleve->rowCount() ==1)
return $eleve->fetch(); //accès à la première ligne du résultat
else
throw new Exception("Aucun eleve ne correspond a l identifiant '$cneeleve'");
}
// Renvoie la liste des absences associées à un élève
function getabsences($cneeleve){
$bdd=getBdd();
$absences=$bdd->prepare('select code_matiere,date,nombre_heure
from absence where cne=?');
$absences->execute(array($cneeleve));
return $absences;
}
//renvoie le total des absences par matière
function totalabsence($cneeleve){
$bdd=getBdd();
$Tabsences=$bdd->prepare('select code_matiere, sum(nombre_heure)
from absence where cne=? group by code_matiere');
$Tabsences->execute(array($cneeleve));
return $Tabsences;
}
//renvoie le total des absences
function totalabsences($cneeleve){
$bdd=getBdd();
$Tabsencess=$bdd->prepare('select sum(nombre_heure) from absence
where cne=?');
$Tabsencess->execute(array($cneeleve));
return $Tabsencess;
}