<?php 
 include('config/db_connect.php');
    
 // check GET request team_name param
 if(isset($_GET['team_name'])) {
  $team_name = mysqli_real_escape_string($conn, $_GET['team_name']);

  // write query for all pizzas
  $sql = "SELECT * FROM player WHERE team_name ='$team_name'";

  // make query and get result
  $result = mysqli_query($conn, $sql);

  // fetch the resulting rows as array
  $players = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // free result form memory
  mysqli_free_result($result);
  //print_r($players);
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


 <h3 class="center grey-text">Players are!!!</h3>
  <div class="container">
    <div class="row">
      <?php foreach($players as $player) : ?>
        <div class="col s6 md3">
          <div class="card z-depth-1">
            <div class="card-content center">
              <h4 class="grey-text text-darken-1" >#<?php $counter++; echo $counter; ?></h4>
              <h5 class="brown-text text-darken-2" style="margin-left: -150px;">Name</h5>
              <h6 class="grey-text text-darken-1" style="margin-left: 50px;"><?php echo htmlspecialchars($player['player_fname'])." ".htmlspecialchars($player['player_lname']);  ?></h6>
              <h5 class="brown-text text-darken-2" style="margin-left: -150px;">Jearsy No</h5>
              <h6 class="grey-text text-darken-1" style="margin-left: 50px;"><?php echo htmlspecialchars($player['jearsy_no']); ?></h6>
              <h5 class="brown-text  text-darken-2" style="margin-left: -150px;">Date of Birth</h5>
              <h6 class="grey-text text-darken-1" style="margin-left: 50px;"><?php echo htmlspecialchars($player['dob']); ?></h6>
              <h5 class="brown-text text-darken-2" style="margin-left: -150px;">Phone No</h5>
              <h6 class="grey-text text-darken-1" style="margin-left: 50px;"><?php echo htmlspecialchars($player['player_phone']); ?></h6>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php if(count($players) <= 0) : ?>
        <div class="container center">
          <h4 class="grey-text text-darken-1">No players registered in this team!!!!</h4>
          <a class="btn brown z-depth-1" href="playerdetail.php">Enter Team Players Details</a>
        </div>
      <?php endif; ?> 
    </div>
  </div>  




  

  <?php include('templates/footer.php'); ?>
</html>