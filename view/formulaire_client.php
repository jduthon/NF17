<div class="col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
	<form role="form">
		<h2 class="form-signin-heading">Inscription</h2>
	  <div class="form-group">
		<label for="InputNom">Nom</label>
		<input type="text" class="form-control" id="InputNom" >
	  </div>
	   <div class="form-group">
		<label for="InputPrenom">Prenom</label>
		<input type="text" class="form-control" id="InputPrenom" >
	  </div>
	  <div class="form-group">
		<label for="InputAdresse">Adresse</label>
		<textarea type="text" class="form-control" id="InputAdresse" rows="3"></textarea>
	  </div>
		<div class="form-group">
		<label for="InputVille">Ville</label>
		<input type="text" class="form-control" id="InputVille">
	  </div>
	</form>
	  
	<form class="form-inline" role="form">
		<div class="form-group">
			<label for="InputDay">Jour</label>
			<input type="number" min="01" max="31" step="2" value="01" required>
		</div>
		<div class="form-group">
			 <label for="InputMonth">Mois</label>
			<input type="number" min="01" max="12" step="2" value="01" required>
		</div>
		<div class="form-group">
			<label for="InputYear">Année</label>
			<input type="number" min="1960" max="2010" step="2" value="2014" required>
		</div>
	</form>
	  
	<form role="form"> 
	   <div class="form-group">
		<label for="InputTel">Telephone</label>
		<input type="text" class="form-control" id="InputTel" >
	  </div>
		<div class="form-group">
			<label for="InputPermis">Numéro de Permis</label>
			<input type="text" class="form-control" id="InputTel" >
	  </div>
	   <div class="form-group">
	  <button type="submit" class="btn btn-default">S'enregistrer</button>
	  </div>
	</form>
	
	
	
	<!-- A afficher si client pro. --> 
			<!--<div class="form-group">
				<label for="InputEntreprise">Nom Entreprise</label>
				<input type="text" class="form-control" id="InputEntreprise" >
			</div>-->
		</form>
</div>