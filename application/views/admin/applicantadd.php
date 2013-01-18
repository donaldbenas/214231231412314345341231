<ul class="nav nav-pills">
  <li class="active"><a href="<?php echo base_url() ?>admin/worker/add">Add Applicant</a></li>
  <li><a href="<?php echo base_url() ?>admin/worker/search">Search Applicant</a></li>
  <li><a href="#">Print Applicant</a></li>
</ul>
<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#personal-background" id="pb"><h5>Personal Background</h5></a></li>
  <li><a href="#educational-background" id="eb"><h5>Educational Background</h5></a></li>
  <li><a href="#special-skill-background" id="sb"><h5>Special Skill Background</h5></a></li>
  <li><a href="#work-experience-background" id="wb"><h5>Work Experience Background</h5></a></li>
</ul>
<form method="post" name="myform" enctype="multipart/form-data" id="myform">
	<fieldset>
		<div class="container-fluid tab-content">
			<!--<h2>Personal Background</h2>-->
			<div class="container-fluid well tab-pane active" id="personal-background">
				<legend>Applicant Information</legend>
				<div class="row-fluid span">
					<div class="span2"><label>Upload Photo</label></div>
					<div class="span3">
						<div class="fileupload fileupload-new" data-provides="fileupload">
						  <div class="input-append">
							<div class="uneditable-input span2">
								<i class="icon-file fileupload-exists"></i> 
								<span class="fileupload-preview"></span>
							</div>
							<span class="btn btn-file">
								<span class="fileupload-new" onclick="$('#photo').click()">Select file</span>
								<span class="fileupload-exists" onclick="$('#photo').click()">Change</span>
								<input type="file" style="display:none" name="photo" id="photo"/>
							</span>
								<a href="#" class="btn fileupload-exists btn-danger" data-dismiss="fileupload">Remove</a>
						  </div>
						</div>
					</div>
					<div class="span2"><label>Date Apply</label></div> 
					<div class="span3">
						<select name="applyMonth" class="span3">
							<option>MM</option>
							<?php
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="applyDay"  class="span3">
							<option>DD</option>
							<?php
							for ($i = 1; $i < 32; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="applyYear"  class="span4">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					 </div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Applying for Position 1</label></div>
					<div class="span3">
						<select name="position1" class="span12">
							<option value="">Choose</option>
							<?php
								foreach($position as $arr){
									foreach($arr as $id => $val){
										if( $id == 'id') $ids = $val;
										if( $id == 'value') echo "<option value='".$ids."'>".ucfirst(strtolower($val))."</option>";
									}
								}
							?>
						</select>
					</div>
					<div class="span2"><label>Applying for Position 2</label></div>
					<div class="span3">
						<select name="position2" class="span12">
							<option value="">Choose</option>
							<?php
								foreach($position as $arr){
									foreach($arr as $id => $val){
										if( $id == 'id') $ids = $val;
										if( $id == 'value') echo "<option value='".$ids."'>".ucfirst(strtolower($val))."</option>";
									}
								}
							?>
						</select>
					</div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Reference</label></div>
					<div class="span3"><input type="text" name="reference1" class="span12"/></div>
					<div class="span2"><label>Reference</label></div>
					<div class="span3"><input type="text" name="reference2" class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Salary Expected</label></div>
					<div class="span3"><input type="text" name="salary1" class="span12"/></div>
					<div class="span2"><label>Salary Expected</label></div>
					<div class="span3"><input type="text" name="salary2" class="span12"/></div>
				</div>
				<legend>Personal Information</legend>
				<div class="row-fluid span">
					<div class="span2"><label class="required">Firt Name</label></div>
					<div class="span3"><input type="text" name="firstname" class="span12"/></div>
					<div class="span2"><label>Birth Date</label></div> 
					<div class="span3">
						<select name="birthMonth" class="span3">
							<option>MM</option>
							<?php
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="BirthDay"  class="span3">
							<option>DD</option>
							<?php
							for ($i = 1; $i < 32; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="BirthYear"  class="span4">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					 </div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label class="required">Middle Name</label></div>
					<div class="span3"><input type="text" name="middlename" class="span12"/></div>
					<div class="span2"><label>Birth Place</label></div>
					<div class="span3"><input type="text" name="municipality" placeholder="Town / Municipality	" class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label class="required">Last Name</label></div>
					<div class="span3"><input type="text" name="lastname" class="span12"/></div>
					<div class="span2"><label></label></div>
					<div class="span3"><input type="text" name="city" placeholder="City / Province" class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Email Address</label></div>
					<div class="span3"><input type="email" name="email" class="span12" id="email"/></div>
					<div class="span2"><label>Gender</label></div>
					<div class="span3">
						<select name="gender" class="span12">
							<option value="">Choose</option>
							<option>Male</option>
							<option>Female</option>
						</select>
					</div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Password</label></div>
					<div class="span3"><input type="password" name="password1" class="span12"/></div>
					<div class="span2"><label>Civil Status</label></div>
					<div class="span3">
						<select name="civil" class="span12">
							<option value="">Choose</option>
							<?php
								foreach($civil as $arr){
									foreach($arr as $id => $val){
										if( $id == 'id') $ids = $val;
										if( $id == 'value') echo "<option value='".$ids."'>".ucfirst(strtolower($val))."</option>";
									}
								}
							?>
						</select>
					</div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Repeat Password</label></div>
					<div class="span3"><input type="password" name="password2" class="span12"/></div>
					<div class="span2"><label>Nationality</label></div>
					<div class="span3">
						<select name="nationality" class="span12">
							<option value="">Choose</option>
							<?php
								foreach($nationality as $arr){
									foreach($arr as $id => $val){
										if( $id == 'id') $ids = $val;
										if( $id == 'value') echo "<option value='".$ids."'>".ucfirst(strtolower($val))."</option>";
									}
								}
							?>
						</select>
					</div>
				</div>
				<legend>Address Information</legend>
				<div class="row-fluid span">
					<div class="span2"><label>Current Address</label></div>
					<div class="span3"><input type="text" name="currentAddressMunicpality" placeholder="Town / Municipality" class="span12"/></div>
					<div class="span2"><label>Telephone Number</label></div>
					<div class="span3"><input type="text" name="currentTelephone" class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label></label></div>
					<div class="span3"><input type="text" name="currentAddressCity" placeholder="City / Province" class="span12"/></div>
					<div class="span2"><label>Mobile Number</label></div>
					<div class="span3"><input type="text" name="currentMobile" class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Permanent Address</label></div>
					<div class="span3"><input type="text" name="permanentAddressMunicpality" placeholder="Town / Municipality" class="span12"/></div>
					<div class="span2"><label>Telephone Number</label></div>
					<div class="span3"><input type="text" name="permanentTelephone" class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label></label></div>
					<div class="span3"><input type="text" name="permanentAddressCity" placeholder="City / Province" class="span12"/></div>
					<div class="span2"><label>Mobile Number</label></div>
					<div class="span3"><input type="text" name="permanentMobile" class="span12"/></div>
				</div>
				<legend>Other Information</legend>
				<div class="row-fluid span">
					<div class="span2"><label>Religion</label></div>
					<div class="span3">
						<select name="religion" class="span12">
							<option value="">Choose</option>
							<?php
								foreach($religion	 as $arr){
									foreach($arr as $id => $val){
										if( $id == 'id') $ids = $val;
										if( $id == 'value') echo "<option value='".$ids."'>".ucfirst(strtolower($val))."</option>";
									}
								}
							?>
						</select>
					</div>
					<div class="span2"><label>Philhealth Number</label></div>
					<div class="span3"><input type="text" name="philhealth" id="philhealth" class="span12" maxlength="14" placeholder="____-____-____"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Height</label></div>
					<div class="span3 input-prepend">
						<span class="add-on">CM</span>
						<input type="text" id="prependedInput"  name="height" class="span3" placeholder="Centimeter"/>
						<span class="add-on" style="margin-left:10px">CONVERTER</span>
						<input id="prependedInput" type="text"  class="span2" name="feet" placeholder="FT">
						<script>
							$(document).ready(function(){
									$("input[name=feet]").keyup(function () {
									  var eng =$(this).val();
									  var ans = eng.split("'");
									  if(ans[1]!=null) var inch = 30.48*(ans[1]/12);
									  else var inch=0;
									  if(ans[0]!=null) var feet = (ans[0]*30.48);
									  else var feet=0;
									  var conv = feet + inch;
									  $("input[name=height]").val(conv.toFixed(0));
									}).keyup()
							});
						</script>
					</div>
					<div class="span2"><label>SSS Number</label></div>
					<div class="span3"><input type="text" name="sss" id="sss" class="span12" maxlength="11" placeholder="___-__-____"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Weight</label></div>
					<div class="span3 input-prepend">
						<span class="add-on">KG</span>
						<input type="text" id="prependedInput"  name="weight" class="span3" placeholder="Kilogram"/>
						<span class="add-on" style="margin-left:10px">CONVERTER</span>
						<input id="prependedInput" type="text"  class="span2" name="lbs" placeholder="LBS">
						<script>
							$(document).ready(function(){
									$("input[name=lbs]").keyup(function () {
									  var ans =$(this).val();
									  var conv = ans*0.45359;
									  $("input[name=weight]").val(conv.toFixed(0));
									}).keyup()
							});
						</script>
					</div>
					<div class="span2"><label>TIN Number</label></div>
					<div class="span3"><input type="text" name="tin" id="tin" class="span12" maxlength="10" placeholder="__-_______"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Marks</label></div>
					<div class="span3"><input type="text" name="marks" class="span12"/></div>
					<div class="span2"><label>Pagibig Number</label></div>
					<div class="span3"><input type="text" name="pagibig" id="pagibig" class="span12" maxlength="14" placeholder="____-____-____"/></div>
				</div>
				<legend>Emergency Information</legend>
				<div class="row-fluid span">
					<div class="span2"><label>Person Noitfy</label></div>
					<div class="span3"><input type="text" name="emergencyNotify"class="span12"/></div>
					<div class="span2"><label>Spouse Name</label></div>
					<div class="span3"><input type="text" name="spouseName" class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Address</label></div>
					<div class="span3"><input type="text" name="emergencyMunicipalityAddress" class="span12" placeholder="Town / Municipality"/></div>
					<div class="span2"><label>Address</label></div>
					<div class="span3"><input type="text" name="spouseMunicipalityAddress"class="span12" placeholder="Town / Municipality"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label></label></div>
					<div class="span3"><input type="text" name="emergencyCityAddress" class="span12" placeholder="City / Province"/></div>
					<div class="span2"><label></label></div>
					<div class="span3"><input type="text" name="spouseCityAddress"class="span12" placeholder="City / Province"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Telephone Number</label></div>
					<div class="span3"><input type="text" name="emergencyTelephone" class="span12"/></div>
					<div class="span2"><label>Telephone Number</label></div>
					<div class="span3"><input type="text" name="spouseTelephone" id="tin" class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Mobile Number</label></div>
					<div class="span3"><input type="text" name="emergencyMobile" class="span12"/></div>
					<div class="span2"><label>Mobile Number</label></div>
					<div class="span3"><input type="text" name="spouseMobile" class="span12"/></div>
				</div>
				 <a class="btn btn-danger" style="float:right" id="first_1">Next <i class="icon-chevron-right"></i></a>
			</div>
			<!--<h2>Educational Background</h2>-->
			<div class="container-fluid well tab-pane" id="educational-background">
				<legend>Educational Information<a class="btn btn-danger" style="float:right" id="second_2"> <i class="icon-chevron-left"></i> Prev</a></legend>
				<div class="row-fluid span">
					<div class="span2"><h5>Educational Level</h5></div>
					<div class="span2"><h5>School Graduated / Course</h5></div>
					<div class="span2" style="text-align:center"><h5>Year Start</h5></div>
					<div class="span2" style="text-align:center"><h5>Year End</h5></div>
					<div class="span2"><h5>College Degree</h5></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Primary Level</label></div>
					<div class="span2"><input type="text" name="primarySchool" class="span12"/></div>
					<div class="span2" style="text-align:center">
						<select name="primaryStart"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="primaryEnd"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2"><input type="text" name="primaryDegree" disabled class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Secondary Level</label></div>
					<div class="span2"><input type="text" name="secondarySchool" class="span12"/></div>
					<div class="span2" style="text-align:center">
						<select name="secondaryStart"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="secondaryEnd"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2"><input type="text" name="secondaryDegree" disabled class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>College Level</label></div>
					<div class="span2"><input type="text" name="collegeSchool" class="span12"/></div>
					<div class="span2" style="text-align:center">
						<select name="collegeStart"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="collegeEnd"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2"><input type="text" name="collegeDegree" class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Vocational Course</label></div>
					<div class="span2"><input type="text" name="vocationalCourse" class="span12"/></div>
					<div class="span2" style="text-align:center">
						<select name="vocationalStart"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="vocationalEnd"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2"><input type="text" name="vocationalDegree" disabled class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Post Graduate</label></div>
					<div class="span2"><input type="text" name="postSchool" class="span12"/></div>
					<div class="span2" style="text-align:center">
						<select name="postStart"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="postEnd"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2"><input type="text" name="postDegree" class="span12"/></div>
				</div>
				<a class="btn btn-danger" style="float:right" id="second_1">Next <i class="icon-chevron-right"></i></a>
			</div>
			<!--<h2>Special Skill Background</h2>-->
			<div class="container-fluid well tab-pane" id="special-skill-background">
				<legend>Spcecial Skill Information<a class="btn btn-danger" style="float:right" id="third_2"><i class="icon-chevron-left"></i> Prev</a></legend>
				<div class="row-fluid span">
					<div class="span3"><h5>Couse / Seminar</h5></div>
					<div class="span3"><h5>School or Training Center</h5></div>
					<div class="span2" style="text-align:center"><h5>Start Period</h5></div>
					<div class="span2" style="text-align:center"><h5>End Period</h5></div>
				</div>
				<div class="row-fluid" id="skill-background">
				</div>
				<input type="button" class="btn btn-primary" style="float:left;margin-left:2.5%" id="addskill" value="Add New">
				<script>
					var id=0;
					var style="";
					if (id == 0) style = "style='margin-left:2.5%'";
					else style = "";
					$(document).ready(function(){
						$('#addskill').click(function(){
							$('#skill-background').append(""+
									"<div id='skillCourse"+id+"'  class='span3'"+style+"><input type='text' name='skillCourse[]' class='span12'/></div>"+
									"<div id='skillSchool"+id+"'  class='span3'><input type='text' name='skillSchool[]' class='span12'/></div>"+
									"<div id='skillStart"+id+"'  class='span2' style='text-align:center'>"+
										"<select name='skillStartMonth[]' class='span5'>"+
											getThisMonth()+
										"</select>"+
										"</select>"+
										"<select name='skillStartYear[]'  class='span6'>"+
											getThisYear()+
										"</select>"+
									"</div>"+
									"<div id='skillEnd"+id+"'  class='span2' style='text-align:center'>"+
										"<select name='skillEndMonth[]' class='span5'>"+
											getThisMonth()+
										"</select>"+
										"</select>"+
										"<select name='skillEndYear[]'  class='span6'>"+
											getThisYear()+
										"</select>"+
									"</div>"+
									"<div id='skillButton"+id+"' class='span1' style='text-align:left'>"+
										"<a class='btn btn-danger' name='skillButton"+id+"'onclick='deletenode("+id+")'><i class='icon-trash'></i></a>"+
									"</div>"
							);
							id++;
						});
					});
					function getThisMonth(node){
						str = "<option value='00'>MM</option>";
						for (k = 1; k < 13; k++){
							if(k==node) str =  str + "<option selected>"+zeroPad(k,2)+"</option>";
							else str =  str + "<option>"+zeroPad(k,2)+"</option>";
						}
						return str;
					}
					function getThisYear(node){
						cDate = new Date();
						str = "<option value='00'>YYYY</option>";
						for (k =  cDate.getFullYear(); k > 1900; k--){
							if(k==node) str =  str + "<option selected>"+k+"</option>";
							else str =  str + "<option>"+k+"</option>";
						}
						return str;
					}
					function deletenode(node){
						$("#skillCourse"+node).remove();
						$("#skillSchool"+node).remove();
						$("#skillStart"+node).remove();
						$("#skillEnd"+node).remove();
						$("#skillButton"+node).remove();
					}
					function zeroPad(num, places) {
						var zero = places - num.toString().length + 1;
						return Array(+(zero > 0 && zero)).join("0") + num;
					}
				</script>
				<a class="btn btn-danger" style="float:right" id="third_1">Next <i class="icon-chevron-right"></i></a>
			</div>
			<!--<h2>Wok Experience Background</h2>-->
			<div class="container-fluid well tab-pane" id="work-experience-background">
				<legend>Local Work Information<a class="btn btn-danger" style="float:right" id="fourth_2"><i class="icon-chevron-left"></i> Prev</a></legend>
				<div class="row-fluid span">
					<div class="span2"><h5>Company</h5></div>
					<div class="span2"><h5>Position</h5></div>
					<div class="span2" style="text-align:center"><h5>Start Period</h5></div>
					<div class="span2" style="text-align:center"><h5>End Period</h5></div>
					<div class="span2"><h5>Main Duties</h5></div>
					<div class="span1"><h5>R of Leaving	</h5></div>
				</div>
				<div class="row-fluid" id="local-experience"></div>
				<a class="btn btn-warning" style="float:left;margin-left:2.5%" id="addlocal"><i class="icon-plus"></i> Add New</a>
				<script>
					var id=0;
					var style="";
					if (id == 0) style = "style='margin-left:2.5%'";
					else style = "";
					$(document).ready(function(){
						$('#addlocal').click(function(){
							$('#local-experience').append(""+
									"<div id='localExperienceCompany"+id+"' class='span2'"+style+"><input type='text' name='localExperienceCompany[]' class='span12'/></div>"+
									"<div id='localExperiencePosition"+id+"'  class='span2'><input type='text' name='localExperiencePosition[]' class='span12'/></div>"+
									"<div id='localExperienceStart"+id+"'  class='span2' style='text-align:center'>"+
										"<select name='localExperienceStartMonth[]' class='span5'>"+
											getThisMonth()+
										"</select>"+
										"<select name='localExperienceStartYear[]' class='span6'>"+
											getThisYear()+
										"</select>"+
									"</div>"+
									"<div id='localExperienceEnd"+id+"'  class='span2' style='text-align:center'>"+
										"<select name='localExperienceEndMonth[]' class='span5'>"+
											getThisMonth()+
										"</select>"+
										"<select name='localExperienceEndYear[]'  class='span6'>"+
											getThisYear()+
										"</select>"+
									"</div>"+
									"<div id='localExperienceDuties"+id+"'  class='span2'><input type='text' name='localExperienceDuties[]' class='span12'/></div>"+
									"<div id='localExperienceReason"+id+"'  class='span1'><input type='text' name='localExperienceReason[]' class='span12'/></div>"+
									"<div id='localButton"+id+"'  class='span1' style='text-align:left;width:10px'>"+
										"<a class='btn btn-danger' onclick='deletelocalnode("+id+")'><i class='icon-trash'></i></a>"+
									"</div>"
							);
							id++;
						});
					});
					function deletelocalnode(node){
						$("#localExperienceCompany"+node).remove();
						$("#localExperiencePosition"+node).remove();
						$("#localExperienceStart"+node).remove();
						$("#localExperienceEnd"+node).remove();
						$("#localExperienceDuties"+node).remove();
						$("#localExperienceReason"+node).remove();
						$("#localButton"+node).remove();
					}
				</script>
				<legend>Abroad Work Information</legend>
				<div class="row-fluid span">
					<div class="span2"><h5>Company</h5></div>
					<div class="span2"><h5>Position</h5></div>
					<div class="span2" style="text-align:center"><h5>Start Period</h5></div>
					<div class="span2" style="text-align:center"><h5>End Period</h5></div>
					<div class="span2"><h5>Main Duties</h5></div>
					<div class="span1"><h5>R of Leaving	</h5></div>
				</div>
				<div class="row-fluid" id="abroad-experience"></div>
				<a class="btn btn-warning" style="float:left;margin-left:2.5%" id="addabroad"><i class="icon-plus"></i> Add New</a>
				<script>
					var id=0;
					var style="";
					if (id == 0) style = "style='margin-left:2.5%'";
					else style = "";
					$(document).ready(function(){
						$('#addabroad').click(function(){
							$('#abroad-experience').append(""+
									"<div id='abroadExperienceCompany"+id+"' class='span2'"+style+"><input type='text' name='abroadExperienceCompany[]' class='span12'/></div>"+
									"<div id='abroadExperiencePosition"+id+"'  class='span2'><input type='text' name='abroadExperiencePosition[]' class='span12'/></div>"+
									"<div id='abroadExperienceStart"+id+"'  class='span2' style='text-align:center'>"+
										"<select name='abroadExperienceStartMonth[]' class='span5'>"+
											getThisMonth()+
										"</select>"+
										"<select name='abroadExperienceStartYear[]' class='span6'>"+
											getThisYear()+
										"</select>"+
									"</div>"+
									"<div id='abroadExperienceEnd"+id+"'  class='span2' style='text-align:center'>"+
										"<select name='abroadExperienceEndMonth[]' class='span5'>"+
											getThisMonth()+
										"</select>"+
										"<select name='abroadExperienceEndYear[]'  class='span6'>"+
											getThisYear()+
										"</select>"+
									"</div>"+
									"<div id='abroadExperienceDuties"+id+"'  class='span2'><input type='text' name='abroadExperienceDuties[]' class='span12'/></div>"+
									"<div id='abroadExperienceReason"+id+"'  class='span1'><input type='text' name='abroadExperienceReason[]' class='span12'/></div>"+
									"<div id='abroadButton"+id+"'  class='span1' style='text-align:left;width:10px'>"+
										"<a class='btn btn-danger' onclick='deleteabroadnode("+id+")'><i class='icon-trash'></i></a>"+
									"</div>"
							);
							id++;
						});
					});
					function deleteabroadnode(node){
						$("#abroadExperienceCompany"+node).remove();
						$("#abroadExperiencePosition"+node).remove();
						$("#abroadExperienceStart"+node).remove();
						$("#abroadExperienceEnd"+node).remove();
						$("#abroadExperienceDuties"+node).remove();
						$("#abroadExperienceReason"+node).remove();
						$("#abroadButton"+node).remove();
					}
				</script>
				<input type="submit" name="submit" class="btn btn-primary" style="float:right" value="Submit">
			</div>
		</div>
	</fieldset>
</form>
<script>
	$(document).ready(function(){
		  $('#tin').mask('99-9999999');
		  $('#pagibig').mask('9999-9999-9999');
		  $('#sss').mask('999-99-9999');
		  $('#philhealth').mask('9999-9999-9999');	
		  $('.required').append('<span style="color:red;"> *</span>');
	});
</script>
<script src="<?php echo base_url() ?>js/jquery.validate.worker.js"></script>
