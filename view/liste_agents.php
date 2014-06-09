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
			</tr>
		</thead>
		<tbody>
			<?php foreach($agents as $agent) { ?>
				<tr>
					<form class="form" method="post" action="" role="form">
						<td>
							<input type="text" class="form" name="identifiant" id="identifiant" value="<?php echo $agent['identifiant']; ?>" >
						</td>
						<td>
							<input type="text" class="form" name="fonction" id="fonction" value="<?php echo $agent['fonction']; ?>" >
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
	
