<h1>Liste de vos locations</h1>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID Location</th>
				<th>voiture</th>
				<th>Date début</th>
				<th>Date fin</th>
				<th>Etat</th>
			</tr>
		</thead>
		<tbody>
				<?php foreach($locations as $location) { ?>
					<tr>
						<form class="form" method="post" action="" role="form">
							<td>
								<input type="text" class="form" name="id location" id="id location" value="<?php echo $location['id location']; ?>" >
							</td>
							<td>
								<input type="text" class="form" name="voiture" id="voiture" value="<?php echo $location['voiture']; ?>" >
							</td>
							<td>
								<input type="datetime" class="form" name="date debut" id="date debut" value="<?php echo $location['date debut']; ?>" >
							</td>
							<td>
								<input type="datetime" class="form" name="date fin" id="date fin" value="<?php echo $location['date fin']; ?>" >
							</td>
							<td>
								<input type="text" class="form" name="etat" id="etat" value="<?php echo $location['etat']; ?>" >
							</td>
							<td class="col-xs-2 text-right">
								<div class="btn-group-vertical">
									<button name="modification" class="btn  btn-primary " type="submit">Modification</button>
									<button name="suppression" class="btn  btn-primary  " type="submit">Suppression</button>
									<button name="validation" class="btn  btn-primary " type="submit">Validation</button>
								</div>
							</td>
						</form>
					</tr>
				<?php } ?>
		</tbody>
	</table>
</div>
	