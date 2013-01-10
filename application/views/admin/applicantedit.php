<ul class="nav nav-pills">
  <li><a href="<?php echo base_url() ?>admin/worker/add">Add Applicant</a></li>
  <li class="active"><a href="<?php echo base_url() ?>admin/worker/search">Search Applicant</a></li>
  <li><a href="#">Print Applicant</a></li>
</ul>
<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#personal-background" id="pb"><h5>Personal Background</h5></a></li>
  <li><a href="#educational-background" id="eb"><h5>Educational Background</h5></a></li>
  <li><a href="#special-skill-background" id="sb"><h5>Special Skill Background</h5></a></li>
  <li><a href="#work-experience-background" id="wb"><h5>Work Experience Background</h5></a></li>
</ul>
<form method="post" name="myform" enctype="multipart/form-data" id="myform">
	<input type="text" name="appid" value="<?php echo $personalbackground['0']['appid'] ?>" style="display:none">
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
								<span class="fileupload-new" onclick="$('#file').click()">Select file</span>
								<span class="fileupload-exists" onclick="$('#file').click()">Change</span>
								<input type="file" style="display:none" name=file" id="file"/>
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
							$dat = explode('-',$personalbackground['0']['added'] );
							for ($i = 1; $i < 13; $i++) {
								if( $i == $dat[1]) $select = "selected";
								else $select = "";
								echo "<option {$select}>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="applyDay"  class="span3">
							<option>DD</option>
							<?php
							for ($i = 1; $i < 32; $i++) {
								if( $i == $dat[2]) $select = "selected";
								else $select = "";
								echo "<option {$select}>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="applyYear"  class="span4">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
								if( $i == $dat[0]) $select = "selected";
								else $select = "";
								echo "<option {$select}>".$i."</option>";
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
										if( $ids == $personalbackground['0']['position1'] ) $select = "selected";
										else $select = "";
										if( $id == 'value') echo "<option value='".$ids."' ".$select.">".ucfirst(strtolower($val))."</option>";
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
										if( $ids == $personalbackground['0']['position2'] ) $select = "selected";
										else $select = "";
										if( $id == 'value') echo "<option value='".$ids."' ".$select.">".ucfirst(strtolower($val))."</option>";
									}
								}
							?>
						</select>
					</div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Reference</label></div>
					<div class="span3"><input type="text" name="reference1" class="span12" value="<?php echo $personalbackground['0']['prefer1'] ?>"/></div>
					<div class="span2"><label>Reference</label></div>
					<div class="span3"><input type="text" name="reference2" class="span12" value="<?php echo $personalbackground['0']['prefer2'] ?>"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Salary Expected</label></div>
					<div class="span3"><input type="text" name="salary1" class="span12" value="<?php echo $personalbackground['0']['salary1'] ?>"/></div>
					<div class="span2"><label>Salary Expected</label></div>
					<div class="span3"><input type="text" name="salary2" class="span12" value="<?php echo $personalbackground['0']['salary2'] ?>"/></div>
				</div>
				<legend>Personal Information</legend>
				<div class="row-fluid span">
					<div class="span2"><label class="required">Firt Name</label></div>
					<div class="span3"><input type="text" name="firstname" class="span12" value="<?php echo $personalbackground['0']['firstname'] ?>"/></div>
					<div class="span2"><label>Birth Date</label></div> 
					<div class="span3">
						<select name="birthMonth" class="span3">
							<option>MM</option>
							<?php
							$dat = explode('-',$personalbackground['0']['datebirth'] );
							for ($i = 1; $i < 13; $i++) {
								if( $i == $dat[1]) $select = "selected";
								else $select = "";
							    echo "<option {$select}>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="BirthDay"  class="span3">
							<option>DD</option>
							<?php
							for ($i = 1; $i < 32; $i++) {
								if( $i == $dat[2]) $select = "selected";
								else $select = "";
							   echo "<option {$select}>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="BirthYear"  class="span4">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
								if( $i == $dat[0]) $select = "selected";
								else $select = "";
							   echo "<option {$select}>".$i."</option>";
							}
							?>
						  
						</select>
					 </div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label class="required">Middle Name</label></div>
					<div class="span3"><input type="text" name="middlename" class="span12" value="<?php echo $personalbackground['0']['middlename'] ?>"/></div>
					<div class="span2"><label>Birth Place</label></div>
					<div class="span3"><input type="text" name="municipality" placeholder="Town / Municipality	" class="span12" value="<?php $dat = explode('--',$personalbackground['0']['placebirth'] ); if(isset($dat[0])) echo $dat[0]; ?>"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label class="required">Last Name</label></div>
					<div class="span3"><input type="text" name="lastname" class="span12" value="<?php echo $personalbackground['0']['lastname'] ?>"/></div>
					<div class="span2"><label></label></div>
					<div class="span3"><input type="text" name="city" placeholder="City / Province" class="span12" value="<?php $dat = explode('--',$personalbackground['0']['placebirth'] ); if(isset($dat[1])) echo $dat[1];  ?>"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Email Address</label></div>
					<div class="span3"><input type="email" name="email" class="span12" id="email" value="<?php echo $personalbackground['0']['email'] ?>"/></div>
					<div class="span2"><label>Gender</label></div>
					<div class="span3">
						<select name="gender" class="span12">
							<option value="">Choose</option>
							<option <?php if($personalbackground['0']['gender'] === '1') echo "selected"; ?>/>Male</option>
							<option <?php if($personalbackground['0']['gender'] === '2') echo "selected"; ?>/>Female</option>
						</select>
					</div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Password</label></div>
					<div class="span3"><input type="password" name="password1" class="span12" value="<?php echo $personalbackground['0']['password'] ?>"/></div>
					<div class="span2"><label>Civil Status</label></div>
					<div class="span3">
						<select name="civil" class="span12">
							<option value="">Choose</option>
							<?php
								foreach($civil as $arr){
									foreach($arr as $id => $val){
										if( $id == 'id') $ids = $val;
										if( $ids == $personalbackground['0']['civilstatus'] ) $select = "selected";
										else $select = "";
										if( $id == 'value') echo "<option value='".$ids."' {$select}>".ucfirst(strtolower($val))."</option>";
									}
								}
							?>
						</select>
					</div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Repeat Password</label></div>
					<div class="span3"><input type="password" name="password2" class="span12" value="<?php echo $personalbackground['0']['password'] ?>"/></div>
					<div class="span2"><label>Nationality</label></div>
					<div class="span3">
						<select name="nationality" class="span12">
							<option value="">Choose</option>
							<?php
								foreach($nationality as $arr){
									foreach($arr as $id => $val){
										if( $id == 'id') $ids = $val;
										if( $ids == $personalbackground['0']['nationality'] ) $select = "selected";
										else $select = "";
										if( $id == 'value') echo "<option value='".$ids."' {$select}>".ucfirst(strtolower($val))."</option>";
									}
								}
							?>
						</select>
					</div>
				</div>
				<legend>Address Information</legend>
				<div class="row-fluid span">
					<div class="span2"><label>Current Address</label></div>
					<div class="span3"><input type="text" name="currentAddressMunicpality" placeholder="Town / Municipality" class="span12" value="<?php $caddress = explode('--',$personalbackground['0']['caddress'] ); if(isset($caddress[0])) echo $caddress[0]; ?>"/></div>
					<div class="span2"><label>Telephone Number</label></div>
					<div class="span3"><input type="text" name="currentTelephone" class="span12" value="<?php echo $personalbackground['0']['cphone'] ?>"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label></label></div>
					<div class="span3"><input type="text" name="currentAddressCity" placeholder="City / Province" class="span12" value="<?php $caddress = explode('--',$personalbackground['0']['caddress'] ); if(isset($caddress[1])) echo $caddress[1]; ?>"/></div>
					<div class="span2"><label>Mobile Number</label></div>
					<div class="span3"><input type="text" name="currentMobile" class="span12" value="<?php echo $personalbackground['0']['cmobile'] ?>"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Permanent Address</label></div>
					<div class="span3"><input type="text" name="permanentAddressMunicpality" placeholder="Town / Municipality" class="span12" value="<?php $paddress = explode('--',$personalbackground['0']['paddress'] ); if(isset($paddress[0])) echo $paddress[0]; ?>"/></div>
					<div class="span2"><label>Telephone Number</label></div>
					<div class="span3"><input type="text" name="permanentTelephone" class="span12" value="<?php echo $personalbackground['0']['pphone'] ?>"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label></label></div>
					<div class="span3"><input type="text" name="permanentAddressCity" placeholder="City / Province" class="span12" value="<?php $paddress = explode('--',$personalbackground['0']['paddress'] ); if(isset($paddress[1])) echo $paddress[1]; ?>"/></div>
					<div class="span2"><label>Mobile Number</label></div>
					<div class="span3"><input type="text" name="permanentMobile" class="span12" value="<?php echo $personalbackground['0']['pmobile'] ?>"/></div>
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
										if( $ids == $personalbackground['0']['religion'] ) $select = "selected";
										else $select = "";
										if( $id == 'value') echo "<option value='".$ids."' {$select}>".ucfirst(strtolower($val))."</option>";
									}
								}
							?>
						</select>
					</div>
					<div class="span2"><label>Philhealth Number</label></div>
					<div class="span3"><input type="text" name="philhealth" id="philhealth" class="span12" maxlength="14" placeholder="____-____-____" value="<?php echo $personalbackground['0']['philhealth'] ?>"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Height</label></div>
					<div class="span3"><input type="text" name="height" class="span12" placeholder="Centimeter" value="<?php echo $personalbackground['0']['height'] ?>"/></div>
					<div class="span2"><label>SSS Number</label></div>
					<div class="span3"><input type="text" name="sss" id="sss" class="span12" maxlength="11" placeholder="___-__-____" value="<?php echo $personalbackground['0']['sss'] ?>"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Weight</label></div>
					<div class="span3"><input type="text" name="weight" class="span12" placeholder="Kilogram" value="<?php echo $personalbackground['0']['weight'] ?>"/></div>
					<div class="span2"><label>TIN Number</label></div>
					<div class="span3"><input type="text" name="tin" id="tin" class="span12" maxlength="10" placeholder="__-_______" value="<?php echo $personalbackground['0']['tin'] ?>"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Marks</label></div>
					<div class="span3"><input type="text" name="marks" class="span12" value="<?php echo $personalbackground['0']['marks'] ?>"/></div>
					<div class="span2"><label>Pagibig Number</label></div>
					<div class="span3"><input type="text" name="pagibig" id="pagibig" class="span12" maxlength="14" placeholder="____-____-____" value="<?php echo $personalbackground['0']['pagibig'] ?>"/></div>
				</div>
				<legend>Emergency Information</legend>
				<div class="row-fluid span">
					<div class="span2"><label>Person Noitfy</label></div>
					<div class="span3"><input type="text" name="emergencyNotify"class="span12" value="<?php echo $personalbackground['0']['notify'] ?>"/></div>
					<div class="span2"><label>Spouse Name</label></div>
					<div class="span3"><input type="text" name="spouseName" class="span12" value="<?php echo $personalbackground['0']['spouse'] ?>"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Address</label></div>
					<div class="span3"><input type="text" name="emergencyMunicipalityAddress" class="span12" value="<?php $naddress = explode('--',$personalbackground['0']['naddress'] ); if(isset($naddress[0])) echo $naddress[0]; ?>"  placeholder="Town / Municipality"/></div>
					<div class="span2"><label>Address</label></div>
					<div class="span3"><input type="text" name="spouseMunicipalityAddress"class="span12" value="<?php $saddress = explode('--',$personalbackground['0']['saddress'] ); if(isset($saddress[0])) echo $saddress[0]; ?>" placeholder="Town / Municipality"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label></label></div>
					<div class="span3"><input type="text" name="emergencyCityAddress" class="span12" value="<?php $naddress = explode('--',$personalbackground['0']['naddress'] ); if(isset($naddress[1])) echo $naddress[1]; ?>" placeholder="City / Province"/></div>
					<div class="span2"><label></label></div>
					<div class="span3"><input type="text" name="spouseCityAddress"class="span12" value="<?php $saddress = explode('--',$personalbackground['0']['saddress'] ); if(isset($saddress[1])) echo $saddress[1]; ?>" placeholder="City / Province"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Telephone Number</label></div>
					<div class="span3"><input type="text" name="emergencyTelephone" class="span12" value="<?php echo $personalbackground['0']['nphone'] ?>"/></div>
					<div class="span2"><label>Telephone Number</label></div>
					<div class="span3"><input type="text" name="spouseTelephone" id="tin" class="span12" value="<?php echo $personalbackground['0']['sphone'] ?>"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Mobile Number</label></div>
					<div class="span3"><input type="text" name="emergencyMobile" class="span12" value="<?php echo $personalbackground['0']['nmobile'] ?>"/></div>
					<div class="span2"><label>Mobile Number</label></div>
					<div class="span3"><input type="text" name="spouseMobile" class="span12" value="<?php echo $personalbackground['0']['smobile'] ?>"/></div>
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
				<?php
				for ($l=1; $l<=5; $l++)
				{
				?>
				<div class="row-fluid span">
					<div class="span3"><input type="text" name="skillCouse<?php echo $l ?>" class="span12"/></div>
					<div class="span3"><input type="text" name="skillSchool<?php echo $l ?>" class="span12"/></div>
					<div class="span2" style="text-align:center">
						<select name="skillStartMonth<?php echo $l ?>" class="span5">
							<option>MM</option>
							<?php
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="skillStartYear<?php echo $l ?>" class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="skillEndMonth<?php echo $l ?>" class="span5">
							<option>MM</option>
							<?php
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						</select>
						<select name="skillEndYear<?php echo $l ?>"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
				</div>
				<?php
				}
				?>
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
					<div class="span1"><h5>Main Duties</h5></div>
					<div class="span2"><h5>Reason of Leaving	</h5></div>
				</div>
				<?php
				for ($l=1; $l<=5; $l++)
				{
				?>
				<div class="row-fluid span">
					<div class="span2"><input type="text" name="localExperienceCompany<?php echo $l ?>" class="span12"/></div>
					<div class="span2"><input type="text" name="localExperiencePosition<?php echo $l ?>" class="span12"/></div>
					<div class="span2" style="text-align:center">
						<select name="localExperienceStartMonth<?php echo $l ?>" class="span5">
							<option>MM</option>
							<?php
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="localExperienceStartYear<?php echo $l ?>" class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="localExperienceEndMonth<?php echo $l ?>" class="span5">
							<option>MM</option>
							<?php
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						</select>
						<select name="localExperienceEndYear<?php echo $l ?>"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span1"><input type="text" name="localExperienceDuties<?php echo $l ?>" class="span12"/></div>
					<div class="span2"><input type="text" name="localExperienceReason<?php echo $l ?>" class="span12"/></div>
				</div>
				<?php
				}
				?>
				<legend>Abroad Work Information</legend>
				<div class="row-fluid span">
					<div class="span2"><h5>Company</h5></div>
					<div class="span2"><h5>Position</h5></div>
					<div class="span2" style="text-align:center"><h5>Start Period</h5></div>
					<div class="span2" style="text-align:center"><h5>End Period</h5></div>
					<div class="span1"><h5>Main Duties</h5></div>
					<div class="span2"><h5>Reason of Leaving	</h5></div>
				</div>
				<?php
				for ($l=1; $l<=5; $l++)
				{
				?>
				<div class="row-fluid span">
					<div class="span2"><input type="text" name="abroadExperienceCompany<?php echo $l ?>" class="span12"/></div>
					<div class="span2"><input type="text" name="abroadExperiencePosition<?php echo $l ?>" class="span12"/></div>
					<div class="span2" style="text-align:center">
						<select name="abroadExperienceStartMonth<?php echo $l ?>" class="span5">
							<option>MM</option>
							<?php
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="abroadExperienceStartYear<?php echo $l ?>" class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="abroadExperienceEndMonth<?php echo $l ?>" class="span5">
							<option>MM</option>
							<?php
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						</select>
						<select name="abroadExperienceEndYear<?php echo $l ?>"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span1"><input type="text" name="abroadExperienceDuties<?php echo $l ?>" class="span12"/></div>
					<div class="span2"><input type="text" name="abroadExperienceReason<?php echo $l ?>" class="span12"/></div>
				</div>
				<?php
				}
				?>
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
