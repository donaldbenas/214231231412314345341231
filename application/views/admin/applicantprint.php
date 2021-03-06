<ul class="nav nav-pills">
  <li><a href="<?php echo base_url() ?>admin/worker/add">Add Applicant</a></li>
  <li class="active"><a href="<?php echo base_url() ?>admin/worker/search">Search Applicant</a></li>
</ul>
<form method="post" name="myform" enctype="multipart/form-data" id="myform">
	<fieldset>
		<div class="container" style="width:900px;">
			<!--<h2>Personal Background</h2>-->
			<div class="container-fluid well" id="personal-background">
				<legend>Applicant Information<a href="<?php echo base_url()."admin/worker/edit/".$this->uri->segment(4) ?>" class="pull-right btn btn-info"><i class="icon-edit icon-white"></i> Edit</a></legend>
				<div class="row-fluid span">
					<div class="span2" id="top_margin1" style="margin-top:190px"><label>Upload Photo</label></div>
					<div class="span3">
						<img src="<?php if(isset($uploadphoto[0]['appid'])) echo base_url()."documents/photos/".$uploadphoto[0]['appid'].".".$uploadphoto[0]['type']; ?>" class="img-polaroid" style="height:200px;width:180px;margin-bottom:15px" 	>
					</div>
					<div class="span2" id="top_margin2" style="margin-top:190px"><label>Date Apply</label></div> 
					<div class="span3" id="top_margin3" style="margin-top:190px">
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
				<legend>Personal Information<a href="<?php echo base_url()."admin/worker/edit/".$this->uri->segment(4) ?>" class="pull-right btn btn-info"><i class="icon-edit icon-white"></i> Edit</a></legend>
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
				<legend>Address Information<a href="<?php echo base_url()."admin/worker/edit/".$this->uri->segment(4) ?>" class="pull-right btn btn-info"><i class="icon-edit icon-white"></i> Edit</a></legend>
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
				<legend>Other Information<a href="<?php echo base_url()."admin/worker/edit/".$this->uri->segment(4) ?>" class="pull-right btn btn-info"><i class="icon-edit icon-white"></i> Edit</a></legend>
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
					<div class="span3">
						<input type="text" id="prependedInput"  name="height" class="span3" placeholder="Centimeter" value="<?php echo $personalbackground['0']['height'] ?>"/>
					</div>
					<div class="span2"><label>SSS Number</label></div>
					<div class="span3"><input type="text" name="sss" id="sss" class="span12" maxlength="11" placeholder="___-__-____" value="<?php echo $personalbackground['0']['sss'] ?>"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Weight</label></div>
					<div class="span3">
						<input type="text" id="prependedInput"  name="weight" class="span3" placeholder="Kilogram" value="<?php echo $personalbackground['0']['weight'] ?>"/>
					</div>
					<div class="span2"><label>TIN Number</label></div>
					<div class="span3"><input type="text" name="tin" id="tin" class="span12" maxlength="10" placeholder="__-_______" value="<?php echo $personalbackground['0']['tin'] ?>"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Marks</label></div>
					<div class="span3"><input type="text" name="marks" class="span12" value="<?php echo $personalbackground['0']['marks'] ?>"/></div>
					<div class="span2"><label>Pagibig Number</label></div>
					<div class="span3"><input type="text" name="pagibig" id="pagibig" class="span12" maxlength="14" placeholder="____-____-____" value="<?php echo $personalbackground['0']['pagibig'] ?>"/></div>
				</div>
				<legend>Emergency Information<a href="<?php echo base_url()."admin/worker/edit/".$this->uri->segment(4) ?>" class="pull-right btn btn-info"><i class="icon-edit icon-white"></i> Edit</a></legend>
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
				<legend>Document Attachment<a href="<?php echo base_url()."admin/worker/edit/".$this->uri->segment(4) ?>" class="pull-right btn btn-info"><i class="icon-edit icon-white"></i> Edit</a></legend>
				<div class="row-fluid span">
					<div class="span2"><label>Upload Resume</label></div>
					<div class="span3">
						<?php if(isset($uploadresume['0'])){ ?>
						<a href="<?php echo "http://docs.google.com/viewer?url=".base_url()."documents/resumes/".$uploadresume['0']['appid'].".".$uploadresume['0']['type'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" id="view"><i class="icon-zoom-in"></i></a>
						<a href="<?php echo base_url()."documents/resumes/".$uploadresume['0']['appid'].".".$uploadresume['0']['type'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download" id="download"><i class=" icon-download-alt"></i></a>
						<?php }else  echo "No Resume Uploaded"; ?>
					</div>
				 </div>
			</div>
			<!--<h2>Educational Background</h2>-->
			<div class="container-fluid well tab-pane" id="educational-background">
				<legend>Educational Information<a href="<?php echo base_url()."admin/worker/edit/".$this->uri->segment(4) ?>" class="pull-right btn btn-info"><i class="icon-edit icon-white"></i> Edit</a></legend>
				<div class="row-fluid span">
					<div class="span2"><h5>Educational Level</h5></div>
					<div class="span3"><h5>School Graduated / Course</h5></div>
					<div class="span2" style="text-align:center"><h5>Year Start</h5></div>
					<div class="span2" style="text-align:center"><h5>Year End</h5></div>
					<div class="span2"><h5>College Degree</h5></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Primary Level</label></div>
					<div class="span3"><input type="text" name="primarySchool" class="span12" value="<?php echo $educationalbackground['0']['elementary'] ?>"/></div>
					<div class="span2" style="text-align:center">
						<select name="primaryStart"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
								if( $i == $educationalbackground['0']['efrom'] ) $select = "selected";
								else $select = "";
							   echo "<option {$select}>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="primaryEnd"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
								if( $i == $educationalbackground['0']['eto'] ) $select = "selected";
								else $select = "";
							   echo "<option {$select}>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2"><input type="text" name="primaryDegree" disabled class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Secondary Level</label></div>
					<div class="span3"><input type="text" name="secondarySchool" class="span12" value="<?php echo $educationalbackground['0']['highschool'] ?>"/></div>
					<div class="span2" style="text-align:center">
						<select name="secondaryStart"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
								if( $i == $educationalbackground['0']['hfrom'] ) $select = "selected";
								else $select = "";
							   echo "<option {$select}>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="secondaryEnd"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
								if( $i == $educationalbackground['0']['hto'] ) $select = "selected";
								else $select = "";
							   echo "<option {$select}>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2"><input type="text" name="secondaryDegree" disabled class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>College Level</label></div>
					<div class="span3"><input type="text" name="collegeSchool" class="span12" value="<?php echo $educationalbackground['0']['college'] ?>"/></div>
					<div class="span2" style="text-align:center">
						<select name="collegeStart"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
								if( $i == $educationalbackground['0']['cfrom'] ) $select = "selected";
								else $select = "";
							   echo "<option {$select}>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="collegeEnd"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
								if( $i == $educationalbackground['0']['cto'] ) $select = "selected";
								else $select = "";
							   echo "<option {$select}>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2"><input type="text" name="collegeDegree" class="span12" value="<?php echo $educationalbackground['0']['ccourse'] ?>"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Vocational Course</label></div>
					<div class="span3"><input type="text" name="vocationalCourse" class="span12" value="<?php echo $educationalbackground['0']['vocational'] ?>"/></div>
					<div class="span2" style="text-align:center">
						<select name="vocationalStart"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
								if( $i == $educationalbackground['0']['vfrom'] ) $select = "selected";
								else $select = "";
								echo "<option {$select}>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="vocationalEnd"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
								if( $i == $educationalbackground['0']['vto'] ) $select = "selected";
								else $select = "";
								echo "<option {$select}>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2"><input type="text" name="vocationalDegree" disabled class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Post Graduate</label></div>
					<div class="span3"><input type="text" name="postSchool" class="span12" value="<?php echo $educationalbackground['0']['postgraduate'] ?>"/></div>
					<div class="span2" style="text-align:center">
						<select name="postStart"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
								if( $i == $educationalbackground['0']['pfrom'] ) $select = "selected";
								else $select = "";
								echo "<option {$select}>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="postEnd"  class="span6">
							<option>YYYY</option>
							<?php
							for ($i = date("Y"); $i > 1900; $i--) {
								if( $i == $educationalbackground['0']['pto'] ) $select = "selected";
								else $select = "";
								echo "<option {$select}>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2"><input type="text" name="postDegree" class="span12" value="<?php echo $educationalbackground['0']['pcourse'] ?>"/></div>
				</div>
			</div>
			<!--<h2>Special Skill Background</h2>-->
			<div class="container-fluid well tab-pane" id="special-skill-background">
				<?php 
					//echo print_r($skillbackground);
				?>
				<legend>Spcecial Skill Information<a href="<?php echo base_url()."admin/worker/edit/".$this->uri->segment(4) ?>" class="pull-right btn btn-info"><i class="icon-edit icon-white"></i> Edit</a></legend>
				<div class="row-fluid span">
					<div class="span3"><h5>Couse / Seminar</h5></div>
					<div class="span3"><h5>School or Training Center</h5></div>
					<div class="span2" style="text-align:center"><h5>Start Period</h5></div>
					<div class="span2" style="text-align:center"><h5>End Period</h5></div>
				</div>
				<div class="row-fluid" id="skill-background"></div>
				<script>
					var id=0;
					var skill = <?php
								echo json_encode($skillbackground); 
								?>;
					var style="";
					if (id == 0) style = "style='margin-left:2.5%'";
					else style = "";
					$(document).ready(function(){
						if(skill.length>0){
							for(i=0;i<skill.length;i++){
								var startDate=skill[i]['startDate'];
								var bStartDate=startDate.split("-");
								var endDate=skill[i]['endDate'];
								var bEndDate=endDate.split("-");
								$('#skill-background').append("<div class=\"row-fluid\">"+
										"<div id='skillCourse"+id+"' class='span3'"+style+"><input type='text' name='skillCourse[]' class='span12' value='"+skill[i].course+"'/></div>"+
										"<div id='skillSchool"+id+"' class='span3'><input type='text' name='skillSchool[]' class='span12' value='"+skill[i].school+"'/></div>"+
										"<div id='skillStart"+id+"' class='span2' style='text-align:center'>"+
											"<select name='skillStartMonth[]' class='span5'>"+
												getThisMonth(bStartDate[0])+
											"</select>"+
											"</select>"+
											"<select name='skillStartYear[]'  class='span6'>"+
												getThisYear(bStartDate[1])+
											"</select>"+
										"</div>"+
										"<div id='skillEnd"+id+"' class='span2' style='text-align:center'>"+
											"<select name='skillEndMonth[]' class='span5'>"+
												getThisMonth(bStartDate[0])+
											"</select>"+
											"</select>"+
											"<select name='skillEndYear[]'  class='span6'>"+
												getThisYear(bStartDate[1])+
											"</select>"+
										"</div>"+
										"<div id='skillButton"+id+"'  class='span1' style='text-align:left'>"+
										"</div></div>"
								);
								id++;
							}
						};
					});
				</script>
			</div>
			<!--<h2>Wok Experience Background</h2>-->
			<div class="container-fluid well tab-pane" id="work-experience-background">
				<legend>Local Work Information<a href="<?php echo base_url()."admin/worker/edit/".$this->uri->segment(4) ?>" class="pull-right btn btn-info"><i class="icon-edit icon-white"></i> Edit</a></legend>
				<div class="row-fluid span">
					<div class="span2"><h5>Company</h5></div>
					<div class="span2"><h5>Position</h5></div>
					<div class="span2" style="text-align:center"><h5>Start Period</h5></div>
					<div class="span2" style="text-align:center"><h5>End Period</h5></div>
					<div class="span2"><h5>Main Duties</h5></div>
					<div class="span1"><h5>R of Leaving	</h5></div>
				</div>
				<div class="row-fluid" id="local-experience"></div>
				<script>
					var id=0;
					var local = <?php echo json_encode($localexperience); ?>;
					var style="";
					if (id == 0) style = "style='margin-left:2.5%'";
					else style = "";
					$(document).ready(function(){
						if(local.length>0){
							for(i=0;i<local.length;i++){
								var startDate=local[i]['start'];
								var bStartDate=startDate.split("-");
								var endDate=local[i]['end'];
								var bEndDate=endDate.split("-");
								$('#local-experience').append("<div class=\"row-fluid\">"+
										"<div id='localExperienceCompany"+id+"'  class='span2' "+style+"><input type='text' name='localExperienceCompany[]' class='span12' value='"+local[i].company+"'/></div>"+
										"<div id='localExperiencePosition"+id+"'  class='span2'><input type='text' name='localExperiencePosition[]' class='span12' value='"+local[i].position+"'/></div>"+
										"<div id='localExperienceStart"+id+"'  class='span2' style='text-align:center'>"+
											"<select name='localExperienceStartMonth[]' class='span5'>"+
												getThisMonth(bStartDate[0])+
											"</select>"+
											"<select name='localExperienceStartYear[]' class='span6'>"+
												getThisYear(bStartDate[1])+
											"</select>"+
										"</div>"+
										"<div id='localExperienceEnd"+id+"'  class='span2' style='text-align:center'>"+
											"<select name='localExperienceEndMonth[]' class='span5'>"+
												getThisMonth(bEndDate[0])+
											"</select>"+
											"<select name='localExperienceEndYear[]'  class='span6'>"+
												getThisYear(bEndDate[1])+
											"</select>"+
										"</div>"+
										"<div id='localExperienceDuties"+id+"'  class='span2'><input type='text' name='localExperienceDuties[]' class='span12' value='"+local[i].main+"'/></div>"+
										"<div id='localExperienceReason"+id+"'  class='span1'><input type='text' name='localExperienceReason[]' class='span12' value='"+local[i].reason+"'/></div>"+
										"<div id='localButton"+id+"'  class='span1' style='text-align:left;width:10px'>"+
										"</div></div>"
								);
								id++;
							}
						};
					});
				</script>
				<hr>
				<legend>Abroad Work Information<a href="<?php echo base_url()."admin/worker/edit/".$this->uri->segment(4) ?>" class="pull-right btn btn-info"><i class="icon-edit icon-white"></i> Edit</a></legend>
				<div class="row-fluid span">
					<div class="span2"><h5>Company</h5></div>
					<div class="span2"><h5>Position</h5></div>
					<div class="span2" style="text-align:center"><h5>Start Period</h5></div>
					<div class="span2" style="text-align:center"><h5>End Period</h5></div>
					<div class="span2"><h5>Main Duties</h5></div>
					<div class="span1"><h5>R of Leaving	</h5></div>
				</div>
				<div class="row-fluid" id="abroad-experience" style="height:inherit"></div>
				<script>
					var id=0;
					var abroad = <?php echo json_encode($abroadexperience); ?>;
					var style="";
					if (id == 0) style = "style='margin-left:2.5%'";
					else style = "";
					$(document).ready(function(){
						if(abroad.length>0){
							for(i=0;i<abroad.length;i++){
								var startDate=abroad[i]['start'];
								var bStartDate=startDate.split("-");
								var endDate=abroad[i]['end'];
								var bEndDate=endDate.split("-");
								$('#abroad-experience').append("<div class=\"row-fluid\">"+
										"<div id='abroadExperienceCompany"+id+"' class='span2'"+style+"><input type='text' name='abroadExperienceCompany[]' class='span12' value='"+abroad[i].company+"'/></div>"+
										"<div id='abroadExperiencePosition"+id+"'  class='span2'><input type='text' name='abroadExperiencePosition[]' class='span12' value='"+abroad[i].position+"'/></div>"+
										"<div id='abroadExperienceStart"+id+"'  class='span2' style='text-align:center'>"+
											"<select name='abroadExperienceStartMonth[]' class='span5'>"+
												getThisMonth(bStartDate[0])+
											"</select>"+
											"<select name='abroadExperienceStartYear[]' class='span6'>"+
												getThisYear(bStartDate[1])+
											"</select>"+
										"</div>"+
										"<div id='abroadExperienceEnd"+id+"'  class='span2' style='text-align:center'>"+
											"<select name='abroadExperienceEndMonth[]' class='span5'>"+
												getThisMonth(bEndDate[0])+
											"</select>"+
											"<select name='abroadExperienceEndYear[]'  class='span6'>"+
												getThisYear(bEndDate[1])+
											"</select>"+
										"</div>"+
										"<div id='abroadExperienceDuties"+id+"'  class='span2'><input type='text' name='abroadExperienceDuties[]' class='span12' value='"+abroad[i].main+"'/></div>"+
										"<div id='abroadExperienceReason"+id+"'  class='span1'><input type='text' name='abroadExperienceReason[]' class='span12' value='"+abroad[i].reason+"'/></div>"+
										"</div></div>"
								);
								id++;
							}
						};
					});
				</script>
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
		  $('#myTab a').click(function (e) {
			  e.preventDefault();
			  $(this).tab('show');
		  });
		  $("input").attr('disabled','disabled').css('color','#2C2C2C');
		  $("select").attr('disabled','disabled').css('color','#2C2C2C');
		  
		  TriggerClick = 1;
		  $("#photo").on('click', function(){
			if(TriggerClick==0){
				 TriggerClick=1;
				 $("#photo").css({width:'20px',height:'20px'}, 200);
				 $("#top_margin1").css('margin-top','10px', 500);
				 $("#top_margin2").css('margin-top','10px', 500);
				 $("#top_margin3").css('margin-top','10px', 500);
			}else{
				 TriggerClick=0;
				 $("#photo").css({width:'180px',height:'200px'});
				 $("#top_margin1").css('margin-top','195px');
				 $("#top_margin2").css('margin-top','195px');
				 $("#top_margin3").css('margin-top','180px');
			};
		  });
		  $("input[type=text]").each(function(){
			  $(this).parent().append('<p>'+$(this).val()+'</p>');
			  $(this).remove();
          });  
		  $("select").each(function(){
			  $(this).parent().append('<span style="font-size:12px;text-align:center">'+$(this).find("option:selected").text()+' </span>');
			  $(this).remove();
          });  
		  $("input[type=email]").each(function(){
			  $(this).parent().append('<span style="font-size:12px;text-align:center">'+$(this).val()+'</span>');
			  $(this).remove();
          });  
		  $("input[type=password]").each(function(){
			  $(this).parent().append('<span style="font-size:12px;text-align:center">'+$(this).val()+'</span>');
			  $(this).remove();
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
	function zeroPad(num, places) {
		var zero = places - num.toString().length + 1;
		return Array(+(zero > 0 && zero)).join("0") + num;
	}
	$('#view').tooltip();
	$('#download').tooltip();
</script>
