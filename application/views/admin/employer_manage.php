<div class="row-fluid">
	<legend>Emloyer's Requirement</legend>
	<div class="definition-employee clearfix">
		<div class="definition-container-employee">
			<label class="head">Job Order</label>
			<form>
				<?php if(!empty($job)) foreach($job as $rows){ ?>
				<div class="form form-inline definition-form">
					<input type="text" disabled value="<?php echo $rows->value?>">
					<label class="checkbox">
					  <input type="checkbox"> Remove
					</label>
				</div>
				<?php } ?>
				<div class="form form-inline definition-form">
					<input type="text">
					<button type="button" class="btn btn-danger"><i class="icon-trash icon-white"></i> Remove</button>
				</div>
				<div class="form form-inline definition-form">
					<div class="input-append">
					  <select id="appendedInput" id="position">
						<option>CHOOSE</option>
						<?php if(!empty($position)) foreach($position as $rows) { ?>
						<option value="<?php echo $rows['id'] ?>"><?php echo $rows['value'] ?></option>	
						<?php } ?>
					  </select>
					  <button type="button" class="btn"><i class="icon-plus"></i> Add</button>
					</div>							
				</div>
			    <button type="button" style="margin-left:5px;" class="btn" onclick="window.location.href='<?php echo base_url()."employer" ?>'"><i class="icon-backward"></i> Back</button>
				<button type="button" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</form>
		</div>
		<div class="definition-container-employee">
			<label class="head">Requirements</label>
			<form>
			<?php 
			if(!empty($requirements[0])){
			$requirement = explode(',',$requirements[0]['value']);
			foreach($requirement as $rows) { 
				foreach($req as $row) { 
					if($row['id']==$rows){
				?>
				<div class="form form-inline definition-form">
					<input type="text" disabled name="requirements[]" value="<?php echo $row['value'] ?>">
					<label class="checkbox">
					  <input type="checkbox"> Remove
					</label>
				</div>
			<?php 	}					
				}
			} 
			}?>
				<div class="form form-inline definition-form">
					<input type="text">
					<button type="button" class="btn btn-danger"><i class="icon-trash icon-white"></i> Remove</button>
				</div>
				<div class="form form-inline definition-form">
					<div class="input-append">
					  <select id="appendedInput">
						<option>CHOOSE</option>
						<?php foreach($req as $rows) { ?>
						<option value="<?php echo $rows['id'] ?>"><?php echo $rows['value'] ?></option>	
						<?php } ?>
					  </select>
					  </select>
					  <button type="button" class="btn"><i class="icon-plus"></i> Add</button>
					</div>					
				</div>
			    <button type="button" style="margin-left:5px;" class="btn" onclick="window.location.href='<?php echo base_url()."employer" ?>'"><i class="icon-backward"></i> Back</button>
				<button type="button" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</form>
		</div>
	</div>
</div>
