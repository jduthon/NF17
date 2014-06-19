<?php if(isset($errs) || isset($err)){ 
	if(isset($err)){
		$errs=$err;
	}
	if(empty($errs))
		$errs=array();
	if(!is_array($errs))
		$errs=array($errs);
?>
	<div class="alert alert-danger alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <?php foreach($errs as $err){
			echo "<strong>Attention!</strong> ";
			echo "<br/>";
			echo $err;
		}?>
	</div>
<?php }?>