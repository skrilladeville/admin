<?php 
  $db = mysqli_connect( "localhost", "room", "Algorithm007!", "gcis" );
  if(mysqli_connect_errno()){
    echo 'Database connection failed with following errors: ' . mysqli_connect_error();
    die();
  }
  
  $doc_fname = $_POST['doc_fname'];
  $doc_lname = $_POST['doc_lname'];
  $doc_profession = $_POST['doc_profession'];
  $doc_licensenumber = $_POST['doc_licensenumber'];
  $doc_clinicname = $_POST['doc_clinicname'];
  $doc_street_add = $_POST['doc_street_add'];
  $doc_city = $_POST['doc_city'];
  $doc_province = $_POST['doc_province'];
  $doc_postal_code = $_POST['doc_postal_code'];
  $doc_telephone = $_POST['doc_telephone'];
  $doc_extension = $_POST['doc_extension'];
  $doc_email = $_POST['doc_email'];
  $user_name = $_POST['user_name'];
  date_default_timezone_set('Asia/Manila');
  $date_create = date('Y-m-d H:i:s');

  $query = $db->query("SELECT * FROM myaccount_doctor WHERE licensenumber = '$doc_licensenumber'");
  $count_licensenumber = mysqli_num_rows($query);

  if($count_licensenumber > 0)
  {
    $query = "UPDATE myaccount_doctor SET fname = '$doc_fname', lname = '$doc_lname', profession = '$doc_profession',
                                          licensenumber = '$doc_licensenumber', clinicname = '$doc_clinicname', 
                                          street_add = '$doc_street_add', city = '$doc_city', province = '$doc_province',
                                          postal_code = '$doc_postal_code', telephone = '$doc_telephone', 
                                          extension = '$doc_extension', email = '$doc_email', 
                                          street_add2 = '$doc_street_add2', city2 = '$doc_city2', 
                                          province2 = '$doc_province2', postal_code2 = '$doc_postal_code2', 
                                          date_create = '$date_create'
              WHERE licensenumber = '$doc_licensenumber'";
  }
  else
  {
    $query = "INSERT INTO myaccount_doctor (fname, lname, profession, licensenumber, clinicname, street_add, city, province,
                                            postal_code, telephone, extension, email, street_add2, city2, province2,
                                            postal_code2, date_create)
              VALUES ('$doc_fname', '$doc_lname', '$doc_profession', '$doc_licensenumber', '$doc_clinicname', '$doc_street_add',
                      '$doc_city', '$doc_province', '$doc_postal_code', '$doc_telephone', '$doc_extension', '$doc_email', 
                      '$doc_street_add2', '$doc_city2', '$doc_province2', '$doc_postal_code2', '$date_create')";
    
    $query_user = "UPDATE gcis_users SET licensenumber = '$doc_licensenumber' WHERE username = '$user_name'";
  }

  if($db->query($query)){
    $db->query($query_user);
    echo "save";
  }else{
    echo "Error <br>" . $db->error;
  }
?>