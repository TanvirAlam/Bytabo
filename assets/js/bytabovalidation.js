$(function() {

	// process the form
	$('#formHave').submit(function(event) {

		$('.form-group').removeClass('has-error'); // remove the error class
		$('.help-block').remove(); // remove the error text

		// get the form data
		// there are many ways to get this data using jQuery (you can use the class or id also)
                
                  var selectedCheckBoxArray = new Array();
                  var n = $('input[type=checkbox]:checked').length;
                  if (n > 0){
                      $('input[type=checkbox]:checked').each(function(){
                          selectedCheckBoxArray.push($(this).val());
                      });
                  }
                  //alert(selectedCheckBoxArray);
		var formData = {
                  
                        'RegisterType' 	  : $('input[name=RegisterType]').val(),
			'address' 	  : $('input[name=address]').val(),
			'description' 	  : $('textarea[name=description]').val(),
			'cmbProtertyType' : $('select[name=cmbProtertyType]').val(),
                        'postal_code'     : $('input[name=postal_code]').val(),
                        'lat'             : $('input[name=lat]').val(),
                        'lng'             : $('input[name=lng]').val(),
                        'cmblandlord'     : $('select[name=cmblandlord]').val(),
                        'cmbBredband'     : $('select[name=cmbBredband]').val(),
                        'HouseRentHave'   : $('input[name=HouseRentHave]').val(),
                        'Stair'           : $('input[name=Stair]').val(),
                        'NoBathRooms'     : $('input[name=NoBathRooms]').val(),
                        'NoRooms'         : $('input[name=NoRooms]').val(),
                        'AreaHave'        : $('input[name=AreaHave]').val(),
                        'HaveCheckboxes'  : selectedCheckBoxArray
		};

		// process the form
		$.ajax({
			type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url 		: './processHave.php', // the url where we want to POST
			data 		: formData, // our data object
			dataType 	: 'json', // what type of data do we expect back from the server
			encode 		: true
		})
			// using the done promise callback
			.done(function(data) {

				// log data to the console so we can see
				//console.log(data); 

				// here we will handle errors and validation messages
				if ( ! data.success) {
					
					// handle errors for address ---------------
					if (data.errors.address) {
						$('#address-group').addClass('has-error'); // add the error class to show red input
						$('#address-group').append('<div class="help-block">' + data.errors.address + '</div>'); // add the actual error message under our input
					}

					// handle errors for description ---------------
					if (data.errors.description) {
						$('#description-group').addClass('has-error'); // add the error class to show red input
						$('#description-group').append('<div class="help-block">' + data.errors.description + '</div>'); // add the actual error message under our input
					}

					// handle errors for cmbProtertyType ---------------
					if (data.errors.cmbProtertyType) {
						$('#cmbProtertyType-group').addClass('has-error'); // add the error class to show red input
						$('#cmbProtertyType-group').append('<div class="help-block">' + data.errors.cmbProtertyType + '</div>'); // add the actual error message under our input
					}

				} else {
					
					 window.location = './ImageUpload.php'; // redirect a user to another page

				}
			})

			// using the fail promise callback
			.fail(function(data) {

				// show any errors
				// best to remove for production
				//console.log(data);
			});

		// stop the form from submitting the normal way and refreshing the page
		event.preventDefault();
	});
        
         $('#formWant').submit(function(event) {

		$('.form-group').removeClass('has-error'); // remove the error class
		$('.help-block').remove(); // remove the error text

		// get the form data
		// there are many ways to get this data using jQuery (you can use the class or id also)
                
                  var selectedCheckBoxArray = new Array();
                  var n = $('input[type=checkbox]:checked').length;
                  if (n > 0){
                      $('input[type=checkbox]:checked').each(function(){
                          selectedCheckBoxArray.push($(this).val());
                      });
                  }
                  
                  var multipleAddress = $( "#address" ).val() || [];
                  var multipleLandlord = $( "#landlord" ).val() || [];
                  //alert(selectedCheckBoxArray);
		var formData = {
                  
                        'RegisterType' 	  : $('input[name=RegisterType]').val(),
			'WantAddress' 	  : multipleAddress,
			'description' 	  : $('textarea[name=description]').val(),
			'cmbProtertyType' : $('select[name=cmbProtertyType]').val(),
                        'Wantcmblandlord' : multipleLandlord,
                        'RentRange'   : $('input[name=RentRange]').val(),
                        'StairRange'           : $('input[name=StairRange]').val(),
                        'NoBathRoomsRange'     : $('input[name=NoBathRoomsRange]').val(),
                        'NoRoomsRange'         : $('input[name=NoRoomsRange]').val(),
                        'AreaRange'        : $('input[name=AreaRange]').val(),
                        'WantCheckboxes'  : selectedCheckBoxArray
		};

		// process the form
		$.ajax({
			type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url 		: './processWant.php', // the url where we want to POST
			data 		: formData, // our data object
			dataType 	: 'json', // what type of data do we expect back from the server
			encode 		: true
		})
			// using the done promise callback
			.done(function(data) {

				// log data to the console so we can see
				//console.log(data); 

				// here we will handle errors and validation messages
				if ( ! data.success) {
					
					// handle errors for address ---------------
					if (data.errors.address) {
						$('#address-group').addClass('has-error'); // add the error class to show red input
						$('#address-group').append('<div class="help-block">' + data.errors.address + '</div>'); // add the actual error message under our input
					}

					// handle errors for description ---------------
					if (data.errors.description) {
						$('#description-group').addClass('has-error'); // add the error class to show red input
						$('#description-group').append('<div class="help-block">' + data.errors.description + '</div>'); // add the actual error message under our input
					}

					// handle errors for cmbProtertyType ---------------
					if (data.errors.cmbProtertyType) {
						$('#cmbProtertyType-group').addClass('has-error'); // add the error class to show red input
						$('#cmbProtertyType-group').append('<div class="help-block">' + data.errors.cmbProtertyType + '</div>'); // add the actual error message under our input
					}

				} else {
                                       
					 window.location = './formMyAccount.php'; // redirect a user to another page

				}
			})

			// using the fail promise callback
			.fail(function(data) {

				// show any errors
				// best to remove for production
				//console.log(data);
			});

		// stop the form from submitting the normal way and refreshing the page
		event.preventDefault();
	});
});
