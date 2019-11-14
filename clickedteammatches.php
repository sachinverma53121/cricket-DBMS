<?php 
 include('config/db_connect.php');
    
 // check GET request team_name param
 if(isset($_GET['team_name'])) {
  $team_name = mysqli_real_escape_string($conn, $_GET['team_name']);

  // write query for all pizzas
  $sql = "SELECT * FROM teammatch WHERE team_name ='$team_name'";

  // make query and get result
  $result = mysqli_query($conn, $sql);

  // fetch the resulting rows as array
  $teammatches = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // print_r($teammatches);
  $counter = 0;

 }   

 
?>

<!DOCTYPE html>
<html>
  <?php include('templates/header.php'); ?>
  <div class="">
    <a href="superuser.php" class="btn white brown-text transparent waves-effect waves-dark z-depth-0">
      <span>Back to Menu</span>
      <i class="material-icons left">keyboard_arrow_left</i>
  </a>
  </div>

  <h3 class="center grey-text">Matches are!!!</h3>
  <h4 class="center grey-text text-darken-1">Team : <?php echo htmlspecialchars($team_name); ?></h4>
  <div class="container">
    <div class="row">
      <?php foreach($teammatches as $teammatch) : ?>
        <div class="col s6 md3">
          <div class="card z-depth-1">
            <div class="card-content center">
              <h4 class="grey-text text-darken-1" >#<?php $counter++; echo $counter; ?></h4>

              <?php 
                $matchno =  $teammatch['match_no'];
                // write query for all pizzas
                $sql_matchh = "SELECT * FROM matchh WHERE match_no ='$matchno'";
                // make query and get result
                $result_matchh = mysqli_query($conn, $sql_matchh);
                // fetch the resulting rows as array
                $matchhes = mysqli_fetch_all($result_matchh, MYSQLI_ASSOC);
               ?>

              <div class="container">
                <?php foreach($matchhes as $matchh) : ?>
                  <h5 class="brown-text text-darken-2" style="margin-left: -150px;">Match Number</h5>
                  <h6 class="grey-text text-darken-1" style="margin-left: 50px;"><?php echo htmlspecialchars($matchh['match_no']); ?></h6>
                  <h5 class="brown-text text-darken-2" style="margin-left: -150px;">Opposition Team</h5>
                  <h6 class="grey-text text-darken-1" style="margin-left: 50px;"><?php echo htmlspecialchars($matchh['opposition']); ?></h6>
                  <h5 class="brown-text text-darken-2" style="margin-left: -150px;">Match Venue</h5>
                  <h6 class="grey-text text-darken-1" style="margin-left: 50px;"><?php echo htmlspecialchars($matchh['stadium_name']).",<br/>".htmlspecialchars($matchh['city']); ?></h6>
                  <h5 class="brown-text text-darken-2" style="margin-left: -150px;">Date</h5>
                  <h6 class="grey-text text-darken-1" style="margin-left: 50px;"><?php echo htmlspecialchars($matchh['match_date']); ?></h6>
                  <h5 class="brown-text text-darken-2" style="margin-left: -150px;">Time</h5>
                  <h6 class="grey-text text-darken-1" style="margin-left: 50px;"><?php echo htmlspecialchars($matchh['match_time']); ?></h6>
                <?php endforeach; ?>
              </div>


            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php if(count($teammatches) <= 0) : ?>
        <div class="container center">
          <h4 class="grey-text text-darken-1">No matches scheduled!!!!</h4>
          <a class="btn brown z-depth-1" href="fixamatch.php">Schedule Matches</a>
        </div>
      <?php endif; ?> 
    </div>
  </div>  



  

  <?php include('templates/footer.php'); ?>
</html>