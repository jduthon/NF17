<?php include("successlist.php"); ?>
<h1 class="page-header">Ajouter un nouvel agent</h1>

<?php if(isset($err)){ ?>
	<div class="alert alert-danger alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <strong>Warning!</strong> <?php echo $err; ?>
	</div>
<?php } ?>


<div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
	<form class="form-horizontal" method="post" action="" role="form">
		<div class="form-group">
			<label for="id_employe" class="col-sm-2 control-label">Identifiant</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="id_employe" id="id_employe" placeholder="Identifiant" required autofocus>
			</div>
		</div>
		
		
		<div class="form-group">
			<label for="function" class="col-sm-2 control-label">Fonction</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="function" id="function" placeholder="Fonction" required>
			</div>
		</div>
		
		<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Mot de passe</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
			</div>
		</div>
	
		<div class="form-group text-right">
		<button type="submit" class="btn btn-primary">Créer</button>
		</div>
	</form>
</div>
