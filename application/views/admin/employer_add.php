<form class="form-horizontal" method="post">
<legend>Add Employer Information</legend>
  <div class="control-group">
    <label class="control-label">Company name</label>
    <div class="controls">
      <input type="text" name="company" class="span5">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Representative name</label>
    <div class="controls">
      <input type="text" name="representative" class="span4">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Position</label>
    <div class="controls">
      <input type="text" name="position" class="span3">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Present Address</label>
    <div class="controls">
      <textarea name="address" class="span3" style="height:100px"></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Country</label>
    <div class="controls">
      <select name="location" class="span3">		
		<?php foreach($country as $rows) { ?>
		<option value="<?php echo $rows['id'] ?>"><?php echo strtoupper($rows['value']) ?></option>
		<?php } ?>
	  </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Email</label>
    <div class="controls">
      <input type="text" name="email" class="span3">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Password</label>
    <div class="controls">
      <input type="password" name="password1" >
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Repeat Password</label>
    <div class="controls">
      <input type="password" name="password2">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Telephone number</label>
    <div class="controls">
      <input type="text" name="telephone" size="30">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Fax number</label>
    <div class="controls">
      <input type="text" name="mobile" size="30">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label">Remarks</label>
    <div class="controls">
      <textarea name="remarks" class="span3" style="height:100px"></textarea>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label"></label>
    <div class="controls">
      <button type="button" name="" class="btn" onclick="window.location.href='<?php echo base_url()."employer" ?>'"><i class="icon-backward"></i> Back</button>
      <button type="submit" name="" class="btn btn-success"><i class="icon-download-alt icon-white"></i> Submit</button>
    </div>
  </div>
</form>
