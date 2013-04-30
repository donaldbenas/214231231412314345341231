<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
</script>
<div class="row" id="report-form">
	<div id="generate" style="padding:20px;margin:right:20px">
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
<div id="chart_div" style="width:90%;height:500px;padding:0px;margin:0px;margin-top:250px"></div>
<script>
	google.load("visualization", "1", {packages:["corechart"]});
	google.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = google.visualization.arrayToDataTable([
		  ['Month', 'Applicant', 'Proposed', 'Recruited', 'Proccesed', 'Departured', 'Arrived', 'Average'],
		  ['2013/01', 1000, 400, 400, 400, 400, 400, 400],
		  ['2013/02', 1170, 460, 400, 400, 400, 400, 400],
		  ['2013/03', 660, 1120, 400, 400, 400, 400, 400],
		  ['2013/04', 1030, 540, 400, 400, 400, 400, 400],
		  ['2013/05', 1170, 460, 400, 400, 400, 400, 400],
		  ['2013/06', 660, 1120, 400, 400, 400, 400, 400],
		  ['2013/07', 1030, 540, 400, 400, 400, 400, 400],
		  ['2013/08', 1170, 460, 400, 400, 400, 400, 400],
		  ['2013/09', 660, 1120, 400, 400, 400, 400, 400],
		  ['2013/10', 1030, 540, 400, 400, 400, 400, 400],
		  ['2013/11', 660, 1120, 400, 400, 400, 400, 400],
		  ['2013/12', 1030, 540, 400, 400, 400, 400, 400],
		]);

        var options = {
          title : 'Monthly Company Performance',
          vAxis: {title: "Cups"},
          hAxis: {title: "Month"},
          seriesType: "bars",
          series: {6: {type: "line"}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      google.setOnLoadCallback(drawVisualization);
      
</script>
<legend>Applicant</legend>
<table class="table table-bordered table-hover table-condensed">
<tr>
	<th>Date</th>
	<th>Name</th>
	<th>Position</th>
	<th>Address</th>
	<th>Mobile</th>
	<th>Email</th>
</tr>
</table>
<legend>Proposed</legend>
<table class="table table-bordered table-hover table-condensed">
<tr>
	<th>Date</th>
	<th>Name</th>
	<th>Position</th>
	<th>Address</th>
	<th>Mobile</th>
	<th>Email</th>
</tr>
</table>
<legend>Recruited</legend>
<table class="table table-bordered table-hover table-condensed">
<tr>
	<th>Date</th>
	<th>Name</th>
	<th>Position</th>
	<th>Address</th>
	<th>Mobile</th>
	<th>Email</th>
</tr>
</table>
<legend>Proccesed</legend>
<table class="table table-bordered table-hover table-condensed">
<tr>
	<th>Date</th>
	<th>Name</th>
	<th>Position</th>
	<th>Address</th>
	<th>Mobile</th>
	<th>Email</th>
</tr>
</table>
<legend>Departured</legend>
<table class="table table-bordered table-hover table-condensed">
<tr>
	<th>Date</th>
	<th>Name</th>
	<th>Position</th>
	<th>Address</th>
	<th>Mobile</th>
	<th>Email</th>
</tr>
</table>
<legend>Arrived</legend>
<table class="table table-bordered table-hover table-condensed">
<tr>
	<th>Date</th>
	<th>Name</th>
	<th>Position</th>
	<th>Address</th>
	<th>Mobile</th>
	<th>Email</th>
</tr>
</table>
