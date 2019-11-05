<?php 
 include('config/db_connect.php');
 
	$player_name = $jearsy_no = $team_name = $dob = $player_phone = $queryerror = '';
	$errors = array('player_name' => '', 'jearsy_no' => '', 'team_name' => '', 'dob' => '', 'player_phone' => '');
	
	if(isset($_POST['submit'])){
		
		// check player_name
		if(empty($_POST['player_name'])){
			$errors['player_name'] = 'Player Name is required';
		} else{
			$player_name = $_POST['player_name'];
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
		$player_name = mysqli_real_escape_string($conn, $_POST['player_name']);
		$jearsy_no = mysqli_real_escape_string($conn, $_POST['jearsy_no']);
		$team_name = mysqli_real_escape_string($conn, $_POST['team_name']);
		$dob = mysqli_real_escape_string($conn, $_POST['dob']);
		$player_phone = mysqli_real_escape_string($conn, $_POST['player_phone']);
		
		// create sql
		$sql = "INSERT INTO player(player_name,jearsy_no,team_name,dob,player_phone) VALUES('$player_name','$jearsy_no','$team_name','$dob','$player_phone')";
		//save to db and check
		if(mysqli_query($conn, $sql)){
			// success
			header('Location: playerdetail.php'); 
 ?>

        <script type="text/javascript">popUp("Player Added!!!!")</script>

<?php	} else {
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
        <div class="input-field col s12">
          <input placeholder="Enter Player Name" id="player_name" name="player_name" type="text" class="validate">
          <label for="player_name">Player Name</label>
          <div class="red-text"><?php echo $errors['player_name']; ?></div>
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
          <label for="dob">DOB</label>
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