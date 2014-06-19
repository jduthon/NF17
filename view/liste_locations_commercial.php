<h1>Liste locations</h1>

<?php if(empty($locations)){ ?>
			<h3>Pas de locations non validees.</h3>
		
		<?php } else {?>
<section class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>id_loc</th>
			</tr>
		</thead>
		<tbody>
		
			<?php foreach($locations as $loc) { ?>
				<tr>
					<form class="form" method="post" action="" role="form">
						<td>
							<input type="text" class="form-control" name="id_loc" id="id_loc" value="<?php echo $loc->getid_location(); ?>" >
						</td>

						<td class="col-xs-4 text-right">
							<div class="btn-group">
								<button name="valider" class="btn btn-primary" type="submit">Valider</button>
								<button name="supprimer" class="btn btn-primary" type="submit">Supprimer</button>
							</div>
						</td>
					</form>
				</tr>
			<?php } ?>
		
		</tbody>
	</table>
</section>
<?php } ?>
