<form role="form" method="post" action="recherche" id="recherche">
	<div class="row">
		<div class="form-group col-sm-4 barre">
			<h3>Date et heure du départ</h3>
			
			<div class="col-lg-8">
				<label for="date_depart" class="control-label hidden-lg">Date</label>
				<div class="input-group date">
					<input type="text" class="form-control" name="date_depart" id="date_depart" value="<?php echo $date_depart; ?>" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
			
			<div class="">
				<label for="heure_depart" class="control-label hidden-lg">Heure</label>
				<div class="input-group">
					<input type="number" class="form-control" name="heure_depart" id="heure_depart" min="0" max="23" step="1" value="9" value="<?php echo $heure_depart; ?>" required>
					<span class="input-group-addon">:00</span>
				</div>
			</div>
		</div>
		
		<div class="form-group col-sm-4 barre">
			<h3>Date et heure du retour</h3>
			
			<div class="col-lg-8">
				<label for="date_retour" class="control-label hidden-lg">Date</label>
				<div class="input-group date">
					<input type="text" class="form-control" name="date_retour" id="date_retour" value="<?php echo $date_retour; ?>" required><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
				</div>
			</div>
			
			<div class="">
				<label for="heure_retour" class="control-label hidden-lg">Heure</label>
				<div class="input-group">
					<input type="number" class="form-control" name="heure_retour" id="heure_retour" min="0" max="23" step="1" value="9" value="<?php echo $heure_retour; ?>" required>
					<span class="input-group-addon">:00</span>
				</div>
			</div>
		</div>
		
		<div class="form-group col-sm-4">
			<h3>Catégorie du véhicule</h3>
			
			<label for="categorie" class="control-label sr-only">Catégorie</label>
			<select class="form-control" name="categorie" id="categorie">
				<?php foreach($categories as $cat) { ?>
					<option selected="<?php echo ($cat == $categorie) ? true : false; ?>">
						<?php echo $cat; ?>
					</option>
				<?php } ?>
			</select>
		</div>
	</div>
	
	<div class="row text-right">
		<button type="submit" class="btn btn-lg btn-primary">Rechercher</button>
	</div>
</form>