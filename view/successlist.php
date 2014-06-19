<?php if(isset($success) || isset($succes)){ 
	if(isset($succes)){
		$success=$succes;
	}
	if(empty($success))
		$success=array();
	if(!is_array($success))
		$success=array($success);
?>
	<div class="alert-success">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	  <?php foreach($success as $success){
			echo "<strong>Success</strong> ";
			echo "<br/>";
			echo $success;
		}?>
	</div>
<?php }?>
