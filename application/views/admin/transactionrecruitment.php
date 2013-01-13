	<ul class="breadcrumb breadcrumb-medium">
	  <li><a href="#">TRANSACTION</a><span class="divider">/</span></li>
	  <li><a href="#">RECRUITMENT</a><span class="divider">/</span></li>
	  <li class="active" style="text-transform:capitalize"><?php if(isset($company))	echo $company ?></li>
	  <li class="pull-right span7 active">
		  <div class="pull-right row span">
			  <div class="span5"><label>Select Company :</label></div>
			  <div class="span6">
				  <select style="width:117%" id="agency">
					<option value='<?php echo base_url()."transaction/recruitment" ?>'>AGENCY</option>
					<?php
					for($i=0;$i<count($agency);$i++){
						if($id == $agency[$i][0]) {
							?>
								<option value='<?php echo base_url()."transaction/recruitment/".$agency[$i][0] ?>' selected><?php echo $agency[$i][1]." (".$agency[$i][2].")" ?></option>
							<?php
						}else{ 
							?>
								<option value='<?php echo base_url()."transaction/recruitment/".$agency[$i][0] ?>'><?php echo $agency[$i][1]." (".$agency[$i][2].")" ?></option>
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
	  <?php } ?>
	  
	  <script type="text/javascript" charset="utf-8">
		 $(function(){ 
			$('#data').dataTable({
				'bProcessing'		: true,
				'bServerSide'		: true,
				"sAjaxSource": "<?php echo site_url() ?>transaction/jsonp/2/<?php echo $id ?>",
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
			  
		</script>