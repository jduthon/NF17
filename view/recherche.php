<h1 >Résultats de la recherche</h1>


<h2 class="page-header">Recherche</h2>

<section class="row">
	<?php include 'formulaire_recherche.php'; ?>
</section>

<h2 class="page-header">Résultats</h2>
	<section class="row">
		<?php if($vehicules!==null) { 
					include 'liste_vehicules.php'; 
				} else { 
					echo "Aucun résultat ne correspond à votre recherche";
				}
		?>
	</section>
