<?php 
  $query = $db->query("SELECT licensenumber FROM gcis_users WHERE username = '$user_name'");
  $rows = mysqli_fetch_array($query);
  $licensenumber_user = $rows['licensenumber'];

  if($licensenumber_user != ''){
    $query = $db->query("SELECT * FROM myaccount_doctor WHERE licensenumber = '$licensenumber_user'");
    $rows = mysqli_fetch_array($query);
    
    $doc_fname = $rows['fname'];
    $doc_lname = $rows['lname'];
    $doc_profession = $rows['profession'];
    $doc_licensenumber = $rows['licensenumber'];
    $doc_clinicname = $rows['clinicname'];
    $doc_street_add = $rows['street_add'];
    $doc_city = $rows['city'];
    $doc_province = $rows['province'];
    $doc_postal_code = $rows['postal_code'];
    $doc_telephone = $rows['telephone'];
    $doc_extension = $rows['extension'];
    $doc_email = $rows['email'];
  }
  
?>

<form action="" method="post">
    <input type="hidden" name="user_name" id="user_name" value="<?= $user_name; ?>">
	<div class="form-body">
<?php
$values = array($doc_fname, $doc_lname, $doc_profession, $doc_licensenumber, $doc_clinicname, $doc_street_add, $doc_city,
                $doc_province, $doc_postal_code, $doc_telephone, $doc_extension, $doc_email, $licensenumber_user);
widgetize('Personal Information','rx-healthCarePractitionerInformation.html', $values);
?>
	</div>
	<div class="form-actions">
		<div class="text-center">
			<button type="button" name="save" id="save" class="btn btn-primary">
				<i class="fa fa-check-square-o"></i>Save
			</button>
		</div>
	</div>
</form>

<script>
  $(document).ready(function(){
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    $('#save').click(function(){
      var doc_fname =           $('#doc_fname').val();
      var doc_lname =           $('#doc_lname').val();
      var doc_profession =      $('#doc_profession').val();
      var doc_licensenumber =   $('#doc_licensenumber').val();
      var doc_clinicname =      $('#doc_clinicname').val();
      var doc_street_add =      $('#doc_street_add').val();
      var doc_city =            $('#doc_city').val();
      var doc_province =        $('#doc_province').val();
      var doc_postal_code =     $('#doc_postal_code').val();
      var doc_telephone =       $('#doc_telephone').val();
      var doc_extension =       $('#doc_extension').val();
      var doc_fax =             $('#doc_fax').val();
      var doc_email =           $('#doc_email').val();
      var user_name =           $('#user_name').val();
      
      var data = {'doc_fname' : doc_fname, 'doc_lname' : doc_lname, 'doc_profession' : doc_profession, 
                  'doc_licensenumber' : doc_licensenumber, 'doc_clinicname' : doc_clinicname, 'doc_street_add' : doc_street_add, 
                  'doc_city' : doc_city, 'doc_province' : doc_province, 'doc_postal_code' : doc_postal_code, 
                  'doc_telephone' : doc_telephone, 'doc_extension' : doc_extension, 'doc_fax' : doc_fax,
                  'doc_email' : doc_email, 'user_name' : user_name};
      
      if(doc_fname == '' || doc_lname == '' || doc_profession == '' || doc_licensenumber == '' || doc_clinicname == '' || 
         doc_street_add == '' || doc_city == '' || doc_province == '' || doc_postal_code == '' || doc_telephone == '' || 
         doc_extension == '' || doc_fax  == '' || doc_email == '')
      {
        alert("Please fill out all field with Asterisk ( * ) Required!");
      }
      else if(!$('#doc_email').val().match(mailformat))
      {
        alert("Please input a valid Email Addres!");
      }
      else
      {
        $.ajax({
          url : 'doctor/content/my-account-save.php',
          method : 'POST',
          data : data,
          success : function(data){
            if(data == "save"){
              alert('Successfully Save!');
            }else{
              alert(data);
            }
          },
          error : function(){alert('Something weng wrong!');},
        });
      }
    });
  });
  </script>