	<ul class="breadcrumb breadcrumb-medium">
	  <li><a href="#">TRANSACTION</a><span class="divider"><i class="icon-play"></i></span></li>
	  <li class="active" >DEPARTING</li>
	  <li class="pull-right span7 active">
	     <div class="form-horizontal pull-right">
		  <div class="control-group">
			  <div class="control-label">
				  <label>Select Company :</label>
			  </div>
			  <div class="controls">
				  <select id="agency">
					<option value='<?php echo base_url()."transaction/processing" ?>'>AGENCY</option>
					<?php
					for($i=0;$i<count($agency);$i++){
						if($id == $agency[$i][0]) {
							?>
								<option value='<?php echo base_url()."transaction/processing/".$agency[$i][0] ?>' selected><?php echo $agency[$i][1]." (".$agency[$i][2].")" ?></option>
							<?php
						}else{ 
							?>
								<option value='<?php echo base_url()."transaction/processing/".$agency[$i][0] ?>'><?php echo $agency[$i][1]." (".$agency[$i][2].")" ?></option>
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
	<button class="btn" type="button" onclick="window.location.href='<?php echo base_url('transaction/departure/'.$this->uri->segment(3))?>'"><i class="icon-arrow-left"></i> Return</button>
	<br><br>
	<table class="table table-condensed table-hover table-bordered" id="processtable">
		<tr>
			<td style="width:200px" rowspan="7"><img src="<?php if(isset($uploadphoto[0]['appid'])) echo base_url()."documents/photos/".$uploadphoto[0]['appid'].".".$uploadphoto[0]['type']; ?>" class="img-polaroid" style="height:200px;width:180px;" 	></td>
			
			<td><b>Status :</b> Processed</td>
			<td><b>Date Approve :</b> Proccess</td>
		</tr>
		<tr>
			<td colspan="2"><b>Position :</b> </td>
		</tr>
		</tr>
		<tr>
			<td colspan="2"><b>Name :</b> <?php echo $personalbackground[0]['lastname'].", ".$personalbackground[0]['firstname']." ".substr($personalbackground[0]['middlename'],0,1)."."  ?> </td>
		</tr>
		<tr>
			<td colspan="2"><b>Email :</b> <?php echo $personalbackground[0]['email'] ?></td>
		</tr>
		<tr>
			<td colspan="2"><b>Mobile :</b> <?php echo $personalbackground[0]['cmobile'] ?></td>
		</tr>
		<tr>
			<td colspan="2"><b>Current Address :</b> <?php echo $personalbackground[0]['caddress'] ?></td>
		</tr>
		<tr>
			<td colspan="2"><b>Resume : </b>
						<?php if(isset($uploadresume['0'])){ ?>
						<a href="<?php echo "http://docs.google.com/viewer?url=".base_url()."documents/resumes/".$uploadresume['0']['appid'].".".$uploadresume['0']['type'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" id="view"><i class="icon-zoom-in"></i></a>
						<a href="<?php echo base_url()."documents/resumes/".$uploadresume['0']['appid'].".".$uploadresume['0']['type'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download" id="download"><i class=" icon-download-alt"></i></a>
						<?php }else  echo "No Resume Uploaded"; ?></td>
		</tr>
		<tr>
			<td colspan="3">
				<b>List Of Requirements :</b> 
				<?php 
					$numItems = count($requirements);
					$i = 0;
					if(!empty($requirements)){
						foreach($requirements as $rows){
							if(++$i === $numItems) echo $rows['requirement']."... "; 
							else echo $rows['requirement'].", "; 
						}
					}
				?>
			</td>
		</tr>
	</table>
	<?php //var_dump($personalbackground); ?>

    <form id="fileupload" action="<?php echo base_url()?>transaction/upload/" method="POST" enctype="multipart/form-data">
        <div class="row fileupload-buttonbar" style="padding-left:30px;">
            <div class="span7">
                <span class="btn btn-success fileinput-button">
                    <i class="icon-plus icon-white"></i>
                    <span>Add Documents...</span>
                    <input type="file" name="files[]" multiple>
                </span>
                <button type="submit" class="btn btn-primary start">
                    <i class="icon-upload icon-white"></i>
                    <span>Start upload</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    <span>Cancel upload</span>
                </button>
                <button type="button" class="btn btn-danger delete">
                    <i class="icon-trash icon-white"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" class="toggle">
            </div>
            <div class="span5 fileupload-progress fade">
                <div class="progress progress-success progress-striped active">
                    <div class="bar" style="width:0%;"></div>
                </div>
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <div class="fileupload-loading"></div>
        <br>
        <table class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
	</form>
	
	<div id="modal-gallery" class="modal modal-gallery hide fade" data-filter=":odd">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3 class="modal-title"></h3>
		</div>
		<div class="modal-body"><div class="modal-image"></div></div>
		<div class="modal-footer">
			<a class="btn modal-download" target="_blank">
				<i class="icon-download"></i>
				<span>Download</span>
			</a>
			<a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000">
				<i class="icon-play icon-white"></i>
				<span>Slideshow</span>
			</a>
			<a class="btn btn-info modal-prev">
				<i class="icon-arrow-left icon-white"></i>
				<span>Previous</span>
			</a>
			<a class="btn btn-primary modal-next">
				<span>Next</span>
				<i class="icon-arrow-right icon-white"></i>
			</a>
		</div>
	</div>
	<script id="template-upload" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
		<tr class="template-upload fade">
			<td class="preview"><span class="fade"></span></td>
			<td class="name"><span>{%=file.name%}</span></td>
			<td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
			{% if (file.error) { %}
				<td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
			{% } else if (o.files.valid && !i) { %}
				<td>
					<div class="progress progress-success progress-striped active"><div class="bar" style="width:0%;"></div></div>
				</td>
				<td class="start">{% if (!o.options.autoUpload) { %}
					<button class="btn btn-primary">
						<i class="icon-upload icon-white"></i>
						<span>{%=locale.fileupload.start%}</span>
					</button>
				{% } %}</td>
			{% } else { %}
				<td colspan="2"></td>
			{% } %}
			<td class="cancel">{% if (!i) { %}
				<button class="btn btn-warning">
					<i class="icon-ban-circle icon-white"></i>
					<span>{%=locale.fileupload.cancel%}</span>
				</button>
			{% } %}</td>
		</tr>
	{% } %}
	</script>
	<script id="template-download" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
		<tr class="template-download fade">
			{% if (file.error) { %}
				<td></td>
				<td class="name"><span>{%=file.name%}</span></td>
				<td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
				<td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
			{% } else { %}
				<td class="preview">{% if (file.thumbnail_url) { %}
					<a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
				{% } %}</td>
				<td class="name">
					<a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
				</td>
				<td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
				<td colspan="2"></td>
			{% } %}
			<td class="delete">
				<button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
					<i class="icon-trash icon-white"></i>
					<span>{%=locale.fileupload.destroy%}</span>
				</button>
				<input type="checkbox" name="delete" value="1">
			</td>
		</tr>
	{% } %}
	</script>
	<script src="<?php echo base_url()?>js/vendor/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url()?>js/tmpl.min.js"></script>
	<script src="<?php echo base_url()?>js/load-image.min.js"></script>
	<script src="<?php echo base_url()?>js/canvas-to-blob.min.js"></script>
	<script src="<?php echo base_url()?>js/jquery.iframe-transport.js"></script>
	<script src="<?php echo base_url()?>js/jquery.fileupload.js"></script>
	<script src="<?php echo base_url()?>js/jquery.fileupload-fp.js"></script>
	<script src="<?php echo base_url()?>js/jquery.fileupload-ui.js"></script>
	<script src="<?php echo base_url()?>js/locale.js"></script>
	<script src="<?php echo base_url()?>js/main.js"></script>
	<script>
		$('.files').parent().css('width','900px');
	</script>
