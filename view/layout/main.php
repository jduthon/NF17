<!DOCTYPE html>

<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<title>NF17</title>

		<link rel="shortcut icon" href="<?php echo $_images; ?>/favicon.png">
		<link rel="apple-touch-icon" href="<?php echo $_images; ?>/apple-touch-icon.png">
		<link rel="stylesheet" href="<?php echo $_css; ?>/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $_css; ?>/style.css">
		<link rel="stylesheet" href="<?php echo $_css; ?>/bootstrap-datepicker.css">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<?php include 'nav.php'; ?>
		
		<div class="container">
			<?php include $_view; ?>
		</div>
		
		<?php include 'footer.php'; ?>
		
		
		<script src="<?php echo $_js; ?>/jquery-2.1.1.js"></script>
		<script src="<?php echo $_js; ?>/bootstrap.min.js"></script>
		<script src="<?php echo $_js; ?>/bootstrap-datepicker.js"></script>
		<script src="<?php echo $_js; ?>/locales/bootstrap-datepicker.fr.js" charset="UTF-8"></script>
		<script>
		$('.input-group.date').datepicker({
			format: "dd/mm/yyyy",
			todayBtn: "linked",
			language: "fr",
			autoclose: true,
			todayHighlight: true
		});
		</script
	</body>
</html>
