<?php $titre="Gestion des eleves - " .$eleve['nom'];?>
<?php ob_start(); ?>
<article>
<header>
<h1 class="nomeleve"><?= $eleve['nom'] ?></h1>
<h1 class="nomeleve"><?= $eleve['prenom'] ?></h1>
</header>
<p>CNE°<?= $eleve['cne'] ?></p>
<p><?= $eleve['photo'] ?></p>
<p>ETAT:<?= $eleve['etat'] ?></p>
</article>
<hr />
<header>
<h1 id="absence">Recapitulatif des absences de <?= $eleve['nom'] ?></h1>
</header>
<table><tr><th>MATIERE</th>
<th>DATE</th>
<th>NOMBRE_heure</th>
</tr>
<?php foreach ($absences as $absence): ?>
<tr>
<td><?php echo $absence["code_matiere"]; ?></td>
<td><time><?php echo $absence["date"]; ?></time></td>
<td><?php echo $absence["nombre_heure"]; ?></td>
</tr>
<?php endforeach; ?>
</table>
<h1 id="absence">Le total des absences par matiere de<?= $eleve['nom'] ?></h1>
<table>
<tr><th>MATIERE</th>
<th>TOTAL</th>
</tr>
<?php foreach ($Tabsences as $Tabsence): ?>
<tr>
<td><?php echo $Tabsence["code_matiere"]; ?></td>
<td><?php echo $Tabsence["sum(nombre_heure)"]; ?></td>
</tr>
<?php endforeach; ?>
</table>
<hr />
<h1 id="absence">TOTAL</h1>
<?php foreach ($Tabsencess as $Tabsence): ?>
<?php echo $Tabsence["sum(nombre_heure)"]; ?> Heure(s)
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>
