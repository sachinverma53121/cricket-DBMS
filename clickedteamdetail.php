<?php 
 include('config/db_connect.php');
    
 // check GET request team_name param
 if(isset($_GET['team_name'])) {
  $team_name = mysqli_real_escape_string($conn, $_GET['team_name']);

  // make query
  $sql_team_name = "SELECT * FROM team WHERE team_name = '$team_name'";
  // get query result
  $result_team_name = mysqli_query($conn, $sql_team_name);
  // fetch result in array format
  $team = mysqli_fetch_assoc($result_team_name);


  $country_name = $team['country_code'];
  $sql_country = "SELECT * FROM country WHERE country_code = '$country_name'";
  // get query result
  $result_country = mysqli_query($conn, $sql_country);
  // fetch result in array format
  $country = mysqli_fetch_assoc($result_country);



  $sql_coach = "SELECT * FROM coach WHERE team_name = '$team_name'";
  // get query result
  $result_coach = mysqli_query($conn, $sql_coach);
  // fetch result in array format
  $coach = mysqli_fetch_assoc($result_coach);  


  $sql_manager = "SELECT * FROM manager WHERE team_name = '$team_name'";
  // get query result
  $result_manager = mysqli_query($conn, $sql_manager);
  // fetch result in array format
  $manager = mysqli_fetch_assoc($result_manager); 

  
  // $sql_managerphone = "SELECT * FROM managerphone WHERE manager_name = '$manager_name'";
  // // get query result
  // $result_managerphone = mysqli_query($conn, $sql_managerphone);
  // // fetch result in array format
  // $managerphone = mysqli_fetch_assoc($result_managerphone); 

  mysqli_free_result($result_team_name);
  mysqli_free_result($result_country);
  mysqli_free_result($result_coach);
  mysqli_free_result($result_manager);
  mysqli_close($conn);

  // print_r($team);
  // print_r($country);
  // print_r($coach);
  // print_r($manager);

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

  <div class="container">
    <div class="container brown-text text-lighten-1">
      <h5 class="center">TEAM NAME</h5>
      <h6 class="center grey-text"><?php echo htmlspecialchars($team['team_name']); ?></h6>
      <h5 class="center">COACH NAME</h5>
      <h6 class="center grey-text"><?php echo htmlspecialchars($coach['coach_name']); ?></h6>
      <h5 class="center">MANAGER NAME</h5>
      <h6 class="center grey-text"><?php echo htmlspecialchars($manager['manager_name']); ?></h6>
      <h5 class="center">COUNTRY</h5>
      <h6 class="center grey-text"><?php echo htmlspecialchars($country['country_name']); ?></h6> 

    </div>  
  </div>




  

  <?php include('templates/footer.php'); ?>
</html>