<?php /*?><?php 
  require_once '../core/init.php';
  if(!is_logged_in()){
    login_error_redirect();
  }
  include 'includes/head.php';
  include 'includes/navigation.php';

  if(isset($_GET['restore'])){
    $restore_id = sanitize($_GET['restore']);
    $query = $db->query("UPDATE patient_profiles SET archive = '0' WHERE id = '$restore_id'");
    echo '<script language="javascript">';
    echo 'alert("Patient data has been restored!")';
    echo '</script>';
    echo "<script>window.location.href='../admin/archives.php'</script>";
  }
?><?php */
  $db = mysqli_connect('localhost','greencar_arn','p@$$123456', 'greencar_regpatient');
	if(mysqli_connect_errno()){
		echo 'Database connection failed with following errors: ' . mysqli_connect_error();
		die();
	}

  $sql = $db->query("SELECT * FROM patient_profiles AS p
                     JOIN indication_of_cannabis       AS a ON a.health_card = p.health_card
                     JOIN psychiatric_history          AS b ON b.health_card = p.health_card
                     JOIN medical_history              AS c ON c.health_card = p.health_card
                     JOIN home_life                    AS d ON d.health_card = p.health_card
                     JOIN drug_and_alcohol_history     AS e ON e.health_card = p.health_card
                     JOIN currently_cannabis_use       AS f ON f.health_card = p.health_card
                     JOIN patient_health_questionaire  AS g ON g.health_card = p.health_card
                     JOIN pain_questionaire            AS h ON h.health_card = p.health_card
                     JOIN opioid_risks                 AS i ON i.health_card = p.health_card
                     JOIN hear_about_us                AS j ON j.health_card = p.health_card
                     WHERE archive = '1'");
  
?>
<br><br><br>
  <h2 class="text-center"> Archives List </h2>
	<div class="container-fluid">
		<div class="row">
      <br>
        <div class="col-md-8"></div>

        <div class="form-group col-md-4">
            <label for="inputdefault">Search</label>
          <div class="input-group">
            <input type="text" name="search_text" id="search_text" placeholder="Search by First Name" class="form-control input-sm" />
          </div>
        </div>
      <br>
      <div class="table-responsive col-md-12" id="result">
        <table class="table table-bordered table-striped table-condensed table-hover">
          <thead class="bg-primary">
            <th></th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Health Card No.</th>
          </thead>
          <tbody>
            <?php while($user = mysqli_fetch_assoc($sql)) : ?>
              <tr>
                <td>
                  <a href="../admin/archives.php?restore=<?= $user['id']; ?>" class="btn btn-xs btn-default badge badge-warning"><span class="glyphicon glyphicon-refresh"></span></a>
                </td>
                <td><?= $user['firstname']; ?></td>
                <td><?= $user['lastname']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['health_card']; ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
	</div>
<?php
	include 'includes/footer.php';
?>

<script>
  $(document).ready(function(){
    $('#search_text').keyup(function(){
      var txt = $(this).val();
      if(txt == ''){
        $('#result').html('');
        $.ajax({
          url: "archivesfetch.php",
          method: "post",
          data: {search:''},
          dataType: "text",
          success: function(data){
            $('#result').html(data);
          }
        });
      }else{
        $('#result').html('');
        $.ajax({
          url: "patient-archives-fetch.php",
          method: "post",
          data: {search:txt},
          dataType: "text",
          success: function(data){
            $('#result').html(data);
          }
        });
      }
    });
  });
</script>