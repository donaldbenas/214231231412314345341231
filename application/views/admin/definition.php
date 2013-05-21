<div class="row-fluid">
	<legend>Applicant Form</legend>
	<div class="definition-container">
		<label class="head">Position</label>
		<form>
			<?php foreach($position as $rows) { ?>
			<div class="form form-inline definition-form">
				<input type="text" disabled name="position[]" value="<?php echo $rows['value'] ?>">
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
				<button type="button" class="btn"><i class="icon-plus"></i> Add</button>
				<button type="button" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</div>
		</form>
	</div>
	<div class="definition-container">
		<label class="head">Nationality</label>
		<form>
			<?php foreach($nationality as $rows) { ?>
			<div class="form form-inline definition-form">
				<input type="text" disabled name="nationality[]" value="<?php echo $rows['value'] ?>">
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
				<button type="button" class="btn"><i class="icon-plus"></i> Add</button>
				<button type="button" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</div>
		</form>
	</div>
	<div class="definition-container">
		<label class="head">Reason of Leaving</label>
		<form>
			<?php foreach($reason as $rows) { ?>
			<div class="form form-inline definition-form">
				<input type="text" disabled name="reason[]" value="<?php echo $rows['value'] ?>">
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
				<button type="button" class="btn"><i class="icon-plus"></i> Add</button>
				<button type="button" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</div>
		</form>
	</div>
	<div class="definition-container">
		<label class="head">Country</label>
		<form>
			<?php foreach($country as $rows) { ?>
			<div class="form form-inline definition-form">
				<input type="text" disabled name="country[]" value="<?php echo $rows['value'] ?>">
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
				<button type="button" class="btn"><i class="icon-plus"></i> Add</button>
				<button type="button" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</div>
		</form>
	</div>
	<div class="definition-container">
		<label class="head">Religion</label>
		<form>
			<?php foreach($religion as $rows) { ?>
			<div class="form form-inline definition-form">
				<input type="text" disabled name="religion[]" value="<?php echo $rows['value'] ?>">
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
				<button type="button" class="btn"><i class="icon-plus"></i> Add</button>
				<button type="button" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</div>
		</form>
	</div>
	<div class="definition-container">
		<label class="head">Civil Status</label>
		<form>
			<?php foreach($civil as $rows) { ?>
			<div class="form form-inline definition-form">
				<input type="text" disabled name="civil[]" value="<?php echo $rows['value'] ?>">
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
				<button type="button" class="btn"><i class="icon-plus"></i> Add</button>
				<button type="button" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</div>
		</form>
	</div>
	<div class="definition-container">
		<label class="head">Document</label>
		<form>
			<?php foreach($req as $rows) { ?>
			<div class="form form-inline definition-form">
				<input type="text" disabled name="req[]" value="<?php echo $rows['value'] ?>">
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
				<button type="button" class="btn"><i class="icon-plus"></i> Add</button>
				<button type="button" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</div>
		</form>
	</div>
</div><br>

