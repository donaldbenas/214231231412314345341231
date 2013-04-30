<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Pacific Ace Resources Inc.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="<?php echo base_url() ?>css/datatable.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>css/style.css" rel="stylesheet" type="text/css" />
	<style>
		.tab-content{
			overflow:hidden;
		}
		body {
			padding-top: 60px;
		}
		@media (max-width: 979px) {
			body {
				padding-top: 0px;
			}
		}
	</style>
	<script src="<?php echo base_url() ?>js/jquery.js"></script>
	<script src="<?php echo base_url() ?>js/jquery.maskedinput-1.3.js"></script>
	<script src="<?php echo base_url() ?>js/jquery.dataTables.js"></script>
	<script src="<?php echo base_url() ?>js/bootstrap.js"></script>
	<script src="<?php echo base_url() ?>js/jquery.validate.js"></script>
  </head>
  <body>
	<div class="row-fluid">
	  <div class="span2">
			  <table class="table table-bordered" style="background:white;margin-left:10px;position:fixed;width:15%;box-shadow: 0px 0px 2px #e2e2e2">
				<tr style="background:#282828;color:white;">
					<th colspan="2">DATA BANK</th>
				</tr>
				<tr class="info">
					<td><span>Applicant</span></td>
					<td><b><?php echo $applicant[0]->count ?></b></td>
				</tr>
				<tr>
					<td>Recruited</td>
					<td><b><?php echo $recruit[0]->count ?></b></td>
				</tr>
				<tr>
					<td>Proccesed</td>
					<td><b><?php echo $process[0]->count ?></b></td>
				</tr>
				<tr>
					<td>Departured</td>
					<td><b><?php echo $departure[0]->count ?></b></td>
				</tr>
				<tr>
					<td>Arrived</td>
					<td><b><?php echo $arrival[0]->count ?></b></td>
				</tr>
				<tr style="font-weight:bold"  class="warning">
					<td>Total</td>
					<td><b><?php echo ($arrival[0]->count+$recruit[0]->count+$process[0]->count+$departure[0]->count) ?></b></td>
				</tr>
			  </table>
	  </div>
	  <div class="span10">
