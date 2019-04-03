<?php 
  require_once '../core/init.php';
  $output = '';
  
  if($_POST['search'] == ''){
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
  }else{
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
                       WHERE firstname LIKE '%" . $_POST['search'] . "%' && archive = '1'");
  }
  
  if(mysqli_num_rows($sql) > 0){
    $output .= '<table class="table table-bordered table-striped table-condensed table-hover">
                  <thead class="bg-primary">
                    <th></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Health Card No.</th>
                  </thead>
                  <tbody>';
    while($user = mysqli_fetch_assoc($sql)){
      $output .= '
            <tr>
              <td>
                <a href="../admin/archives.php?restore=' . $user['id'] . '" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-refresh"></span></a>
              </td>
              <td>' . $user['firstname'] . '</td>
              <td>' . $user['lastname'] . '</td>
              <td>' . $user['email'] . '</td>
              <td>' . $user['health_card'] . '</td>
            </tr>';
    }
    $output .= '</tbody>
              </table>';
    echo $output;
  }else{
    echo 'Data Not Found!';
  }
?>