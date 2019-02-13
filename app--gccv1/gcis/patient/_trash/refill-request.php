
  <h2 class="text-center">Active Prescription List </h2>
	<div class="container-fluid">
		<div class="row">
        <div></div>
        <div class="col-md-8"></div>
      <br>
      <div class="table-responsive col-md-12" id="result">
        <table class="table table-bordered table-striped table-condensed table-hover">
          <thead class="bg-primary">
            <th></th>
            <th>Date Issued</th>
            <th>Prescription Control No.</th>
          </thead>
          <tbody>
            <?php while($user = mysqli_fetch_assoc($sql)) : ?>
              <tr>
                <td>
                  <a href="../index.php?user_id=<?= $user['id']; ?>" class="btn btn-xs btn-default badge badge-success"><span class="glyphicon glyphicon-eye-open"></span></a>
                  <a href="rx-list.php?delete=<?= $user['id']; ?>" class="btn btn-default btn-xs badge badge-danger"><span class="glyphicon glyphicon-remove-sign"></span></a>
                </td>
                <td><?= $user['dateissue']; ?></td>
                <td><?= $user['rx_control_id']; ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
	</div>