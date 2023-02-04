$(document).ready(function(){
	//For User Registration__
	$('#regSubmit').click(function(){
		var name=$('#name').val();
		var username=$('#username').val();
		var phone=$('#phone').val();
		var email=$('#email').val();
		var password=$('#password').val();
		var dataString= 'name='+name+'&username='+username+'&phone='+phone+'&email='+email+'&password='+password;

		$.ajax({
			type:"POST",
			url:"getregister.php",
			data:dataString,
			success:function(data){
				$('#msg').html(data);
			}
		});
		return false;
	});

	//For User Login__
	$('#userLogin').click(function(){
		var email=$('#email').val();
		var password=$('#password').val();
		var dataString= 'email='+email+'&password='+password;

		$.ajax({
			type:"POST",
			url:"getlogin.php",
			data:dataString,
			success:function(data){
				if ($.trim(data) == "empty") {
					$(".empty").show();
					setTimeout(function(){
						$(".empty").fadeOut();
					},4000);

				} else if($.trim(data) == "disable") {
					$(".disable").show();
					setTimeout(function(){
						$(".disable").fadeOut();
					},4000);

				} else if($.trim(data) == "error") {
					$(".error").show();
					setTimeout(function(){
						$(".error").fadeOut();
					},4000);
					
				} else{
					window.location = "exam.php";
				}
			}
		});
		return false;
	});
});