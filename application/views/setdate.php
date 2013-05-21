<form class="form-horizontal" method="post">
	
	<div class="control-group">
		<label class="control-label" style="width:300px;margin-right:20px;text-align:left"><b>LASTNAME, FIRSTNAME</b></label>
		<div class="controls">
			<b>DATE</b>
		</div>
	</div>
	<?php 
		if(!empty($setdate)) 
		foreach($setdate as $field){ ?>
	<div class="control-group">
		<label class="control-label" style="width:300px;margin-right:20px;text-align:left"><?php echo $field->lastname.", ".$field->firstname?></label>
		<div class="controls">
			<input type="hidden" name="appid[]" value="<?php echo $field->appid ?>">
			<input type="text" name="setdate[]" data-mask="9999-99-99" placeholder="YYYY-MM-DD">
		</div>
	</div>
	<?php } ?>
	<div class="control-group">
		<label class="control-label" style="width:300px;margin-right:20px;text-align:left"><input type="submit" class="btn btn-success"></label>
		<div class="controls">
			
		</div>
	</div>
</form>
