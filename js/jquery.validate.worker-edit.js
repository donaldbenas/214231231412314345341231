$(document).ready(function(){
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
