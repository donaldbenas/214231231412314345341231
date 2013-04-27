	<ul class="breadcrumb breadcrumb-medium">
	  <li><a href="#">TRANSACTION</a><span class="divider"><i class="icon-play"></i></span></li>
	  <li class="active" >PROPOSE</li>
	  <li class="pull-right span7 active">
	     <div class="form-horizontal pull-right">
		  <div class="control-group">
			  <div class="control-label">
				  <label>Select Company :</label>
			  </div>
			  <div class="controls">
				  <select id="agency">
					<option value='<?php echo base_url()."transaction/propose" ?>'>AGENCY</option>
					<?php
					for($i=0;$i<count($agency);$i++){
						if($id == $agency[$i][0]) {
							?>
								<option value='<?php echo base_url()."transaction/propose/".$agency[$i][0] ?>' selected><?php echo $agency[$i][1] ?></option>
							<?php
						}else{ 
							?>
								<option value='<?php echo base_url()."transaction/propose/".$agency[$i][0] ?>'><?php echo $agency[$i][1] ?></option>
							<?php
						}
					}
					?>
				  </select>
				  <script type="text/javascript" charset="utf-8">
					$('#agency').bind("change keyup",function(){
						  window.location = $(this).val();
					});
				  </script>
			  </div>
		    </div>
		  </div>
	  </li>
	</ul>
	<?php if(isset($company)){ ?>
	<div class="container-fluid well">
		<table cellpadding="0" cellspacing="0" border="0" class="dsiplay" id="data">
			<thead>
				<tr>
					<th width="5%" style="text-align:center">ID</th>
					<th width="23%">First Name</th>
					<th width="22%">Last Name</th>
					<th width="48%">Position</th>
					<th style="width:10px"></th>
					<th style="width:10px"></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="6" class="dataTables_empty" style="font-weight:bold;padding:10px">Loading data from server...</td>
				</tr>
			</tbody>
		</table>
	  </div>
 
		<!-- Modal -->
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Propose Applicant</h3>
		  </div>
		  <div class="modal-body">
			<p id="modal-body-text"></p>
		  </div>
		  <div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button class="btn btn-primary">Propose</button>
		  </div>
		</div>
	  <?php } ?>
	  
	  <script type="text/javascript" charset="utf-8">
		 $(function(){ 
			$('#data').dataTable({
				'bProcessing'		: true,
				'bServerSide'		: true,
				"sAjaxSource": "<?php echo site_url() ?>transaction/jsonp/1",
				"fnServerData": function( sUrl, aoData, fnCallback, oSettings ) {
					oSettings.jqXHR = $.ajax( {
						"url": sUrl,
						"data": aoData,
						"success": fnCallback,
						"dataType": "jsonp",
						"cache": false
					} );
				},
				"sPaginationType": "full_numbers",
				"iDisplayLength": 10,
				"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"aaSorting": [[0, 'asc']],
				"fnDrawCallback"	: function(){
					$("#data").addClass('table well table-striped table-hover');
					$("#data_previous").html('&laquo;');
					$("#data_next").html('&raquo;');
				},
				"bStateSave"		: true,
				"aoColumns": [
				{ "bVisible": true, "bSearchable": true, "bSortable": true },
				{ "bVisible": true, "bSearchable": true, "bSortable": true },
				{ "bVisible": true, "bSearchable": true, "bSortable": true },
				{ "bVisible": true, "bSearchable": true, "bSortable": true },
				{ "bVisible": true, "bSearchable": false, "bSortable": false },
				{ "bVisible": true, "bSearchable": false, "bSortable": false }
				]
			})
		  }); 
		  function erase(id,name){
			$('#modal-body-text').html("Do you wish to propose applicant <b>"+name+"</b> and all data related to it?");
			$('#modal-footer-delete').attr("href","<?php echo base_url()."clients/delete/" ?>"+id);
		  }
		  function view(id,name){
			$('#modal-body-text1').html("http:\\www.google.com");
			$('#modal-footer-delete1').attr("href","<?php echo base_url()."clients/delete/" ?>"+id);
		  }
		</script>
