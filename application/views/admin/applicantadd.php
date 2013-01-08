<ul class="nav nav-pills">
  <li class="active"><a href="<?php echo base_url() ?>admin/worker/add">Add Applicant</a></li>
  <li><a href="<?php echo base_url() ?>admin/worker/search">Search Applicant</a></li>
  <li><a href="#">Print Applicant</a></li>
</ul>
<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#personal-background"><h4>Personal Background</h4></a></li>
  <li><a href="#educational-background"><h4>Educational Background</h4></a></li>
  <li><a href="#special-skill-background"><h4>Special Skill Background</h4></a></li>
  <li><a href="#work-experience-background"><h4>Work Experience Background</h4></a></li>
</ul>
 
<form method="post" name="myform" enctype="multipart/form-data">
	<fieldset>
		<div class="container-fluid tab-content">
			<!--<h2>Personal Background</h2>-->
			<div class="container-fluid well tab-pane active" id="personal-background">
				<legend>Applicant Information</legend>
				<div class="row-fluid span">
					<div class="span2"><label>Upload Photo</label></div>
					<div class="span3"><button type="" id="file" name="fileToUpload" class="btn"></button></div>
					<div class="span2"><label>Date Apply</label></div> 
					<div class="span3">
						<select name="applyMonth" class="span3">
							<option>MM</option>
							<?
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="applyDay"  class="span3">
							<option>DD</option>
							<?
							for ($i = 1; $i < 32; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="applyYear"  class="span4">
							<option>YYYY</option>
							<?
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
							<option value="0">Choose</option>	
						</select>
					</div>
					<div class="span2"><label>Applying for Position 2</label></div>
					<div class="span3">
						<select name="position2" class="span12">
							<option value="0">Choose</option>	
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
					<div class="span3"><input type="text" name="salary1" class="span12"/></div>
				</div>
				<legend>Personal Information</legend>
				<div class="row-fluid span">
					<div class="span2"><label>Firt Name</label></div>
					<div class="span3"><input type="text" name="lastname" class="span12"/></div>
					<div class="span2"><label>Birth Date</label></div> 
					<div class="span3">
						<select name="birthMonth" class="span3">
							<option>MM</option>
							<?
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="BirthDay"  class="span3">
							<option>DD</option>
							<?
							for ($i = 1; $i < 32; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="BirthYear"  class="span4">
							<option>YYYY</option>
							<?
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					 </div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Middle Name</label></div>
					<div class="span3"><input type="text" name="middlename" class="span12"/></div>
					<div class="span2"><label>Birth Place</label></div>
					<div class="span3"><input type="text" name="municipality" placeholder="Town / Municipality	" class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Last Name</label></div>
					<div class="span3"><input type="text" name="lastname" class="span12"/></div>
					<div class="span2"><label></label></div>
					<div class="span3"><input type="text" name="city" placeholder="City / Province" class="span12"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Email Address</label></div>
					<div class="span3"><input type="email" name="email" class="span12"/></div>
					<div class="span2"><label>Gender</label></div>
					<div class="span3">
						<select name="gender" class="span12">
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
							<option>Single</option>
						</select>
					</div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Repeat Password</label></div>
					<div class="span3"><input type="password" name="password2" class="span12"/></div>
					<div class="span2"><label>Nationality</label></div>
					<div class="span3">
						<select name="civil" class="span12">
							<option>Filipino</option>
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
							<option>Catholic</option>
						</select>
					</div>
					<div class="span2"><label>Philhealth Number</label></div>
					<div class="span3"><input type="text" name="philhealth" id="philhealth" class="span12" maxlength="12" placeholder="____-____-____"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Height</label></div>
					<div class="span3"><input type="text" name="height" class="span12" placeholder="Centimeter"/></div>
					<div class="span2"><label>SSS Number</label></div>
					<div class="span3"><input type="text" name="sss" id="sss" class="span12" maxlength="9" placeholder="___-__-____"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Weight</label></div>
					<div class="span3"><input type="text" name="weight" class="span12" placeholder="Kilogram"/></div>
					<div class="span2"><label>TIN Number</label></div>
					<div class="span3"><input type="text" name="tin" id="tin" class="span12" maxlength="9" placeholder="__-_______"/></div>
				</div>
				<div class="row-fluid span">
					<div class="span2"><label>Marks</label></div>
					<div class="span3"><input type="text" name="marks" class="span12"/></div>
					<div class="span2"><label>Pagibig Number</label></div>
					<div class="span3"><input type="text" name="pagibig" id="pagibig" class="span12" maxlength="12" placeholder="____-____-____"/></div>
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
					<div class="span3"><input type="text" name="emergencyAddress" class="span12"/></div>
					<div class="span2"><label>Address</label></div>
					<div class="span3"><input type="text" name="spouseAddress"class="span12"/></div>
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
			</div>
			<!--<h2>Educational Background</h2>-->
			<div class="container-fluid well tab-pane" id="educational-background">
				<legend>Educational Information</legend>
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
							<?
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="primaryEnd"  class="span6">
							<option>YYYY</option>
							<?
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
							<?
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="secondaryEnd"  class="span6">
							<option>YYYY</option>
							<?
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
							<?
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="collegeEnd"  class="span6">
							<option>YYYY</option>
							<?
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
							<?
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="vocationalEnd"  class="span6">
							<option>YYYY</option>
							<?
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
							<?
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="postEnd"  class="span6">
							<option>YYYY</option>
							<?
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2"><input type="text" name="postDegree" class="span12"/></div>
				</div>
			</div>
			<!--<h2>Special Skill Background</h2>-->
			<div class="container-fluid well tab-pane" id="special-skill-background">
				<legend>Spcecial Skill Information</legend>
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
							<?
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="skillStartYear<?php echo $l ?>" class="span6">
							<option>YYYY</option>
							<?
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="skillEndMonth<?php echo $l ?>" class="span5">
							<option>MM</option>
							<?
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						</select>
						<select name="skillEndYear<?php echo $l ?>"  class="span6">
							<option>YYYY</option>
							<?
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
			</div>
			<!--<h2>Wok Experience Background</h2>-->
			<div class="container-fluid well tab-pane" id="work-experience-background">
				<legend>Local Work Information</legend>
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
							<?
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="localExperienceStartYear<?php echo $l ?>" class="span6">
							<option>YYYY</option>
							<?
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="localExperienceEndMonth<?php echo $l ?>" class="span5">
							<option>MM</option>
							<?
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						</select>
						<select name="localExperienceEndYear<?php echo $l ?>"  class="span6">
							<option>YYYY</option>
							<?
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
							<?
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						<select name="abroadExperienceStartYear<?php echo $l ?>" class="span6">
							<option>YYYY</option>
							<?
							for ($i = date("Y"); $i > 1900; $i--) {
							   echo "<option>".$i."</option>";
							}
							?>
						  
						</select>
					</div>
					<div class="span2" style="text-align:center">
						<select name="abroadExperienceEndMonth<?php echo $l ?>" class="span5">
							<option>MM</option>
							<?
							for ($i = 1; $i < 13; $i++) {
							   echo "<option>".sprintf("%02s", $i)."</option>";
							}
							?>
						  
						</select>
						</select>
						<select name="abroadExperienceEndYear<?php echo $l ?>"  class="span6">
							<option>YYYY</option>
							<?
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
			</div>
		</div>
	</fieldset>
</form>
<script>
  $(function () {
	  $('#tin').mask('99-9999999');
	  $('#pagibig').mask('9999-9999-9999');
	  $('#sss').mask('999-99-9999');
	  $('#philhealth').mask('9999-9999-9999');	
	  $('#myTab a').click(function (e) {
		  e.preventDefault();
		  $(this).tab('show');
	  })
  })  
</script>
