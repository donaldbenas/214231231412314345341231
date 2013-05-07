	<ul class="breadcrumb breadcrumb-medium">
	  <li><a href="#">TRANSACTION</a><span class="divider"><i class="icon-play"></i></span></li>
	  <li class="active" >ARRIVING</li>
	  <li class="pull-right span7 active">
	     <div class="form-horizontal pull-right">
		  <div class="control-group">
			  <div class="control-label">
				  <label>Select Company :</label>
			  </div>
			  <div class="controls">
				  <select id="agency">
					<option value='<?php echo base_url()."transaction/arrival" ?>'>AGENCY</option>
					<?php
					for($i=0;$i<count($agency);$i++){
						if($id == $agency[$i][0]) {
							?>
								<option value='<?php echo base_url()."transaction/arrival/".$agency[$i][0] ?>' selected><?php echo $agency[$i][1]." (".$agency[$i][2].")" ?></option>
							<?php
						}else{ 
							?>
								<option value='<?php echo base_url()."transaction/arrival/".$agency[$i][0] ?>'><?php echo $agency[$i][1]." (".$agency[$i][2].")" ?></option>
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
 
	  
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Arrived Applicant</h3>
		  </div>
		  <div class="modal-body">
			<p id="modal-body-text"></p>
			<form method="post" name="rform" >
				<ul class="ecomment">
					<li><label><h5>Reasong of leaving:</h5> </label></li>
					<li>
						<select name="reason" style='width:300px'>
							<?php foreach($reason as $rows){?>
							<option value="<?php echo $rows['value'] ?>"><?php echo $rows['value'] ?></option>
							<?php }?>
						</select>
					</li>
					<li><label><h5>Date of Departure:</h5> </label></li>
					<li><input type="text" name="departure" id="inputDate"></li>
					<li><label><h5>Leave comments here:</h5> </label></li>
					<li><textarea name="comment" required></textarea></li>
				</ul>
				<input type="text" name="erase" value="true" style="display:none">
				<input type="text" name="appid" id="appid" style="display:none">
				<input type="text" name="companyid" value="<?php echo $this->uri->segment(3) ?>" style="display:none">
			</form>
		  </div>
		  <div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			<button class="btn btn-primary" onclick="$('form[name=rform]').submit()">Arrived</button>
		  </div>
		</div>
	  <?php } ?>
	  
	  <script type="text/javascript" charset="utf-8">
		 $(function(){ 
			$('#data').dataTable({
				'bProcessing'		: true,
				'bServerSide'		: true,
				"sAjaxSource": "<?php echo site_url() ?>transaction/jsonp/5/<?php echo $id ?>",
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
				{ "sClass": "hideme", "bSearchable": false, "bSortable": false },
				{ "bVisible": true, "bSearchable": true, "bSortable": true },
				{ "bVisible": true, "bSearchable": true, "bSortable": true },
				{ "bVisible": true, "bSearchable": true, "bSortable": true },
				{ "bVisible": true, "bSearchable": true, "bSortable": true },
				{ "bVisible": true, "bSearchable": false, "bSortable": false },
				{ "sClass": "hideme", "bSearchable": false, "bSortable": false }
				]
			})
		  });
		  function erase(id,name){
			$('#modal-body-text').html("Do you wish to approve this applicant <b>"+name+"</b> and all data related to it?");
			$('#appid').attr("value",id);
		  }
		$(document).ready(function(){
			$('#inputDate').datepick({dateFormat: 'yyyy-mm-dd'});
		});
			  
		</script>
