<h1>Liste des agents</h1>

<div>
	<a href="ajouter_agent" class="btn btn-primary" role="button">Ajouter un agent</a>
</div>

<section class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Identifiant</th>
				<th>Fonction</th>	
				<th>Agence</th>	
			</tr>
		</thead>
		<tbody>
			<?php foreach($agents as $agent) { ?>
				<tr>
					<form class="form" method="post" action="" role="form">
						<td>
							<input type="text" class="form" name="id_employe" id="id_employe" value="<?php echo $agent->getid_employe(); ?>" >
						</td>
						<td>
							<input type="text" class="form" name="function" id="function" value="<?php echo $agent->getfunction(); ?>" >
						</td>
						<td>
							<input type="text" class="form" name="nom_agence" id="nom_agence" value="<?php echo $agent->getnom_agence(); ?>" >
						</td>
						<td class="col-xs-4 text-right">
							<div class="btn-group">
								<button name="modifier" class="btn btn-primary" type="submit">Modifier</button>
								<button name="supprimer" class="btn btn-primary" type="submit">Supprimer</button>
							</div>
						</td>
					</form>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</section>
	
