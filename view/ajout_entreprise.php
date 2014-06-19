<?php include("successlist.php"); ?>
<h1 class="page-header">Ajouter une nouvelle entreprise</h1>

<?php include("errList.php"); ?>

<div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
	<form class="form-horizontal" method="post" action="" role="form">
		<div class="form-group">
			<label for="nom_entreprise" class="col-sm-2 control-label">Nom</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nom_entreprise" id="nom_entreprise" placeholder="Nom" required autofocus>
			</div>
		</div>
		
		<div class="form-group">
			<label for="type" class="col-sm-2 control-label">Fonction</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="type" id="type" placeholder="Fonction" required>
			</div>
		</div>
	
		<div class="form-group text-right">
		<button type="submit" class="btn btn-primary">Ajouter</button>
		</div>
	</form>
</div>
