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

  // print_r($team);
  // print_r($country);
  // print_r($coach);
  // print_r($manager);

 }   

 if(isset($_POST['delete'])) {
  $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
 
 
  $sql = "SELECT match_no FROM teammatch WHERE team_name= '$id_to_delete'";
  $result = mysqli_query($conn, $sql);

  //fetch the resulting rows as array
  $match_records = mysqli_fetch_all($result, MYSQLI_ASSOC);

  foreach ($match_records as $match_record) {
    $match_no_delete = $match_record['match_no'];
    $sql_delete = "DELETE FROM teammatch WHERE match_no = $match_no_delete ";
    $sql_delete_match = "DELETE FROM matchh WHERE match_no = $match_no_delete ";
     if(mysqli_query($conn, $sql_delete) && mysqli_query($conn, $sql_delete_match)) {
      //sucess
    } else {
      echo 'query error: '.mysqli_error($conn);
    }

  }
  $delete_players = "DELETE FROM player WHERE team_name = '$id_to_delete'";
  $delete_coach = "DELETE FROM coach WHERE team_name = '$id_to_delete'";
     if(mysqli_query($conn, $delete_players) && mysqli_query($conn, $delete_coach)) {
      //sucess
    } else {
      echo 'query error: '.mysqli_error($conn);
    }

  $sql = "SELECT match_no FROM matchh WHERE opposition= '$id_to_delete'";
  $result = mysqli_query($conn, $sql);

  //fetch the resulting rows as array
  $match_records = mysqli_fetch_all($result, MYSQLI_ASSOC);

  foreach ($match_records as $match_record) {
    $match_no_delete = $match_record['match_no'];
    $sql_delete = "DELETE FROM teammatch WHERE match_no = $match_no_delete ";
    $sql_delete_match = "DELETE FROM matchh WHERE match_no = $match_no_delete ";
     if(mysqli_query($conn, $sql_delete) && mysqli_query($conn, $sql_delete_match)) {
      //sucess
    } else {
      echo 'query error: '.mysqli_error($conn);
    }

  }

  $sql = "SELECT manager_name FROM manager WHERE team_name= '$id_to_delete'";
  $result = mysqli_query($conn, $sql);

  //fetch the resulting rows as array
  $managers = mysqli_fetch_all($result, MYSQLI_ASSOC);

  foreach ($managers as $manager) {
    $manager_name_delete = $manager['manager_name'];
    $sql_delete_phone = "DELETE FROM managerphone WHERE manager_name = '$manager_name_delete' ";
    $sql_delete_manager = "DELETE FROM manager WHERE team_name = '$id_to_delete' ";
     if(mysqli_query($conn, $sql_delete_phone) && mysqli_query($conn, $sql_delete_manager)) {
      //sucess
    } else {
      echo 'query error: '.mysqli_error($conn);
    }

  }

  
  $sql = "SELECT country_code FROM team WHERE team_name= '$id_to_delete'";
  $sql_delete_team = "DELETE FROM team WHERE team_name = '$id_to_delete'";
  $result = mysqli_query($conn, $sql);

  //fetch the resulting rows as array
  $country = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $country_code = $country[0]['country_code'];

  $sql_delete_country = "DELETE FROM country WHERE country_code = '$country_code'";
  if(mysqli_query($conn, $sql_delete_team) && mysqli_query($conn, $sql_delete_country)) {
      header('Location: regteams.php'); 
    } else {
      echo 'query error: '.mysqli_error($conn);
    }
 












  // if(mysqli_query($conn, $sql)) {
  //   header('Location: index.php'); 
  // } else {
  //   echo 'query error: '.mysqli_error($conn);
  // }
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

  <div class="container center">
    <div class="container brown-text text-lighten-1">
      <h5 class="center">TEAM NAME</h5>
      <h6 class="center grey-text"><?php echo htmlspecialchars($team['team_name']); ?></h6>
      <h5 class="center">COACH NAME</h5>
      <h6 class="center grey-text"><?php echo htmlspecialchars($coach['coach_name']); ?></h6>
      <h5 class="center">MANAGER NAME</h5>
      <h6 class="center grey-text"><?php echo htmlspecialchars($manager['manager_name']); ?></h6>
      <h5 class="center">COUNTRY</h5>
      <h6 class="center grey-text"><?php echo htmlspecialchars($country['country_name']); ?></h6> 

    </div> <br>

     <form action="clickedteamdetail.php?team_name=<?php echo $team['team_name'];?>" method="POST">
      <input type="hidden" name="id_to_delete" value="<?php echo $team['team_name']; ?>">
      <input type="submit" name="delete" value="Remove Team" class="btn brown lighten-1 z-depth-0">
     </form> 
  </div>
 




  

  <?php include('templates/footer.php'); ?>
</html>