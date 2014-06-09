<h1>Liste des entreprises</h1>
	<div>
		<a href="ajout_entreprises" class="btn  btn-primary  type="submit">Ajout d'une entreprise</a>
	</div>


		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Fonction</th>
				</tr>
			</thead>
			<tbody>
					<?php foreach($entreprises as $entreprise) { ?>
						<tr>
							<form class="form" method="post" action="" role="form">
								<td>
									<input type="text" class="form" name="nom" id="nom" value="<?php echo $entreprise['nom']; ?>" >
								</td>
								<td>
									<input type="text" class="form" name="fonction" id="fonction" value="<?php echo $entreprise['fonction']; ?>" >
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
