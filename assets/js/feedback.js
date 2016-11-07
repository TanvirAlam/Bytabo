
(function ($j) {

  feedback_button = {

    onReady: function () {      
      this.feedback_button_click();
      this.send_feedback();
    },
    
    feedback_button_click: function(){
    	$("#feedback_button").click(function(){
    		$('.form').slideToggle();   		
    	});
    },
    
    send_feedback: function(){
    	$('#submit_form').click(function(){
    		if($('#feedback_text').val() != ""){
    			
    			$('.status').text("");
    			
    			$.ajax({  
    				type: "POST",  
      			  	url: "./process_feedback.php",  
      			  	data: 'feedback=' + $('#feedback_text').val(),  
	      			success: function(result,status) { 
	      				//email sent successfully displays a success message
	      				if(result == 'Message Sent'){
	      					$('.status').text("Tack för din feedback!");
						document.getElementById("feedback_text").disabled = true;
						document.getElementById("submit_form").disabled = true;
	      				} else {
	      					$('.status').text("Feedback Failed to Send");
	      				}
	      			},
	      			error: function(result,status){
	      				$('.status').text("Feedback Failed to Send");
	      			}  
      			});
    		}
    	});
    },
  };

  $j().ready(function () {
	  feedback_button.onReady();
  });

})(jQuery);	
