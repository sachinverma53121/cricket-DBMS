<?php 
 include('config/db_connect.php');

	$match_no = $team1 = $team2 = $stadium_name = $city = $match_date = $match_time = $queryerror1 = $queryerror2 = '';
	$errors = array('match_no' => 'match_no', 'team1' => '', 'team2' => '', 'match_no' => '', 'stadium_name' => '', 'city' => '', 'match_date' => '', 'match_time' => '');
	
	if(isset($_POST['submit'])){
		
		// check match_no
		if(empty($_POST['match_no'])){
			$errors['match_no'] = 'Match Number is required';
		} else{
			$match_no = $_POST['match_no'];
		}

		if(empty($_POST['team1'])){
			$errors['team1'] = 'Team Name is required';
		} else{
			$team1 = $_POST['team1'];
		}

		if(empty($_POST['team2'])){
			$errors['team2'] = 'Team Name is required';
		} else{
			$team2 = $_POST['team2'];
		}

		// chek match_date 
		if(empty($_POST['match_date'])){
			$errors['match_date'] = 'Match Date Required';
		} else{
			$match_date = $_POST['match_date'];
		}

		// check stadium_name
		if(empty($_POST['stadium_name'])){
			$errors['stadium_name'] = 'Stadium Name is required';
		} else{
			$stadium_name = $_POST['stadium_name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $stadium_name)){
				$errors['stadium_name'] = 'Stadium Name must be letters and spaces only';
			}
		}
		// check city
		if(empty($_POST['city'])){
			$errors['city'] = 'City Name is required';
		} else{
			$city = $_POST['city'];
		}

		
		// chek match time
		if(empty($_POST['match_time'])){
			$errors['match_time'] = 'Match Time Name is required';
		} else{
			$match_time = $_POST['match_time'];
		}

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {

			// escape sql chars
			$match_no = mysqli_real_escape_string($conn, $_POST['match_no']);
			$team1 = mysqli_real_escape_string($conn, $_POST['team1']);
			$team2 = mysqli_real_escape_string($conn, $_POST['team2']);
			$stadium_name = mysqli_real_escape_string($conn, $_POST['stadium_name']);
			$city = mysqli_real_escape_string($conn, $_POST['city']);
			$match_date = mysqli_real_escape_string($conn, $_POST['match_date']);
			$match_time = mysqli_real_escape_string($conn, $_POST['match_time']);

			$sql_matchh = "INSERT INTO matchh(match_no,opposition,stadium_name,city,match_date,match_time) VALUES('$match_no','$team2','$stadium_name','$city','$match_date','$match_time')";
			if(mysqli_query($conn, $sql_matchh)){
				// success
				$sql_tm = "INSERT INTO teammatch(match_no,team_name) VALUES('$match_no', '$team1') ";
				if(mysqli_query($conn, $sql_tm)){
					//sucess
				} else {
					 $queryerror2 = mysqli_error($conn);
				}	
			} else {
				 $queryerror1 = mysqli_error($conn);
			}
	} // end POST check
 }

?>


<!DOCTYPE html>
<html>
  <?php include('templates/header.php'); ?>
 
 <div class="container brown-text">
 	<h2>Schedule A Match</h2>
  <div class="row">
    <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    	<div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Match No" id="match_no" name="match_no" type="text" class="validate">
          <label for="match_no">Match No*</label>
          <div class="red-text"><?php echo $errors['match_no']; ?></div>
        </div>
      </div>
    	<div class="row">
        <div class="input-field col s6">
          <input placeholder="Enter First Team Name" id="team1" name="team1" type="text" class="validate">
          <label for="team1">Team 1*</label>
          <div class="red-text"><?php echo $errors['team1']; ?></div>
        </div>
        <div class="input-field col s6">
          <input placeholder="Enter Second Team Name" id="team2" name="team2" type="text" class="validate">
          <label for="team2">Team 2*</label>
          <div class="red-text"><?php echo $errors['team2']; ?></div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Enter Stadium Name" id="stadium_name" name="stadium_name" type="text" class="validate">
          <label for="stadium_name">Stadium Name*</label>
          <div class="red-text"><?php echo $errors['stadium_name']; ?></div>
        </div>
        <div class="input-field col s6">
          <input placeholder="Enter City of Match" id="city" name="city" type="text" class="validate">
          <label for="city">City Name*</label>
          <div class="red-text"><?php echo $errors['city']; ?></div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Enter Match Date" id="match_date" name="match_date" type="date" class="validate datepicker">
          <label for="match_date">Match Date*</label>
          <div class="red-text"><?php echo $errors['match_date']; ?></div>
        </div>
        <div class="input-field col s6">
          <input placeholder="Enter Match Time b/w 10am to 8pm" min="10:00" max="20:00" id="match_time" name="match_time" type="time" class="validate">
          <label for="match_time">Match Start Time (10am to 8pm)*</label>
          <div class="red-text"><?php echo $errors['match_time']; ?></div>
        </div>
      </div>

      <div class="center">
      	<div class="red-text"><?php echo $queryerror1;echo $queryerror2; ?></div>
		<input type="submit" name="submit" value="Fix Match" class="btn brown z-depth-1">
	  </div>
    </form>
   </div>

  <?php include('templates/footer.php'); ?>

</html>