<form role="form" method="post" action="recherche" id="recherche">
	<div class="row">
		<div class="form-group col-sm-4 barre">
			<h3>Date du départ</h3>
			
			<div>
				<label for="date_depart" class="control-label hidden-lg">Date</label>
				<div class="input-group date">
					<input type="text" class="form-control" name="date_depart" id="date_depart" value="<?php echo $date_depart; ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
		</div>
		
		<div class="form-group col-sm-4 barre">
			<h3>Date du retour</h3>
			
			<div>
				<label for="date_retour" class="control-label hidden-lg">Date</label>
				<div class="input-group date">
					<input type="text" class="form-control" name="date_retour" id="date_retour" value="<?php echo $date_retour; ?>"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
		</div>
		
		<div class="form-group col-sm-4">
			<h3>Catégorie du véhicule</h3>
			
			<label for="categorie" class="control-label sr-only">Catégorie</label>
			<select class="form-control" name="categorie" id="categorie">
				<?php foreach($categories as $cat) { ?>
					<option <?php echo ($cat->getnom_categorie() == $categorie) ? 'selected' : ''; ?>>
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