<div class="row-fluid">
	<legend>Applicant Form</legend>
	<div class="definition-container">
		<label class="head">Position</label>
		<form name="position" method="post">		
			<div class="wrapper position">
				<?php foreach($position as $rows) { ?>
				<div class="form form-inline definition-form">
					<input type="text" disabled name="position[]" value="<?php echo $rows['value'] ?>">
					<label class="checkbox">
					  <input type="checkbox"> Remove
					</label>
				</div>
				<?php } ?>
				<div class="form form-inline definition-form">
					<input type="text" name="positionName[]">
					<button type="button" class="btn btn-danger" onclick="$(this).parent().remove()"><i class="icon-trash icon-white"></i> Remove</button>
				</div>
			</div>
			<div class="form form-inline definition-form">
				<button type="button" class="btn" onclick="add('position','positionName')"><i class="icon-plus"></i> Add</button>
				<button type="submit" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</div>
		</form>
	</div>
	<div class="definition-container">
		<label class="head">Nationality</label>
		<form name="nationality" method="post">	
			<div class="wrapper nationality">
				<?php foreach($nationality as $rows) { ?>
				<div class="form form-inline definition-form">
					<input type="text" disabled name="nationality[]" value="<?php echo $rows['value'] ?>">
					<label class="checkbox">
					  <input type="checkbox"> Remove
					</label>
				</div>
				<?php } ?>
				<div class="form form-inline definition-form">
					<input type="text" name="nationalityName[]">
					<button type="button" class="btn btn-danger" onclick="$(this).parent().remove()"><i class="icon-trash icon-white"></i> Remove</button>
				</div>
			</div>
			<div class="form form-inline definition-form">
				<button type="button" class="btn" onclick="add('nationality','nationalityName')"><i class="icon-plus"></i> Add</button>
				<button type="submit" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</div>
		</form>
	</div>
	<div class="definition-container">
		<label class="head">Reason of Leaving</label>
		<form name="reason" method="post">
			<div class="wrapper reason">
				<?php foreach($reason as $rows) { ?>
				<div class="form form-inline definition-form">
					<input type="text" disabled name="reason[]" value="<?php echo $rows['value'] ?>">
					<label class="checkbox">
					  <input type="checkbox"> Remove
					</label>
				</div>
				<?php } ?>
				<div class="form form-inline definition-form">
					<input type="text" name="reasonName[]">
					<button type="button" class="btn btn-danger" onclick="$(this).parent().remove()"><i class="icon-trash icon-white"></i> Remove</button>
				</div>
			</div>
			<div class="form form-inline definition-form">
				<button type="button" class="btn" onclick="add('reason','reasonName')"><i class="icon-plus"></i> Add</button>
				<button type="submit" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</div>
		</form>
	</div>
	<div class="definition-container">
		<label class="head">Country</label>
		<form name="country" method="post">
			<div class="wrapper country">
				<?php foreach($country as $rows) { ?>
				<div class="form form-inline definition-form">
					<input type="text" disabled name="country[]" value="<?php echo $rows['value'] ?>">
					<label class="checkbox">
					  <input type="checkbox"> Remove
					</label>
				</div>
				<?php } ?>
				<div class="form form-inline definition-form">
					<input type="text" name="countryName[]">
					<button type="button" class="btn btn-danger" onclick="$(this).parent().remove()"><i class="icon-trash icon-white"></i> Remove</button>
				</div>
			</div>
			<div class="form form-inline definition-form">
				<button type="button" class="btn" onclick="add('country','countryName')"><i class="icon-plus"></i> Add</button>
				<button type="submit" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</div>
		</form>
	</div>
	<div class="definition-container">
		<label class="head">Religion</label>
		<form name="religion" method="post">
			<div class="wrapper religion">
				<?php foreach($religion as $rows) { ?>
				<div class="form form-inline definition-form">
					<input type="text" disabled name="religion[]" value="<?php echo $rows['value'] ?>">
					<label class="checkbox">
					  <input type="checkbox"> Remove
					</label>
				</div>
				<?php } ?>
				<div class="form form-inline definition-form">
					<input type="text" name="religionName[]">
					<button type="button" class="btn btn-danger" onclick="$(this).parent().remove()"><i class="icon-trash icon-white"></i> Remove</button>
				</div>
			</div>
			<div class="form form-inline definition-form">
				<button type="button" class="btn" onclick="add('religion','religionName')"><i class="icon-plus"></i> Add</button>
				<button type="submit" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</div>
		</form>
	</div>
	<div class="definition-container">
		<label class="head">Civil Status</label>
		<form name="civil" method="post">
			<div class="wrapper civil">
				<?php foreach($civil as $rows) { ?>
				<div class="form form-inline definition-form">
					<input type="text" disabled name="civil[]" value="<?php echo $rows['value'] ?>">
					<label class="checkbox">
					  <input type="checkbox"> Remove
					</label>
				</div>
				<?php } ?>
				<div class="form form-inline definition-form">
					<input type="text" name="civilName[]">
					<button type="button" class="btn btn-danger" onclick="$(this).parent().remove()"><i class="icon-trash icon-white"></i> Remove</button>
				</div>
			</div>
			<div class="form form-inline definition-form">
				<button type="button" class="btn" onclick="add('civil','civilName')"><i class="icon-plus"></i> Add</button>
				<button type="submit" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</div>
		</form>
	</div>
	<div class="definition-container">
		<label class="head">Document</label>
		<form name="document" method="post">
			<div class="wrapper document">
				<?php foreach($req as $rows) { ?>
				<div class="form form-inline definition-form">
					<input type="text" disabled name="req[]" value="<?php echo $rows['value'] ?>">
					<label class="checkbox">
					  <input type="checkbox"> Remove
					</label>
				</div>
				<?php } ?>
				<div class="form form-inline definition-form">
					<input type="text" name="documentName[]">
					<button type="button" class="btn btn-danger" onclick="$(this).parent().remove()"><i class="icon-trash icon-white"></i> Remove</button>
				</div>
			</div>
			<div class="form form-inline definition-form">
				<button type="button" class="btn" onclick="add('document','documentName')"><i class="icon-plus"></i> Add</button>
				<button type="submit" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Save</button>
			</div>
		</form>
	</div>
</div><br>
<script>
	function add(div,name){
		$('.wrapper.'+div).append(''+
			'<div class="form form-inline definition-form">'+
				'<input type="text" name="'+name+'[]"> '+
				'<button type="button" class="btn btn-danger" onclick="$(this).parent().remove()"><i class="icon-trash icon-white"></i> Remove</button>'+
			'</div>');
	}
</script>
