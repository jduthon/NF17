<?php include("errList.php"); ?>
<section class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th class="sr_only col-sm-3 col-md-2">Image</th>
				<th class="col-sm-1">Catégorie</th>
				<th class="col-sm-2">Modèle</th>
				<th class="col-sm-2">Caractéristiques</th>
				<th class="col-sm-2">Options</th>
				<th class="col-sm-1 col-md-2">Prix</th>
				<th class="sr_only col-sm-1">Actions</th>
			</tr>
		</thead>
			
		<tbody>
			<?php foreach($vehicules as $vehicule) { ?>
				
				<?php include 'liste_vehicules_ligne.php'; ?>

			<?php } ?>
		</tbody>
	</table>
</section>