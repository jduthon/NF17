<?php include("errList.php"); ?>

	<div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
		<form class="form-horizontal" method="post" action="" role="form">
			<h2 class="page-header">Ajouter une nouvelle entreprise</h2>
				<div class="form-group">
					<label for="nom_entreprise" class="col-sm-2 control-label">Nom</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nom_entreprise" id="nom_entreprise" placeholder="nom" required autofocus>
					</div>
				</div>
				
				<div class="form-group">
					<label for="type" class="col-sm-2 control-label">Fonction</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="type" id="type" placeholder="fonction" required>
					</div>
				</div>
				
			
				<div class="form-group text-right">
				<button type="submit" class="btn btn-primary">Ajouter</button>
				</div>
			</div>
		</form>
	</div>
