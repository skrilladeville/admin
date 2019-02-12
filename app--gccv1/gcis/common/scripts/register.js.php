<script type="text/javascript">
$(document).ready(function(){ 
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

	var i_agree = document.getElementById("i_agree");


	i_agree.onchange = function(){
		if(this.checked){
			$('#submit').removeAttr('disabled'); //enable input
		} else {
			$('#submit').attr('disabled', true); //disable input
		}
	}

	$('#submit').click(function(){
		var first_name = $("#first_name").val();
		var last_name = $("#last_name").val();
		var display_name = $("#display_name").val();
		var email = $("#email").val();
		var password = $("#password").val();
		var password_confirmation = $("#password_confirmation").val();
		var i_agree = $("#i_agree").val();

		var data = {'first_name' : first_name, 'last_name' : last_name, 'display_name' : display_name, 'email' : email, 
								'password' : password};

		if($("#i_agree").is(':checked')){
			if(first_name == '' || last_name == '' || display_name == '' || email == '' || password == '' || password_confirmation == '')
			{
				alert("Please fill all blanks with asterisk(*)!");
			}else if(!$('#email').val().match(mailformat)){
				alert("Please input a valid Email Addres!");
			}else if(password != password_confirmation){
				alert("Confirmation Password is not matched with Password!");
			}else{
				$.ajax({
					url : 'register_add.php',
					method : 'POST',
					data : data,
					success : function(data){
						if(data == "register"){
							alert('Successfully Registered!');
							window.location.href='./';
						}else if(data == "existing username"){
							alert('Sorry Username is already used!');
						}else if(data == "existing email"){
							alert('Sorry Email Address is already used!');
						}
						else{
							alert(data);
						}
					},
					error : function(){alert('(AJAX) Something weng wrong!');},
				});
			}
		}else{
			alert("Please check the \"I Agree\"!");
		}        
	});
});
</script>