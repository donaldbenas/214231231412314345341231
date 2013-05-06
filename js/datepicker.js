/**
 * @author Morgan Davison
 * jQuery Date Range Picker
 * http://www.morgandavison.com/demos/jquery-date-range-picker/
 */


(function($) {
	$.fn.dateRangePicker = function(options) {
		
		options = $.extend({
			inputDateFormat : 'yy-mm-dd',
			outputDateFormat : 'm/d/yy',
			jQDPdateFormat : 'yy-mm-dd',
			allowFuture : true,
			submitForm : false,
			iconPath : '/jquery.date-range-picker/blue-arrow-down.png'
		}, options);
		
		return this.each(function(){
			var dateForm = $(this),
				date1Val = $('#date1').val(),
				date2Val = $('#date2').val(),
				formattedDate1 = formatDate(date1Val, options.inputDateFormat, options.outputDateFormat),
				formattedDate2 = formatDate(date2Val, options.inputDateFormat, options.outputDateFormat),
				timestamp,
				iDateY,
				iDateM,
				iDateD,
				oDateY,
				oDateM,
				oDateD,
				oDateDW,
				jsDate,
				formattedDate,
				monthNamesLong,
				monthNamesShort,
				dayNamesLong,
				dayNamesShort,
				oDayFormat,
				oDayofWeekFormat,
				oMonthFormat,
				oYearFormat,
				formattedDay,
				formattedDayofWeek,
				formattedMonth,
				formattedYear;
			
			

			// replace form elements with pretty
			$('#date1').after('<div><span id="date1-replaced">' +formattedDate1+ '</span>' + 
					'<a href="#" id="dateImg1" title="Choose start date">' + 
					'<img alt="V" src="' +options.iconPath+ '" height="15" width="15"></a></div>');
			$('#date2').after('<div>&nbsp;&nbsp;&#8212;<span id="date2-replaced">' +formattedDate2+ '</span>' +
					'<a href="#" id="dateImg2" title="Choose end date">' + 
					'<img alt="V" src="' +options.iconPath+ '" height="15" width="15"></a></div>');
			$('#pickdate').css({
				'display' : 'block'
			});

			// activate the datepicker on the image click
			$('#dateImg1').click(function(){
				// allow user to toggle to remove
				if ($('#inlineDatepicker1').length != 0) {
					$('#inlineDatepicker1').remove();
					return false;
				}

				// remove any existing datepicker div
				$('#inlineDatepicker1').remove();
				$('#inlineDatepicker2').remove();
				
				// create the div for the datepicker
				$('#pickdate').after('<div id="inlineDatepicker1">');
				$('#inlineDatepicker1').css({
					'position' : 'relative',
					'margin-top' : '20px',
					'height' : 'auto',
					'width' : 'auto',
					'z-index' : '1000'
				});

				
				$('#inlineDatepicker1').datepicker({ 
					dateFormat: options.jQDPdateFormat,
					maxDate: date2Val,
					onSelect: function(dateText, inst){
						$('#date1').val(dateText);
						$('#date1-replaced').text(formatDate(dateText, options.inputDateFormat, options.outputDateFormat));
						if (options.submitForm === true) {
							$('#pickdate').submit();
						} 
						$('#inlineDatepicker1').remove();
					}
				});
				
				// allow user to cancel
				$('#inlineDatepicker1').append('<div class="remove">');
				$('.remove').click(function(){
					$('#inlineDatepicker1').remove();
					$('#inlineDatepicker2').remove();
				});
				
				// prevent the default action on the image link
				return false;
			});
			
			$('#dateImg2').click(function(){
				// allow user to toggle to remove
				if ($('#inlineDatepicker2').length != 0) {
					$('#inlineDatepicker2').remove();
					return false;
				}
				
				// remove any existing datepicker div
				$('#inlineDatepicker1').remove();
				$('#inlineDatepicker2').remove();
				
				// create the datepicker div
				$('#pickdate').after('<div id="inlineDatepicker2">');
				$('#inlineDatepicker2').css({
					'position' : 'relative',
					'margin-top' : '20px',
					'margin-left' : '50px',
					'height' : 'auto',
					'width' : 'auto',
					'z-index' : '1000'
				});
				
				if (options.allowFuture == true) {
					$('#inlineDatepicker2').datepicker({ 
						dateFormat: options.jQDPdateFormat,
						minDate : date1Val,
						onSelect: function(dateText, inst){
							$('#date2').val(dateText);
							$('#date2-replaced').text(formatDate(dateText, options.inputDateFormat, options.outputDateFormat));
							if (options.submitForm === true) {
								$('#pickdate').submit();
							} 
							$('#inlineDatepicker2').remove();
						}
					});
				} else {
					$('#inlineDatepicker2').datepicker({ 
						dateFormat: options.jQDPdateFormat,
						minDate : date1Val,
						maxDate : '+0D',
						onSelect: function(dateText, inst){
							$('#date2').val(dateText);
							$('#date2-replaced').text(formatDate(dateText, options.inputDateFormat, options.outputDateFormat));
							if (options.submitForm === true) {
								$('#pickdate').submit();
							} 
							$('#inlineDatepicker2').remove();
						}
					});
				}
				
				
				// allow user to cancel
				$('#inlineDatepicker2').append('<div class="remove">');
				$('.remove').click(function(){
					$('#inlineDatepicker1').remove();
					$('#inlineDatepicker2').remove();
				});
				
				// prevent the default action on the image link
				return false;
			});
			
			// uses jquery datepicker formatting
			// http://docs.jquery.com/UI/Datepicker/formatDate
			function formatDate(dateString, inputDateFormat, outputDateFormat){
				monthNamesLong = ['January', 
				                  'February', 
				                  'March', 
				                  'April', 
				                  'May', 
				                  'June', 
				                  'July', 
				                  'August', 
				                  'September', 
				                  'October',
				                  'November',
				                  'December'];
				
				monthNamesShort = ['Jan','Feb','Mar','Apr','May','Jun',
				                   'Jul','Aug','Sept','Oct','Nov','Dec'];
				
				dayNamesLong = ['Sunday',
				                'Monday', 
				                'Tuesday', 
				                'Wednesday', 
				                'Thursday', 
				                'Friday', 
				                'Saturday'];
				
				dayNamesShort = ['Sun', 'Mon', 'Tues','Wed','Th','Fri','Sat'];
				
				switch (inputDateFormat) {
					case 'yy-mm-dd':
						// get pieces so Date.parse can handle it
						iDateY = dateString.substring(0, 4);
						iDateM = dateString.substring(5, 7);
						iDateD = dateString.substring(8, 10);
						
						break;
					case 'y-mm-dd':
						iDateY = '20' + dateString.substring(0, 2);
						iDateM = dateString.substring(3, 5);
						iDateD = dateString.substring(6, 8);
						break;
					default:
						break;
				}

				// new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
				timestamp = new Date(iDateY, iDateM-1, iDateD); // Months are 0-based
				jsDate = new Date(timestamp);
				
				oDateY = jsDate.getFullYear();
				oDateM = jsDate.getMonth();
				oDateD = jsDate.getDate();
				oDateDW = jsDate.getDay();
				
				if (outputDateFormat.search(/(DD)/) !== -1) {
					oDayofWeekFormat = 'DD';
					formattedDayofWeek = dayNamesLong[oDateDW];
				} else if (outputDateFormat.search(/(D)/) !== -1) {
					oDayofWeekFormat = 'D';
					formattedDayofWeek = dayNamesShort[oDateDW];
				}
				
				if (outputDateFormat.search(/(dd)/) !== -1) {
					oDayFormat = 'dd';
					if (oDateD < 10) {
						formattedDay = '0' + oDateD;
					} else {
						formattedDay = oDateD;
					}
				} else if (outputDateFormat.search(/(d)/) !== -1) {
					oDayFormat = 'd';
					formattedDay = oDateD;
				}

				if (outputDateFormat.search(/(MM)/) !== -1) {
					oMonthFormat = 'MM';
					formattedMonth = monthNamesLong[oDateM];
				} else if (outputDateFormat.search(/(M)/) !== -1) {
					oMonthFormat = 'M';
					formattedMonth = monthNamesShort[oDateM];
				} else if (outputDateFormat.search(/(mm)/) !== -1) {
					oMonthFormat = 'mm';
					oDateM++;
					if (oDateM < 10) {
						formattedMonth = '0' + oDateM;
					} else {
						formattedMonth = oDateM;
					}
				} else if (outputDateFormat.search(/(m)/) !== -1) {
					oMonthFormat = 'm';
					oDateM++;
					formattedMonth = oDateM;
				}
				
				if (outputDateFormat.search(/(yy)/) !== -1) {
					oYearFormat = 'yy';
					formattedYear = oDateY;
				} else if (outputDateFormat.search(/(y)/) !== -1) {
					oYearFormat = 'y';
					formattedYear = oDateY.toString().substring(2, 4);
				} 
				
				formattedDate = outputDateFormat.replace(oDayFormat, formattedDay);
				formattedDate = formattedDate.replace(oMonthFormat, formattedMonth);
				formattedDate = formattedDate.replace(oYearFormat, formattedYear);
				formattedDate = formattedDate.replace(oDayofWeekFormat, formattedDayofWeek);
				//alert(formattedDate);
				
				return formattedDate;
			}
			
		});
	};
})(jQuery);