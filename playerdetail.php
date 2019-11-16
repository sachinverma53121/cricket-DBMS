<?php 
 include('config/db_connect.php');
 
	$player_fname = $player_lname = $jearsy_no = $team_name = $dob = $player_phone = $queryerror = '';
	$errors = array('player_fname' => '','player_lname' => '', 'jearsy_no' => '', 'team_name' => '', 'dob' => '', 'player_phone' => '');
	
	if(isset($_POST['submit'])){
		
		// check player_name
		if(empty($_POST['player_fname'])){
			$errors['player_fname'] = 'Player First Name is required';
		} else{
			$player_fname = $_POST['player_fname'];
		}
		if(empty($_POST['player_lname'])){
			$errors['player_lname'] = 'Player Last Name is required';
		} else{
			$player_lname = $_POST['player_lname'];
		}
		// chek jearsy no 
		if(empty($_POST['jearsy_no'])){
			$errors['jearsy_no'] = 'Jearsy Number is required';
		} else{
			$jearsy_no = $_POST['jearsy_no'];
		}

		// check team_name
		if(empty($_POST['team_name'])){
			$errors['team_name'] = 'Team Name is required';
		} else{
			$team_name = $_POST['team_name'];
		}

		if(empty($_POST['dob'])){
			$errors['dob'] = 'DOB is required';
		} else{
			$dob = $_POST['dob'];
		}
		// chek player phone 
		if(empty($_POST['player_phone'])){
			$errors['player_phone'] = 'Player Phone Number is required';
		} else{
			$player_phone = $_POST['player_phone'];
		}

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
		// escape sql chars
		$player_fname = mysqli_real_escape_string($conn, $_POST['player_fname']);
		$player_lname = mysqli_real_escape_string($conn, $_POST['player_lname']);
		$jearsy_no = mysqli_real_escape_string($conn, $_POST['jearsy_no']);
		$team_name = mysqli_real_escape_string($conn, $_POST['team_name']);
		$dob = mysqli_real_escape_string($conn, $_POST['dob']);
		$player_phone = mysqli_real_escape_string($conn, $_POST['player_phone']);
		
		// create sql
		$sql = "INSERT INTO player(player_fname,player_lname,jearsy_no,team_name,dob,player_phone) VALUES('$player_fname','$player_lname','$jearsy_no','$team_name','$dob','$player_phone')";
		//save to db and check
		if(mysqli_query($conn, $sql)){
			// success
			header('Location: playerdetail.php');
		} else {
			$queryerror = mysqli_error($conn);
		}
	} // end POST check
 }



 ?>

<!DOCTYPE html>
<html>
  <?php include('templates/header.php'); ?>
 
 <div class="container brown-text">
 	<h2>Enter Player Details</h2>
  <div class="row">
    <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    	<div class="row">
        <div class="input-field col s6">
          <input placeholder="Enter Player First Name" id="player_fname" name="player_fname" type="text" class="validate">
          <label for="player_fname">Player Fname</label>
          <div class="red-text"><?php echo $errors['player_fname']; ?></div>
        </div>
        <div class="input-field col s6">
          <input placeholder="Enter Player Last Name" id="player_lname" name="player_lname" type="text" class="validate">
          <label for="player_lname">Player Lname</label>
          <div class="red-text"><?php echo $errors['player_lname']; ?></div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Enter Jearsy No" id="jearsy_no" name="jearsy_no" type="text" class="validate">
          <label for="jearsy_no">Jearsy No</label>
          <div class="red-text"><?php echo $errors['jearsy_no']; ?></div>
        </div>
        <div class="input-field col s6">
          <input placeholder="Enter Team Name" id="team_name" name="team_name" type="text" class="validate">
          <label for="team_name">Team Name</label>
          <div class="red-text"><?php echo $errors['team_name']; ?></div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="dob" name="dob" type="date" class="validate datepicker">
          <label for="dob">DOB (1980-1999)</label>
          <div class="red-text"><?php echo $errors['dob']; ?></div>
        </div>
        <div class="input-field col s6">
          <input placeholder="Enter Phone No" id="player_phone" name="player_phone" type="text" class="validate">
          <label for="player_phone">Phone No.</label>
        </div>
      </div>
      <div class="center">
      	<div class="red-text"><?php echo $queryerror; ?></div>
		<input type="submit" name="submit" value="Submit" class="btn brown z-depth-1">
	  </div>
    </form>
   </div>

  <?php include('templates/footer.php'); ?>

</html>