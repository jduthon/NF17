<h1>Réservez un véhicule <br> 
<?php if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])) { ?> 
<small>Ou <a href="connexion">connectez-vous</a> pour modifier/annuler/valider une réservation</a></small></h1>
<?php } ?>


<h2 class="page-header">Recherche</h2>

<section class="row">
	<?php include 'formulaire_recherche.php'; ?>
</section>


<h2 class="page-header">Tous nos véhicules</h2>

<section class="row">
	<?php include 'liste_vehicules.php'; ?>
</section>