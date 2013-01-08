	  <div class="accordion" id="accordion2">
		  <div class="accordion-group">
			<div class="accordion-heading">
			  <button class="accordion-toggle btn-primary" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne" style="width: 100%;">
				ADD NEW APPLICANT
			  </button>
			</div>
			<div id="collapseOne" class="accordion-body collapse in">
			  <div class="accordion-inner">
				<?php include(APPPATH.'views/admin/applicantAdd.php'); ?>
			  </div>
			</div>
		  </div>
		  <div class="accordion-group">
			<div class="accordion-heading">
			  <button class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" style="width: 100%;">
				SEARCH APPLICANT
			  </button>
			</div>
			<div id="collapseTwo" class="accordion-body collapse">
			  <div class="accordion-inner">
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
						<div class="row-fluid">
						</div>
				  </div>
			  </div>
			</div>
		  </div>
	  </div>
	  <hr>
	  
	  <script type="text/javascript" charset="utf-8">
		$(function(){
			$('#data').dataTable({
				'bProcessing'		: true,
				'bServerSide'		: true,
				"sAjaxSource": "<?php echo site_url() ?>admin/jsonp",
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
