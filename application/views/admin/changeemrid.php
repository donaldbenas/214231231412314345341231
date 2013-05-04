<form method="post">
company<select name="emrid">
<?php 
foreach($employer as $rows){
	echo "<option value='".$rows->id."'>".$rows->company."</option>";
}
?>
</select>
<br>
<?php 
foreach($applicant as $rows){
	echo "<input type='checkbox' name='appid[]' value='".$rows->appid."'>".$rows->lastname.", ".$rows->firstname."<br>";
}
?>
<input type="submit" value="submit">
</form>
