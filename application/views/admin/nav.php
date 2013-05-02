	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
		<div class="container-fluid" style="width: auto;">
		  <a class="brand" href="#">Administrator</a>
		  <ul class="nav" role="navigation">
			<li class="dropdown">
			  <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Main <b class="caret"></b></a>
			  <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
				<li><a tabindex="-1" href="<?php echo base_url() ?>admin/worker/add">Applicant</a></li>
				<li><a tabindex="-1" href="">Employer</a></li>
				<li><a tabindex="-1" href="#">Agency</a></li>
			  </ul>
			</li>
			<li class="dropdown">
			  <a href="#" id="drop2" role="button" class="dropdown-toggle" data-toggle="dropdown">Transaction <b class="caret"></b></a>
			  <ul class="dropdown-menu" role="menu" aria-labelledby="drop2">
				<li><a tabindex="-1" href="<?php echo base_url() ?>transaction/propose">Propose</a></li>
				<li><a tabindex="-1" href="<?php echo base_url() ?>transaction/recruitment">Approve</a></li>
				<li><a tabindex="-1" href="<?php echo base_url() ?>transaction/processing">Process</a></li>
				<li><a tabindex="-1" href="<?php echo base_url() ?>transaction/departure">Departure</a></li>
				<li><a tabindex="-1" href="<?php echo base_url() ?>transaction/arrival">Arrival</a></li>
				<li><a tabindex="-1" href="#">Promote</a></li>
			  </ul>
			</li>
			<li><a href="<?php echo base_url() ?>report">Report </a></li>
			<li><a href="<?php echo base_url() ?>definition">Definition </a></li>

			<li id="fat-menu" class="dropdown">
			  <a href="#" id="drop4" role="button" class="dropdown-toggle" data-toggle="dropdown">Maintenance <b class="caret"></b></a>
			  <ul class="dropdown-menu" role="menu" aria-labelledby="drop4">
				<li><a tabindex="-1" href="#">Backup</a></li>
				<li><a tabindex="-1" href="#">Reindex action</a></li>
			  </ul>
			</li>
		  </ul>
		</div>
	  </div>
	</div> <!-- /navbar-example -->

