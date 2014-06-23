		$("#login").click(function(){
		$("#error_pwd").hide();
		$("#error_email").hide();
		$("#txt_email").removeClass("error");
		$("#txt_password").removeClass("error");
			if($("#txt_email").val()=="") {
				$("#error_email").show();
				$("#txt_email").addClass("error");
				return false;
			} else if(!IsvalidEmail($("#txt_email").val())) {
				$("#error_email").show();
				$("#txt_email").addClass("error");
				return false;
			}
			if($("#txt_password").val()=="") {
				$("#error_pwd").show();
				$("#txt_password").addClass("error");
				return false;
			}	
		});
		$("#sign_up").click(function(){
			$("#error_pwd").hide();
			$("#error_name").hide();
			$("#sign_error_pwd").hide();
			$("#sign_c_error_pwd").hide();
			$("#error_email").hide();
			$("#sign_error_email").hide();
			$("#txt_email").removeClass("error");
			$("#txt_password").removeClass("error");
			$("#txt_name").removeClass("error");
			$("#txt_email_sign").removeClass("error");
			$("#txt_password_sign").removeClass("error");
			$("#txt_c_password_sign").removeClass("error");
			if($("#txt_name").val()=="") {
					$("#error_name").show();
					$("#txt_name").addClass("error");
					return false;
				}	
				if($("#txt_email_sign").val()=="") {
					$("#sign_error_email").show();
					$("#txt_email_sign").addClass("error");
					return false;
				} else if(!IsvalidEmail($("#txt_email_sign").val())) {
					$("#sign_error_email").show();
					$("#txt_email_sign").addClass("error");
					return false;
				}
				if($("#txt_password_sign").val()=="") {
					$("#sign_error_pwd").show();
					$("#txt_password_sign").addClass("error");
					return false;
				}	
				if($("#txt_c_password_sign").val()=="") {
					$("#sign_c_error_pwd").html("Confirm Password Required");
					$("#sign_c_error_pwd").show();
					$("#txt_c_password_sign").addClass("error");
					return false;
				}	
				if($("#txt_c_password_sign").val()!=$("#txt_password_sign").val()) {
					$("#sign_c_error_pwd").html("passwords does not match");
					$("#sign_c_error_pwd").show();
					$("#txt_c_password_sign").addClass("error");
					return false;
				}	
		});
		$("#c_submit").click(function(){
			$("#c_name_error").hide();
			$("#c_subj_erro").hide();
			$("#c_email_error").hide();
			$("#c_commets_erro").hide();
			$("#c_verify_error").hide();

			$("#c_email").removeClass("error");
			$("#c_name").removeClass("error");
			$("#c_subject").removeClass("error");
			$("#c_comments").removeClass("error");
			if($("#c_name").val()=="") {
				$("#c_name_error").show();
				$("#c_name").addClass("error");
				return false;
			}
			if($("#c_email").val()=="") {
				$("#c_email_error").show();
				$("#c_email").addClass("error");
				return false;
			} else if(!IsvalidEmail($("#c_email").val())) {
				$("#c_email_error").show();
				$("#c_email").addClass("error");
				return false;
			}
			if($("#c_subject").val()=="") {
				$("#c_subj_erro").show();
				$("#c_subject").addClass("error");
				return false;
			}
			if($("#c_comments").val()=="") {
				$("#c_commets_erro").show();
				$("#c_comments").addClass("error");
				return false;
			}
			if($("#verify").val()=="") {
				$("#c_verify_error").show();
				$("#verify").addClass("error");
				return false;
			}
			$("#loader").show();
			$.ajax({
				  type: "POST",
				  url: 'contact.php',
				  data: $("#contactform").serialize(),
				  success: function(data) {
					  if(data==1) {
  						$("#success").removeClass("error");
						$("#success").addClass("succ");
    				    $("#success").html("Message Sent Succefully !! Back end is not avilable");
						$("#success").show();
					  } else {
    						$("#success").addClass("error");
							$("#success").removeClass("succ");
							$("#success").html("Wrong Verfication code !!");
							$("#success").show();
					  }
					  $("#loader").hide();
				  }
				});
				
				return false;
		});
		function IsvalidEmail(email) {
	var str=email;
	var flag=true;
	var at="@";
	var dot=".";
	var lat=str.indexOf(at)
	var lstr=str.length
	var ldot=str.indexOf(dot)
	if(str=='') {
		flag=false;
	}
	if (str.indexOf(at)==-1) {
		flag=false;
	}
	if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr)
		flag=false;
	if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr)
		flag=false;
	if (str.indexOf(at,(lat+1))!=-1)
		flag=false;
	if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot)
		flag=false;
	if (str.indexOf(dot,(lat+2))==-1)
		flag=false;
	if (str.indexOf(" ")!=-1)
		flag=false;
	 if(flag)
		return true;
	 else
	 return false;
}