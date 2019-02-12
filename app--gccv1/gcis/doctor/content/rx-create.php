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
    <input type="hidden" name="doc_licensenumber" id="doc_licensenumber" value="<?= $licensenumber_user; ?>">
	<div class="form-body">
<?php
$values = array($doc_fname, $doc_lname, $doc_profession, $doc_licensenumber, $doc_clinicname, $doc_street_add, $doc_city,
                $doc_province, $doc_postal_code, $doc_telephone, $doc_extension, $doc_email, $licensenumber_user);
widgetize('Health Care Practitioner Information','rx-healthCarePractitionerInformation.html', $values);
widgetize('Patient information','rx-patientInformation.html');
widgetize('Physician directions','rx-physicianDirections.html');
widgetize('Authorization','rx-authorization.html');
widgetize('Authorization','rx-office-stamp.html');
?>
	</div>
	<div class="form-actions">
		<div class="text-center">
			<button type="button" class="btn btn-primary" name="submit" id="submit">Submit<i class="ft-thumbs-up position-right"></i></button>
		</div>
	</div>
</form>

<script>
$(document).ready(function(){
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  
  var doc_licensenumber =   $('#doc_licensenumber').val();
  if(doc_licensenumber == ''){
    alert("Please fill out first My Account for credentials!");
    window.location.href= "my-account.html";
  }
  
  $('#submit').click(function(){
      var doc_licensenumber =   $('#doc_licensenumber').val();
      var p_fname =         $('#p_fname').val();
      var p_lname =         $('#p_lname').val();
      var p_birth =         $('#p_birth').val();
      p_birth = p_birth.toString("yyyy-mm-dd");
      var p_contact =       $('#p_contact').val();
      var phys_directions = $('#phys_directions').val();
      var prac_initial =    $('#prac_initial').val();
      var med_diagnosis =   $('#med_diagnosis').val();
      var medication =      $('#medication').val();
      var med_month =       $('#med_month').val();
      var prac_signature =  $('#prac_signature').val();
      var date_signature =  $('#date_signature').val();
      
      var data = {'doc_licensenumber' : doc_licensenumber, 'p_fname' : p_fname, 'p_lname' : p_lname, 'p_birth' : p_birth,
                  'p_contact' : p_contact, 'phys_directions' : phys_directions, 'prac_initial' : prac_initial,
                  'med_diagnosis' : med_diagnosis, 'medication' : medication, 'med_month' : med_month, 
                  'prac_signature' : prac_signature, 'date_signature' : date_signature};
      
      if(p_fname == '' || p_lname == '' || p_birth == '' || p_contact == '' || phys_directions == '' || prac_initial == '' ||
         med_diagnosis == '' || medication == '' || med_month == '' || prac_signature == '')
      {
        alert("Please fill out all field with Asterisk ( * ) Required!");
      }
      else
      {
        $.ajax({
          url : 'doctor/content/rx-create-save.php',
          method : 'POST',
          data : data,
          success : function(data){
            if(data == "save"){
              alert('Successfully created!');
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