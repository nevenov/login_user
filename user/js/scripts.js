$(document).ready(function(){


	var user_email;
	var user_id;

	$( "#email-input" ).keyup(function() {

	  	user_email 	= $('#email-input').val();
	  	user_id 	= $('#user_id_hidden').val();

	  	$.ajax({

	  		url: "includes/email_check.php",
	  		data: {user_email: user_email, user_id: user_id},
	  		type: "POST",
	  		success:function(data){

	  			

				if(data == "submit") {

					$("input[type=submit]").removeAttr('disabled');
					$("#email_warning").html('');
					//console.log(data);

				} else {


					$("#email_warning").html(data);
					$("input[type=submit]").attr('disabled','disabled');
					//console.log(data);

				}				

			}

	  	});


	});
	

});