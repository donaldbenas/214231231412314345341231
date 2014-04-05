<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
</script>
<div class="row" id="report-form">
	<div id="generate" style="padding:20px;margin:right:20px">
		<form class="form form-horizontal" method="post">
			<h4>Generate Report</h4> 
			<div class="control-group">
				<label class="control-label">Date</label>
				<div class="controls">
					<input type="text" name="date" id="inputDate" <?php if($date!='') echo 'value="'.$date.'"'; ?>required>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Status</label>
				<div class="controls">
					<select name="status">
						<option value='1'>Applicant</option>
						<option value='2'>Proposed</option>
						<option value='3'>Approved</option>
						<option value='4'>Processed</option>
						<option value='5'>Departed</option>
						<option value='6'>Arrival</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Position</label>
				<div class="controls">
						<select name="position">
							<option value="0">All</option>
							<?php
								foreach($position as $arr){
									foreach($arr as $id => $val){
										if( $id == 'id') $ids = $val;
										if( $id == 'value') echo "<option value='".$ids."'>".ucfirst(strtolower($val))."</option>";
									}
								}
							?>
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
<?php if($status=='1'){ ?>
<legend style="width:100%;padding-top:20px;">Applicant</legend>
<div id="table_div" style="width:100%;height:inherit;padding:0px;margin:0px;;margin-top:10px;"></div>
<script>
	google.load('visualization', '1', {packages:['table']});
	google.setOnLoadCallback(drawTable);
	function drawTable() {
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Name');
		data.addColumn('string', 'Position');
		data.addColumn('string', 'Principal');
		data.addColumn('date' , 'Date');
		data.addRows([
		<?php foreach($report as $val => $rows){ ?>
					['<?php echo $rows->lastname.", ".$rows->firstname." ".substr($rows->middlename,0,1)."." ?>','<?php echo $rows->value ?>','Pacific Ace Resoureces', new Date('<?php echo date("F d, Y",strtotime($rows->added)) ?>')],
		<?php } ?>
		]);

		var table = new google.visualization.Table(document.getElementById('table_div'));
		table.draw(data, {showRowNumber: true});
	}      
</script>
<?php } ?>
<?php if($status=='2'){ ?>
<legend style="width:100%;padding-top:20px;">Proposed</legend>
<div id="table_div" style="width:100%;height:inherit;padding:0px;margin:0px;;margin-top:10px;"></div>
<script>
	google.load('visualization', '1', {packages:['table']});
	google.setOnLoadCallback(drawTable);
	function drawTable() {
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Name');
		data.addColumn('string', 'Position');
		data.addColumn('string', 'Principal');
		data.addColumn('date' , 'Date');
		data.addRows([
		<?php foreach($report as $val => $rows){ ?>
					['<?php echo $rows->lastname.", ".$rows->firstname." ".substr($rows->middlename,0,1)."." ?>','<?php echo $rows->value ?>','<?php echo $rows->company?>', new Date('<?php echo date("F d, Y",strtotime($rows->approve)) ?>')],
		<?php } ?>
		]);

		var table = new google.visualization.Table(document.getElementById('table_div'));
		table.draw(data, {showRowNumber: true});
	}      
</script>
<?php } ?>
<?php if($status=='3'){ ?>
<legend style="width:100%;padding-top:20px;">Approved</legend>
<div id="table_div" style="width:100%;height:inherit;padding:0px;margin:0px;;margin-top:10px;"></div>
<script>
	google.load('visualization', '1', {packages:['table']});
	google.setOnLoadCallback(drawTable);
	function drawTable() {
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Name');
		data.addColumn('string', 'Position');
		data.addColumn('string', 'Principal');
		data.addColumn('date' , 'Date');
		data.addRows([
		<?php foreach($report as $val => $rows){ ?>
					['<?php echo $rows->lastname.", ".$rows->firstname." ".substr($rows->middlename,0,1)."." ?>','<?php echo $rows->value ?>','<?php echo $rows->company ?>', new Date('<?php echo date("F d, Y",strtotime($rows->recruit)) ?>')],
		<?php } ?>
		]);

		var table = new google.visualization.Table(document.getElementById('table_div'));
		table.draw(data, {showRowNumber: true});
	}      
</script>
<?php } ?>
<?php if($status=='4'){ ?>
<legend style="width:100%;padding-top:20px;">Processed</legend>
<div id="table_div" style="width:100%;height:inherit;padding:0px;margin:0px;;margin-top:10px;"></div>
<script>
	google.load('visualization', '1', {packages:['table']});
	google.setOnLoadCallback(drawTable);
	function drawTable() {
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Name');
		data.addColumn('string', 'Position');
		data.addColumn('string', 'Principal');
		data.addColumn('date', 'Date');
		data.addRows([
		<?php foreach($report as $val => $rows){ ?>
					['<?php echo $rows->lastname.", ".$rows->firstname." ".substr($rows->middlename,0,1)."." ?>','<?php echo $rows->value ?>','<?php echo $rows->company?>', new Date('<?php echo date("F d, Y",strtotime($rows->process)) ?>')],
		<?php } ?>
		]);

		var table = new google.visualization.Table(document.getElementById('table_div'));
		table.draw(data, {showRowNumber: true});
	}      
</script>
<?php } ?>
<?php if($status=='5'){ ?>
<legend style="width:100%;padding-top:20px;">Departed</legend>
<div id="table_div" style="width:100%;height:inherit;padding:0px;margin:0px;;margin-top:10px;"></div>
<script>
	google.load('visualization', '1', {packages:['table']});
	google.setOnLoadCallback(drawTable);
	function drawTable() {
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Name');
		data.addColumn('string', 'Position');
		data.addColumn('string', 'Principal');
		data.addColumn('string', 'Destination');
		data.addColumn('date', 'Date');
		data.addRows([
		<?php foreach($report as $val => $rows){ ?>
					['<?php echo $rows->lastname.", ".$rows->firstname." ".substr($rows->middlename,0,1)."." ?>','<?php echo $rows->value ?>','<?php echo $rows->company?>','<?php if($rows->ddestination!='0') echo $rows->ddestination; ?>', new Date('<?php echo date("F d, Y",strtotime($rows->depart)) ?>')],
		<?php } ?>
		]);

		var table = new google.visualization.Table(document.getElementById('table_div'));
		table.draw(data, {showRowNumber: true});
	}      
</script>
<?php } ?>
<?php if($status=='6'){ ?>
<legend style="width:100%;padding-top:20px;">Arrived</legend>
<div id="table_div" style="width:100%;height:inherit;padding:0px;margin:0px;;margin-top:10px;"></div>
<script>
	google.load('visualization', '1', {packages:['table']});
	google.setOnLoadCallback(drawTable);
	function drawTable() {
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Name');
		data.addColumn('string', 'Position');
		data.addColumn('string', 'Principal');
		data.addColumn('string', 'Destination');
		data.addColumn('date' , 'Date');
		data.addRows([
		<?php foreach($report as $val => $rows){ ?>
					['<?php echo $rows->lastname.", ".$rows->firstname." ".substr($rows->middlename,0,1)."." ?>','<?php echo $rows->value ?>','<?php echo $rows->company?>','<?php echo 'Philippines'; ?>', new Date('<?php echo date("F d, Y",strtotime($rows->arrival)) ?>')],
		<?php } ?>
		]);

		var table = new google.visualization.Table(document.getElementById('table_div'));
		table.draw(data, {showRowNumber: true});
	}      
</script>

<?php } ?>
<script>	
	$(document).ready(function(){
		$('#inputDate').datepick({ 
			rangeSelect: true, 
			monthsToShow: 3, 
			showTrigger: '#calImg',
			dateFormat: 'yyyy-mm-dd'
		});
	});
</script>
