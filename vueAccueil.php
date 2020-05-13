<?php $titre = 'Gestion des eleves'; ?>
<?php ob_start(); ?><h1>Liste des élèves</h1>
<table>
<tr>
<th>CNE</th>
<th>Nom</th>
<th>Prénom</th>
<th>Photo</th>
<th>etat</th>
</tr>
<?php
foreach ($eleves as $eleve) {
$et="";
$lien="";
if($eleve["etat"]=="true") {
$et="active";
$lien="activer.php?cne=".$eleve["cne"]."&etat=false"; }
else {
$et="desactive";
$lien="activer.php?cne=".$eleve["cne"]."&etat=true"; }
?>
<tr>
<td><?php echo $eleve["cne"]; ?></td>
<td><?php echo $eleve["nom"]; ?></td>
<td><?php echo $eleve["prenom"]; ?></td>
<td><img height="30px" width="30px" src="<?php echo $eleve["photo"]; ?>"/>
</td>
<td><a href="<?php echo $lien; ?>"><?php echo $et; ?></a></td>
<td><a href ="<?= "eleve.php?cneeleve=".$eleve['cne'] ?>"><button type
='button'> Details</button></a></td>
</tr>
<?php
} ?>
</table>
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>
