<?php
  $db = mysqli_connect( "localhost", "room", "Algorithm007!", "gcis" );
  if(mysqli_connect_errno()){
    echo 'Database connection failed with following errors: ' . mysqli_connect_error();
    die();
  }

  $licensenumber = $_POST['doc_licensenumber'];
  $p_fname = $_POST['p_fname'];
  $p_lname = $_POST['p_lname'];
  $p_birth = $_POST['p_birth'];
  $p_contact = $_POST['p_contact'];
  $phys_directions = $_POST['phys_directions'];
  $prac_initial = $_POST['prac_initial'];
  $med_diagnosis = $_POST['med_diagnosis'];
  $medication = $_POST['medication'];
  $med_month = $_POST['med_month'];
  $prac_signature = $_POST['prac_signature'];
  $date_signature = $_POST['date_signature'];
  date_default_timezone_set('Asia/Manila');
  $date_create = date('Y-m-d H:i:s');
   
  $query = "INSERT INTO prescriptions (licensenumber, p_fname, p_lname, p_birth, p_contact, phys_directions, prac_initial,
                                       med_diagnosis, medication, med_month, prac_signature, date_signature, prescribe_date)
            VALUES ('$licensenumber', '$p_fname', '$p_lname', '$p_birth', '$p_contact', '$phys_directions', '$prac_initial',
                    '$med_diagnosis', '$medication', '$med_month', '$prac_signature', '$date_signature', '$date_create')";

  if($db->query($query)){
    echo "save";
  }else{
    echo "Error <br>" . $db->error;
  }
?>