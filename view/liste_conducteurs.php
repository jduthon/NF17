<h1>Liste des conducteurs</h1>
	<div>
		<a href="ajout_conducteur" class="btn  btn-primary  type="submit">Ajout d'un conducteur</a>
	</div>


		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Numéro de permis</th>
				</tr>
			</thead>
			<tbody>
					<?php foreach($conducteurs as $conducteur) { ?>
						<tr>
							<form class="form" method="post" action="" role="form">
								<td>
									<input type="text" class="form" name="nom" id="nom" value="<?php echo $conducteur['nom']; ?>" >
								</td>
								<td>
									<input type="text" class="form" name="prenom" id="prenom" value="<?php echo $conducteur['prenom']; ?>" >
								</td>
								<td>
									<input type="text" class="form" name="Numéro de permis" id="Numéro de permis" value="<?php echo $conducteur['Numéro de permis']; ?>" >
								</td>
								<td class="col-xs-4 text-right">
									<div class="btn-group ">
										<button name="modification" class="btn  btn-primary " type="submit">Modification</button>
										<button name="suppression" class="btn  btn-primary  " type="submit">Suppression</button>
									</div>
								</td>
							</form>
						</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>
