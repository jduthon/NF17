<form role="form" method="post" action="recherche" id="recherche">
	<div class="row">
		<div class="form-group col-sm-4 barre">
			<h3>Date du départ</h3>
			
			<div>
				<label for="date_debut_loc" class="control-label hidden-lg">Date</label>
				<div class="input-group date">
					<input type="text" class="form-control" name="date_debut_loc" id="date_debut_loc" value="<?php echo $post['date_debut_loc']; ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
		</div>
		
		<div class="form-group col-sm-4 barre">
			<h3>Date du retour</h3>
			
			<div>
				<label for="date_fin_loc" class="control-label hidden-lg">Date</label>
				<div class="input-group date">
					<input type="text" class="form-control" name="date_fin_loc" id="date_fin_loc" value="<?php echo $post['date_fin_loc']; ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
		</div>
		
		<div class="form-group col-sm-4">
			<h3>Catégorie du véhicule</h3>
			
			<label for="categorie" class="control-label sr-only">Catégorie</label>
			<select class="form-control" name="categorie" id="categorie">
				<?php foreach($categories as $cat) { ?>
					<option <?php echo ($cat->getnom_categorie() == $post['categorie']) ? 'selected' : ''; ?>>
						<?php echo $cat->getnom_categorie(); ?>
					</option>
				<?php } ?>
			</select>
		</div>
	</div>
	
	<div class="row text-right">
		<button type="submit" class="btn btn-lg btn-primary">Rechercher</button>
	</div>
</form>