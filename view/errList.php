<?php if(isset($errs) || isset($err)){ 
	if(isset($err)){
		$errs=$err;
	}
	if(!is_array($errs))
		$errs=array($err);
?>
	<div class="alert alert-danger alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <?php foreach($errs as $err){
			echo "<strong>Warning!</strong> ";
			echo $err;
		}?>
	</div>
<?php } ?>