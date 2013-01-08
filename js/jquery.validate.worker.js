$(document).ready(function(){
	  $('#second_1').click(function(){
		  $('#sb').click();
		  $('#myTab #sb').tab('show');
	  });
	  $('#second_2').click(function(){
		  $('#pb').click();
		  $('#myTab #pb').tab('show');
	  });
	  $('#third_1').click(function(){
		  $('#wb').click();
		  $('#myTab #wb').tab('show');
	  });
	  $('#third_2').click(function(){
		  $('#eb').click();
		  $('#myTab #eb').tab('show');
	  });
	  $('#fourth_2').click(function(){
		  $('#sb').click();
		  $('#myTab #sb').tab('show');
	  });
	  $('#first_1').click(function(){
		  if($("#myform").valid()){
			  $('#eb').click();
			  $('#myTab #eb').tab('show');
		  }
	  });
	  $("#myform").validate({
	
		rules: {
			position1: {
				required: true
			},
			firstname: {
				required: true
			}
			,middlename: {
				required: true
			}
			,lastname: {
				required: true
			}
		},
		showErrors: function (errorMap, errorList) {

			$.each(this.successList, function (index, value) {
				$(value).popover('hide');
			});


			$.each(errorList, function (index, value) {

				console.log(value.message);

				var _popover = $(value.element).popover({
					trigger: 'manual',
					placement: 'right',
					content: value.message,
					template: '<div class="popover" style="width:auto;color:red"><div class="arrow"></div><div class="popover-inner"><div class="popover-content"><p></p></div></div></div>'
				});

				_popover.data('popover').options.content = value.message;

				$(value.element).popover('show');

			});

		}
	 });	
});
