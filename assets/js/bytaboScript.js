      //Stair Singel
      $(function() {
        $( "#slider-Stair" ).slider({          
          min: 1,
          max: 15,
          values: [ 5 ],
          slide: function( event, ui ) {
            $( "#Stair" ).val( "Våningsplan: " + ui.values[ 0 ] );
          }
        });
        $( "#Stair" ).val( "Våningsplan: " + $( "#slider-Stair" ).slider( "values", 0 ));
      });

      //Stair Range
      $(function() {
        $( "#slider-StairRange" ).slider({
          range: true,
          min: 1,
          max: 15,
          values: [ 2, 8 ],
          slide: function( event, ui ) {
            $( "#StairRange" ).val( "Våningsplan: MIN. " + ui.values[ 0 ] + " - MAX. " + ui.values[ 1 ] );
          }
        });
        $( "#StairRange" ).val( "Våningsplan: MIN. " + $( "#slider-StairRange" ).slider( "values", 0 ) +
          " - MAX. " + $( "#slider-StairRange" ).slider( "values", 1 ) );
      });

      //Room Singel
      $(function() {
        $( "#slider-NoRooms" ).slider({          
          min: 1,
          max: 14,
          values: [ 3 ],
          slide: function( event, ui ) {
            $( "#NoRooms" ).val( "Antal Rum: " + ui.values[ 0 ] );
          }
        });
        $( "#NoRooms" ).val( "Antal Rum: " + $( "#slider-NoRooms" ).slider( "values", 0 ));
      });

      //Room Range
      $(function() {
        $( "#slider-NoRoomsRange" ).slider({
          range: true,
          min: 1,
          max: 15,
          values: [ 2, 4 ],
          slide: function( event, ui ) {
            $( "#NoRoomsRange" ).val( "Antal Rum: MIN. " + ui.values[ 0 ] + " - MAX. " + ui.values[ 1 ] );
          }
        });
        $( "#NoRoomsRange" ).val( "Antal Rum: MIN. " + $( "#slider-NoRoomsRange" ).slider( "values", 0 ) +
          " - MAX. " + $( "#slider-NoRoomsRange" ).slider( "values", 1 ) );
      });

      //Bathroom Singel
      $(function() {
        $( "#slider-NoBathRooms" ).slider({          
          min: 1,
          max: 5,
          values: [ 1 ],
          slide: function( event, ui ) {
            $( "#NoBathRooms" ).val( "Antal Badrum: " + ui.values[ 0 ] );
          }
        });
        $( "#NoBathRooms" ).val( "Antal Badrum: " + $( "#slider-NoBathRooms" ).slider( "values", 0 ));
      });

      //Bathroom Range
      $(function() {
        $( "#slider-NoBathRoomsRange" ).slider({
          range: true,
          min: 1,
          max: 15,
          values: [ 1, 3 ],
          slide: function( event, ui ) {
            $( "#NoBathRoomsRange" ).val( "Antal Badrum: MIN. " + ui.values[ 0 ] + " - MAX. " + ui.values[ 1 ] );
          }
        });
        $( "#NoBathRoomsRange" ).val( "Antal Badrum: MIN. " + $( "#slider-NoBathRoomsRange" ).slider( "values", 0 ) +
          " - MAX. " + $( "#slider-NoBathRoomsRange" ).slider( "values", 1 ) );
      });

      //House Rent Range
      $(function() {
        $( "#slider-HouseRent" ).slider({
          range: true,
          min: 1000,
          max: 15000,
          values: [ 2500, 5500 ],
          slide: function( event, ui ) {
            $( "#HouseRent" ).val( "Ryra: MIN Kr. " + ui.values[ 0 ] + " - MAX Kr. " + ui.values[ 1 ] );
          }
        });
        $( "#HouseRent" ).val( "Ryra: MIN Kr. " + $( "#slider-HouseRent" ).slider( "values", 0 ) +
          " - MAX Kr. " + $( "#slider-HouseRent" ).slider( "values", 1 ) );
      });

      //Area Rent Range
      $(function() {
        $( "#slider-Area" ).slider({
          range: true,
          min: 10,
          max: 100,
          values: [ 50, 80 ],
          slide: function( event, ui ) {
            $( "#Area" ).val( "Boyta: MIN Kvm. " + ui.values[ 0 ] + " - MAX Kvm. " + ui.values[ 1 ] );
          }
        });
        $( "#Area" ).val( "Boyta: MIN Kvm. " + $( "#slider-Area" ).slider( "values", 0 ) +
          " - MAX Kvm. " + $( "#slider-Area" ).slider( "values", 1 ) );
      });

      //House Rent Singel
       $(function() {
        $( "#slider-HouseRentHave" ).slider({          
          min: 1000,
          max: 15000,
          values: [ 5000 ],
          slide: function( event, ui ) {
            $( "#HouseRentHave" ).val( "Ryra: Kr. " + ui.values[ 0 ] );
          }
        });
        $( "#HouseRentHave" ).val( "Ryra: Kr. " + $( "#slider-HouseRentHave" ).slider( "values", 0 ));
      });

       //Area Rent Singel
       $(function() {
        $( "#slider-AreaHave" ).slider({          
          min: 10,
          max: 200,
          values: [ 50 ],
          slide: function( event, ui ) {
            $( "#AreaHave" ).val( "Boyta: Kvm. " + ui.values[ 0 ] );
          }
        });
        $( "#AreaHave" ).val( "Boyta: Kvm. " + $( "#slider-AreaHave" ).slider( "values", 0 ));
      });

       $(function(){
        $("#geocomplete").geocomplete({
          map: "",
          types: ['establishment'],
          details: "form",
          country: 'se'
        });
      });

       function randomnum(){
            var number1 = 1;
            var number2 = 5;
            var randomnum = (parseInt(number2) - parseInt(number1)) + 1;
            var rand1 = Math.floor(Math.random()*randomnum)+parseInt(number1);
            var rand2 = Math.floor(Math.random()*randomnum)+parseInt(number1);
            $(".rand1").html(rand1);
            $(".rand2").html(rand2);
        }

        $(document).ready(function(){

          $("#register").click(function(){

            var pass = $('#pwd').val();
            var cpass = $('#cpwd').val();
            $('.confirm_pass').text("");
            if(pass!=cpass){
              $('.confirm_pass').text("Ditt lösenord matchar inte!");
            }else{
              var total=parseInt($('.rand1').html())+parseInt($('.rand2').html());
              var total1=$('#total').val();
              $('.captha_match').text("");
              if(total!=total1){
                $('.captha_match').text("Din kodningsverktyg är felaktig!");
              }else{
                $('#frmRegister').submit();
              }
            }              
          });
          randomnum();
          
          
          
          $('#send_pass').click(function(){
    		if($('#user_name').val() != ""){
    			
    			$('.statusPasswordSend').text("");
                        $('.statusPasswordNotSend').text("");
    			
    			$.ajax({  
    				type: "POST",  
      			  	url: "./sendPass.php",  
      			  	data: 'user_name=' + $('#user_name').val(),  
	      			success: function(result,status) { 
	      				//email sent successfully displays a success message
	      				if(result == 'Password Sent'){
	      					$('.statusPasswordSend').text("Ditt lösenord skickas till följande e -post:" + $('#user_name').val());
                                                document.getElementById("user_name").disabled = true;
                                                document.getElementById("send_pass").disabled = true;
	      				} else {
	      					$('.statusPasswordNotSend').text("Lösenord gick inte att Skicka!");
                                                setTimeout(function (){
                                                  window.location="./sendMailConfirmation.php?user_name=" + $('#user_name').val();                                                
                                                }, 5000);
	      				}
	      			},
	      			error: function(result,status){
	      				$('.statusPasswordNotSend').text("Lösenord gick inte att Skicka!");
	      			}  
      			});
    		}
    	});
        
        $('#send_act_code').click(function(){
    		if($('#act_code').val() != ""){    			
    			$('.statusActivation').text("");    			
    			$.ajax({  
    				type: "POST",  
      			  	url: "./activateCode.php",  
      			  	data: 'act_code=' + $('#act_code').val() + '&user_name=' + $('#user_name').val(), 
	      			success: function(result,status) { 
	      				//Registration Confirmed using Actiovation Code 
	      				if(result == 'Account Activated'){
	      					$('.statusActivation').text("Tack, ditt konto har aktiverats.");
                                                document.getElementById("act_code").disabled = true;
                                                document.getElementById("send_act_code").disabled = true;
                                                setTimeout(function (){
                                                  window.location="./formRegister.php";                                                
                                                }, 5000);
                                                
	      				} else {
	      					$('.statusActivation').text("Aktiveringen Misslyckades! Försök igen");
	      				}
	      			},
	      			error: function(result,status){
	      				$('.statusActivation').text("Aktiveringen Misslyckades! Försök igen");
	      			}  
      			});
    		}
    	});
        
        $("#add_err").css('display', 'none', 'important');
        $("#linkForgotPass").css("display", "none");
        $("#login").click(function(){
            username=$("#user_email").val();
            password=$("#pWord").val();

            $.ajax({
             type: "POST",
             url: "./loginCheck.php",
             data: "user_email="+username+"&pWord="+password,
             success: function(html){

                if(html=='true'){
                    window.location="./MyPanel.php";
                }else{
                    $('#box').shake();
                    $("#add_err").css('display', 'inline', 'important');
                    $("#add_err").html("<img src='assets/img/pass_error.png' />Fel användarnamn eller lösenord");
                    $("#linkForgotPass").css("display", "block");
                }
             },
             beforeSend:function(){
                $("#add_err").css('display', 'inline', 'important');
                $("#add_err").html("<img src='./assets/img/progressbar.gif' /> Loading...")
             }
            });
       return false;
        });
          $(".imagePreview").hide();
        $("#cmbProtertyType").change(function() {
         $(".imagePreview").empty();
         $(".imagePreview").show();
         if ( $("#cmbProtertyType").val()!="" ){
            $(".imagePreview").append("<img src=\"assets/img/HouseType/" + $("#cmbProtertyType").val()  + ".png\" />");
         }
         else{
            $(".imagePreview").hide();
         }
       });

       $('#myTab').turbotabs({
        animation : 'ScrollUp'
    }); 
      
      $('.bxslider').bxSlider({
  auto: true,
  autoControls: true,
  adaptiveHeight: true,
  mode: 'fade',
  controls: false,
  nextText: ''
});
  
  $("#tabs li").click(function() {
        //  First remove class "active" from currently active tab
        $("#tabs li").removeClass('active');
 
        //  Now add class "active" to the selected/clicked tab
        $(this).addClass("active");
 
        //  Hide all tab content
        $(".tab_content").hide();
 
        //  Here we get the href value of the selected tab
        var selected_tab = $(this).find("a").attr("href");
 
        //  Show the selected tab content
        $(selected_tab).fadeIn();
 
        //  At the end, we add return false so that the click on the link is not executed
        return false;
    });

      
});