<html>
	<head>
	</head>
	<body>
		<?php //echo "<pre>".print_r($localexperience,true)."</pre>"; ?>
		<?php if($this->uri->segment(4)!=''): ?>
		<button type="button" class="btn btn-success printThis"> <i class="icon icon-print icon-white"></i> Print</button>
		<?php endif; ?>
		<div id="print">	
			<style>
				body, span, div, table, tr, tbody, tfoot, td, hr { 
					-webkit-print-color-adjust: exact;
					font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
					 page-break-inside: avoid;
				}
				@media print { 
					html { width: 8.5in; height: 13in; } 
					body { margin: 0px; }
				}
				@page { size: legal; margin: 10mm .01mm; }
				body { margin: 10px;  }
				table{ border-collapse:collapse; }
				table tr td { border: 1px solid grey;font-size: 11px; padding-left:5px }
				.title{ text-align: center; background: #373535; color:white; border: 1px solid #373535; }
				.noborder { border:none }
			</style>
			<table style="width:100%; margin-bottom:10px;">
				<tr>
					<td class="noborder" style="width:50%"><img src="<?php echo base_url('img/logo.jpg') ?>"style="height:80px" /></td>
					<td class="noborder" style="width:50%;text-align:right; position:relative"><img src="<?php if(isset($uploadphoto[0]['appid'])) echo base_url()."documents/photos/".$uploadphoto[0]['appid'].".".$uploadphoto[0]['type']; ?>"style="width:100px;height:100px;position:absolute;right:0px;top:0px" /></td>
				</tr>
			</table>	
			<table style="width:100%">
				<tr><td class="noborder" style="width:33.33%">&nbsp;</td>
					<td class="title" style="width:33.33%;text-align:center;">APPLICATION FOR EMPLOYMENT</td>
					<td class="noborder"  style="width:33.33%">&nbsp;</td></tr>
				<tr><td class="noborder" >&nbsp;</td>
					<td class="title" style="text-align:center;">SKILLED WORKER</td>
					<td class="noborder" >&nbsp;</td></tr>
			</table>
			<table style="width:100%">
				<tr><td rowspan=2 style="width:25%" >POSITION APPLIED FOR</td>
					<td rowspan=2 style="width:25%"><?php
								foreach($position as $arr){
									if( $arr['id'] == $personalbackground['0']['position1'] ) echo ucwords($arr['value']);
								}
							?></td>
					<td style="width:25%">Recommended By</td></tr>
				<tr><td style="width:25%">&nbsp;</td></tr>
			</table>
			<table style="width:100%">
				<tr><td style="width:25%">1st Preference</td>
					<td style="width:25%"><?php echo ucwords($personalbackground['0']['prefer1']) ?></td>
					<td style="width:25%">2nd Preference</td>
					<td style="width:25%"><?php echo ucwords($personalbackground['0']['prefer2']) ?></td></tr>
				<tr><td style="width:25%">Salary Expected</td>
					<td style="width:25%"><?php echo ucwords($personalbackground['0']['salary1']) ?></td>
					<td style="width:25%">Salary Expected</td>
					<td style="width:25%"><?php echo ucwords($personalbackground['0']['salary2']) ?></td></tr>
			</table>
			<table style="width:100%">
				<tr><td colspan=7 class="title">PERSONAL DATA</td></tr>
				<tr><td style="width:70px">Last Name</td>
					<td style="width:120px"><?php echo $personalbackground['0']['lastname'] ?></td>
					<td colspan=2 style="text-align:center">Birth</td>
					<td style="">Sex</td>
					<td style=""><?php echo ($personalbackground['0']['gender']==1)? 'MALE' : 'FEMALE';  ?></td>
					<td style="width:50%">Passport No.: <?php echo ucwords($personalbackground['0']['passportNumber']) ?></td></tr>
				<tr><td style="">First Name</td>
					<td style=""><?php echo ucwords($personalbackground['0']['firstname']) ?></td>
					<td style="width:20px">Date</td>
					<td style=""><?php echo ucwords($personalbackground['0']['datebirth']) ?></td>
					<td style="">Height</td>
					<td style=""><?php echo ucwords($personalbackground['0']['height']) ?> CM</td>
					<td style="">Date & Place of Issue: <?php echo ucwords($personalbackground['0']['passportDetails']) ?></td></tr>
				<tr><td style="">Middle Name</td>
					<td style=""><?php echo ucwords($personalbackground['0']['middlename']) ?></td>
					<td style="">Place</td>
					<td style=""><?php echo ucwords($personalbackground['0']['placebirth']) ?></td>
					<td style="">Weight</td>
					<td style=""><?php echo ucwords($personalbackground['0']['weight']) ?> KG</td>
					<td style="">Status: <?php 
									foreach($civil as $arr){
										if( $arr['id'] == $personalbackground['0']['civilstatus'] ) echo ucwords($arr['value']);
									} ?></td></tr>
				<tr><td style="">Nick Name</td>
					<td style=""></td>
					<td style="">Age</td>
					<td style=""><?php 
						$birthDate = explode("-", $personalbackground['0']['datebirth']);
						echo (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
						? ((date("Y") - $birthDate[0]) - 1)
						: (date("Y") - $birthDate[0]));
					?>
					</td>
					<td style="">Marks</td>
					<td style=""><?php echo ucwords($personalbackground['0']['marks']) ?></td>
					<td style="">Religion: <?php 
									foreach($religion as $arr){
										if( $arr['id'] == $personalbackground['0']['religion'] ) echo ucwords($arr['value']);
									} ?></td></tr>
			</table>
			<table style="width:100%">
				<tr><td colspan=8 class="title">ADDRESS</td></tr>
				<tr><td colspan=4 style="width:50%">City Address</td>
					<td colspan=4 style="width:50%">Provincial Address</td></tr>
				<tr><td colspan=4 style="width:50%"><?php echo ucwords($personalbackground['0']['caddress']) ?></td>
					<td colspan=4 style="width:50%"><?php echo ucwords($personalbackground['0']['paddress']) ?></td></tr>
				<tr><td style="width:7%">Tel No.</td>
					<td style="width:15%"><?php echo ucwords($personalbackground['0']['cphone']) ?></td>
					<td style="width:13%">Email Add</td>
					<td style="width:15%"><?php echo $personalbackground['0']['email'] ?></td>
					<td style="width:7%">Tel No.</td>
					<td style="width:15%"><?php echo ucwords($personalbackground['0']['pphone']) ?></td>
					<td style="width:13%">Contact Person</td>
					<td style="width:15%">&nbsp;</td></tr>
			</table>
			<table style="width:100%">
				<tr><td colspan=8 class="title">EMERGENCY INFORMATION</td></tr>
				<tbody>
					<tr><td colspan=2 style="width:50%">Person Notify:  <?php echo ucwords($personalbackground['0']['notify']) ?></td>
						<td colspan=2 style="width:50%">Spouse Name: <?php echo ucwords($personalbackground['0']['spouse']) ?></td></tr>
					<tr><td colspan=2 style="width:50%">Address: <?php echo ucwords($personalbackground['0']['naddress']) ?></td>
						<td colspan=2 style="width:50%">Address: <?php echo ucwords($personalbackground['0']['saddress']) ?></td></tr>
					<tr><td style="width:25%">Tel No.: <?php echo ucwords($personalbackground['0']['nphone']) ?></td>
						<td style="width:25%">Mobile No.: <?php echo ucwords($personalbackground['0']['nmobile']) ?></td>
						<td style="width:25%">Tel No.: <?php echo ucwords($personalbackground['0']['sphone']) ?></td>
						<td style="width:25%">Mobile No.: <?php echo ucwords($personalbackground['0']['smobile']) ?></td></tr>
				</tbody>
			</table>
			<table style="width:100%">
				<tr><td colspan=8 class="title">EDUCATION</td></tr>
				<tr><td style="width:13%">LEVEL</td>
					<td style="width:50%">NAME OF SCHOOL</td>
					<td style="width:10%;text-align:center">Period</td>
					<td style=";text-align:center">Degree</td></tr>
				<tr><td style="">Elementary</td>
					<td style=""><?php echo ucwords($educationalbackground['0']['elementary']) ?></td>
					<td style=";text-align:center"><?php echo ucwords($educationalbackground['0']['eto'])." - ".ucwords($educationalbackground['0']['efrom']) ?></td>
					<td style=";text-align:center"><?php echo ucwords($educationalbackground['0']['ecourse'])?></td></tr>
				<tr><td style="">High School</td>
					<td style=""><?php echo ucwords($educationalbackground['0']['highschool']) ?></td>
					<td style=";text-align:center"><?php echo ucwords($educationalbackground['0']['hto'])." - ".ucwords($educationalbackground['0']['hfrom']) ?></td>
					<td style=";text-align:center"><?php echo ucwords($educationalbackground['0']['hcourse'])?></td></tr>
				<tr><td style="">College</td>
					<td style=""><?php echo ucwords($educationalbackground['0']['college']) ?></td>
					<td style=";text-align:center"><?php echo ucwords($educationalbackground['0']['cto'])." - ".ucwords($educationalbackground['0']['cfrom']) ?></td>
					<td style=";text-align:center"><?php echo ucwords($educationalbackground['0']['ccourse'])?></td></tr>
				<tr><td style="">Vocational Course</td>
					<td style=""><?php echo ucwords($educationalbackground['0']['vocational']) ?></td>
					<td style=";text-align:center"><?php echo ucwords($educationalbackground['0']['vto'])." - ".ucwords($educationalbackground['0']['vfrom']) ?></td>
					<td style=";text-align:center"><?php echo ucwords($educationalbackground['0']['vcourse'])?></td></tr>
				<tr><td style="">Post Graduate</td>
					<td style=""><?php echo ucwords($educationalbackground['0']['postgraduate']) ?></td>
					<td style=";text-align:center"><?php echo ucwords($educationalbackground['0']['pto'])." - ".ucwords($educationalbackground['0']['pfrom']) ?></td>
					<td style=";text-align:center"><?php echo ucwords($educationalbackground['0']['pcourse'])?></td></tr>
			</table>
			<table style="width:100%">
				<tr><td colspan=8 class="title">SPECIAL SKILLS</td></tr>
				<tr><td style="width:33.33%;text-align:center">Course / Seminar</td>
					<td style="width:33.33%;text-align:center">School or Training Center</td>
					<td style="width:33.33%;text-align:center">Period</td></tr>
				<?php if(empty($skillbackground)){ for($i=0;$i<4;$i++){?>
				<tr><td style="width:33.33%;text-align:center">&nbsp;</td>
					<td style="width:33.33%;text-align:center"></td>
					<td style="width:33.33%;text-align:center"></td></tr>
				<?php }}else{ foreach ($skillbackground as $arr ){ ?>
				<tr><td style="width:33.33%;text-align:center"><?php echo ucwords($arr['course']) ?> </td>
					<td style="width:33.33%;text-align:center"><?php echo ucwords($arr['school']) ?></td>
					<td style="width:33.33%;text-align:center"><?php echo ucwords($arr['startDate'].' - '.$arr['endDate']) ?></td></tr>
				<?php }for($i=count($skillbackground);$i<4;$i++){ ?>
				<tr><td style="width:12.5%;text-align:center">&nbsp;</td>
					<td style="width:12.5%;text-align:center"></td>
					<td style="width:12.5%;text-align:center"></td>
					<td style="width:12.5%;text-align:center"></td>
					<td style="width:12.5%;text-align:center"></td></tr>
				<?php }}?>
			</table>
			<table style="width:100%">
				<tr><td colspan=8 class="title">LOCAL EMPLOYMENT RECORD</td></tr>
				<tr><td style="width:12.5%;text-align:center">Name of Company</td>
					<td style="width:12.5%;text-align:center">Position</td>
					<td style="width:12.5%;text-align:center">Period</td>
					<td style="width:12.5%;text-align:center">Main Duties</td>
					<td style="width:12.5%;text-align:center">Reason for Leaving</td></tr>
				<?php if(empty($localexperience)){ for($i=0;$i<4;$i++){ ?>
				<tr><td style="width:12.5%;text-align:center">&nbsp;</td>
					<td style="width:12.5%;text-align:center"></td>
					<td style="width:12.5%;text-align:center"></td>
					<td style="width:12.5%;text-align:center"></td>
					<td style="width:12.5%;text-align:center"></td></tr>
				<?php }}else{ foreach ($localexperience as $arr ){ ?>
				<tr><td style="width:12.5%;text-align:center"><?php echo ucwords($arr['company']) ?></td>
					<td style="width:12.5%;text-align:center"><?php echo ucwords($arr['position']) ?></td>
					<td style="width:12.5%;text-align:center"><?php echo ucwords($arr['start'].' - '.$arr['end']) ?></td>
					<td style="width:12.5%;text-align:center"><?php echo ucwords($arr['main']) ?></td>
					<td style="width:12.5%;text-align:center"><?php echo ucwords($arr['reason']) ?></td></tr>
				<?php }for($i=count($localexperience);$i<4;$i++){ ?>
				<tr><td style="width:12.5%;text-align:center">&nbsp;</td>
					<td style="width:12.5%;text-align:center"></td>
					<td style="width:12.5%;text-align:center"></td>
					<td style="width:12.5%;text-align:center"></td>
					<td style="width:12.5%;text-align:center"></td></tr>
				<?php }}?>
			</table>
			<table style="width:100%">
				<tr><td colspan=8 class="title">ABROAD EMPLOYMENT RECORD</td></tr>
				<tr><td style="width:12.5%;text-align:center">Name of Company</td>
					<td style="width:12.5%;text-align:center">Position</td>
					<td style="width:12.5%;text-align:center">Period</td>
					<td style="width:12.5%;text-align:center">Main Duties</td>
					<td style="width:12.5%;text-align:center">Reason for Leaving</td></tr>
				<?php if(empty($abroadexperience)){ for($i=0;$i<4;$i++){ ?>
				<tr><td style="width:12.5%;text-align:center">&nbsp;</td>
					<td style="width:12.5%;text-align:center"></td>
					<td style="width:12.5%;text-align:center"></td>
					<td style="width:12.5%;text-align:center"></td>
					<td style="width:12.5%;text-align:center"></td></tr>
				<?php }}else{ foreach ($abroadexperience as $arr ){ ?>
				<tr><td style="width:12.5%;text-align:center"><?php echo ucwords($arr['company']) ?></td>
					<td style="width:12.5%;text-align:center"><?php echo ucwords($arr['position']) ?></td>
					<td style="width:12.5%;text-align:center"><?php echo ucwords($arr['start'].' - '.$arr['end']) ?></td>
					<td style="width:12.5%;text-align:center"><?php echo ucwords($arr['main']) ?></td>
					<td style="width:12.5%;text-align:center"><?php echo ucwords($arr['reason']) ?></td></tr>
				<?php } for($i=count($abroadexperience);$i<4;$i++){ ?>
				<tr><td style="width:12.5%;text-align:center">&nbsp;</td>
					<td style="width:12.5%;text-align:center"></td>
					<td style="width:12.5%;text-align:center"></td>
					<td style="width:12.5%;text-align:center"></td>
					<td style="width:12.5%;text-align:center"></td></tr>
				<?php }}?>
			</table>
			<div style="page-break-before:always;text-align:center">
			<?php foreach($attachments as $row){ ?>
				<img src="<?php echo base_url('upload/'.$row->name); ?>" style="max-width:700px" />
			<?php }?>
			</div>
		</div>
		<script>
		$('.printThis').click( function(){
			var myWindow = window.open('<?php echo base_url('admin/printing/'.$this->uri->segment(4)); ?>', 'Print_Page', 'scrollbars=yes');  
			myWindow.document.write($('#print').html());
			myWindow.document.close();
			myWindow.focus();
			myWindow.print();
			myWindow.close();
		});
		</script>
	</body>
</html>
