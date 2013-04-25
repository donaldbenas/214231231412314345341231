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
				<li><a tabindex="-1" href="<?php echo base_url() ?>transaction/recruitment">Recruitment</a></li>
				<li><a tabindex="-1" href="<?php echo base_url() ?>transaction/processing">Processing</a></li>
				<li><a tabindex="-1" href="<?php echo base_url() ?>transaction/departure">Departure</a></li>
				<li><a tabindex="-1" href="<?php echo base_url() ?>transaction/arrival">Arrival</a></li>
				<li><a tabindex="-1" href="#">Promote</a></li>
			  </ul>
			</li>
			<li class="dropdown">
			  <a href="<?php echo base_url() ?>admin/worker/add" id="drop2" role="button" class="dropdown-toggle">Report </a>
			</li>
			<li id="fat-menu" class="dropdown">
			  <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">Definition <b class="caret"></b></a>
			  <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
				<li><a tabindex="-1" href="#">Position</a></li>
				<li><a tabindex="-1" href="#">Nationality</a></li>
				<li><a tabindex="-1" href="#">Reason</a></li>
				<li><a tabindex="-1" href="#">Requirement</a></li>
				<li><a tabindex="-1" href="#">Country</a></li>
				<li class="divider"></li>
				<li><a tabindex="-1" href="#">Job Order</a></li>
				<li><a tabindex="-1" href="#">Requirement</a></li>
				<li><a tabindex="-1" href="#">Document</a></li>
				<li class="divider"></li>
				<li><a tabindex="-1" href="#">Job Post</a></li>
			  </ul>
			</li>
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

