<h1>Liste des conducteurs</h1>

<div>
	<a href="inscription" class="btn btn-primary" role="button">Ajouter un conducteur</a>
</div>

<section class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Numéro de permis</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php if(isset($conducteurs)){ ?>
				<?php foreach($conducteurs as $conducteur) { ?>
					<tr>
						<form class="form" method="post" action="" role="form">
							<td>
								<input type="text" class="form-control" name="nom" id="nom" value="<?php echo $conducteur->getnom(); ?>" >
							</td>
							<td>
								<input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $conducteur->getprenom(); ?>" >
							</td>
							<td>
								<input type="text" class="form-control" name="numero_permis" id="numero_permis" value="<?php echo $conducteur->getnumero_permis(); ?>" >
							</td>
							<td class="col-xs-4 text-right">
								<div class="btn-group">
									<input type="hidden" name="id_conducteur" value="<?php $conducteur->getid_conducteur(); ?>" />
									<button name="modifier" class="btn btn-primary" type="submit">Modifier</button>
									<button name="supprimer" class="btn btn-primary" type="submit">Supprimer</button>
								</div>
							</td>
						</form>
					</tr>
				<?php }} ?>
		</tbody>
	</table>
</section>



<form class="form-horizontal" method="post" action="" role="form">
	<h2 class="page-header">Ajout d'un conducteur</h2>
	
	<?php?>
		<div class="form-group">
			<label for="nom" class="col-sm-2 control-label">Nom</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" required autofocus>
			</div>
		</div>
		
		<div class="form-group">
			<label for="prenom" class="col-sm-2 control-label">Prénom</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom" required autofocus>
			</div>
		</div>
	
	
	
		<div class="form-group">
			

					<label for="numero_permis" class="col-sm-3 control-label">Numéro de Permis</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="numero_permis" id="numero_permis" placeholder="Numéro de Permis" required autofocus>
					</div>
		</div>
			
<?php ?>
	
	
	
  
	<div class="form-group text-right">
		<button type="submit" class="btn btn-primary">Valider</button>
	</div>
	
</form>


