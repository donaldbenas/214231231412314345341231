<table class="table table-condensed table-hover table-bordered table-striped">
	<tr>
		<th>COMPANY NAME</th>
		<th width="300px"><button type="button" onclick="window.location.href='<?php echo base_url()."employer/add" ?>'" class="btn"><i class="icon-plus"></i> Add New Employer</button></th>
	</tr>
	<?php foreach($employers as $rows){ ?>
	<tr>
		<td><?php echo $rows->company ?></td>
		<td>
			<button type="button" onclick="window.location.href='<?php echo base_url()."employer/edit/".$rows->id ?>'" class="btn btn-warning"><i class="icon-edit icon-white"></i> Edit</button>
			<button type="button" onclick="window.location.href='<?php echo base_url()."employer/manage/".$rows->id ?>'" class="btn btn-primary"><i class="icon-cog icon-white"></i> Manage</button>
			<button type="button" onclick="window.location.href='<?php echo base_url()."employer/delete/".$rows->id ?>'" class="btn btn-danger"><i class="icon-trash icon-white"></i> Delete</button>
		</td>
	</tr>
	<?php } ?>
</table>
