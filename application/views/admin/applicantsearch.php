	  <ul class="nav nav-pills">
		  <li><a href="<?php echo base_url()."admin/worker/add"?>">Add Applicant</a></li>
		  <li class="active"><a href="<?php echo base_url()."admin/worker/search"?>">Search Applicant</a></li>
	  </ul>
	  <div class="container-fluid well">
		<table cellpadding="0" cellspacing="0" border="0" class="dsiplay" id="data">
			<thead>
				<tr>
					<th width="5%" style="text-align:center">ID</th>
					<th width="5%" style="text-align:center">Status</th>
					<th width="23%">First Name</th>
					<th width="22%">Last Name</th>
					<th width="48%">Position</th>
					<th style="width:10px"></th>
					<th style="width:10px"></th>
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
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Applicant Delete</h3>
		  </div>
		  <div class="modal-body">
			<p>Do you want to delete <b><span id='deleteme'></span></b>!</p>
		  </div>
		  <div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<a class="btn btn-danger" id="deleteok">Delete</a>
		  </div>
		</div>
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
				{ "bVisible": true, "bSearchable": true, "bSortable": true },
				{ "bVisible": true, "bSearchable": false, "bSortable": false },
				{ "bVisible": true, "bSearchable": false, "bSortable": false },
				{ "bVisible": true, "bSearchable": false, "bSortable": false },
				{ "bVisible": true, "bSearchable": false, "bSortable": false }
				]
			});
		});
		function trash(id,name){
			$("#deleteme").html(name);
			$("#deleteok").attr('href','<?php echo base_url()."admin/worker/delete/"?>'+id);
		}
		</script>
