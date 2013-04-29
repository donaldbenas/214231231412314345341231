<div class="row" id="report-form">
	<div class="span1" id="toggle"><div>SHOW</div></div>
	<div class="span9" id="generate" style="padding:20px;margin:right:20px">
		<form class="form form-horizontal" >
			<h2>Generate Report</h3> 
			<div class="control-group">
				<label class="control-label">Date</label>
				<div class="controls">
					<input type="text">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Status</label>
				<div class="controls">
					<select>
						<option>All</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<button type="submit" class="btn btn-primary"><i class="icon-filter icon-white"></i> Filter</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#toggle').click(function(){
			$('#generate').toggle();
		});
	});
</script>
