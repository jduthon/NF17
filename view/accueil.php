<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo"$_images/content.jpg"; ?>" alt="contents">
      <div class="carousel-caption">
			<h3> JOUISSANCE </h3>
			<p> Des milliers de clients satisfaits! </p>
      </div>
    </div>
    <div class="item">
      <img src="<?php echo"$_images/vehicules.jpg"; ?>" alt="contents">
      <div class="carousel-caption">
			<h3> PUISSANCE DANS TES MAINS </h3>
			<p> Des jolis véhicules qui font du bien à conduire! </p>
      </div>
    </div>
	<div class="item">
      <img src="<?php echo"$_images/agence.jpg"; ?>" alt="contents">
      <div class="carousel-caption">
			<h3> CREW DE QUALITE </h3>
			<p> Des agents qui feront tout pour vous faire plaisir! </p>
      </div>
    </div>
  </div>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

<div class="item active">
  <img src="..." alt="...">
  <div class="carousel-caption">
    <h3>...</h3>
    <p>...</p>
  </div>
</div>

<h1>Réservez un véhicule <br> 
<?php if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])) { ?> 
<small>Ou <a href="connexion">connectez-vous</a> pour modifier/annuler/valider une réservation</a></small></h1>
<?php } ?>



<h2 class="page-header">Recherche</h2>

<section class="row">
	<?php include 'formulaire_recherche.php'; ?>
</section>


<h2 class="page-header">Tous nos véhicules</h2>

<section class="row">
	<?php include 'liste_vehicules.php'; ?>
</section>