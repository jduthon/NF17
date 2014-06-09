<h1>Liste des agents</h1>
	<div>
		<a href="ajout_agent" class="btn  btn-primary  type="submit">Ajout d'un agent</a>
	</div>


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
	
