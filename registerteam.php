<?php 
 include('config/db_connect.php');

	$team_name = $country_name = $country_code = $manager_phone = $manager_name = $coach_name = $coach_id = $queryerror1 = $queryerror2 = $queryerror3 = $queryerror4 = $queryerror5 = $queryerror6 = '';
	$errors = array('team_name' => '', 'country_name' => '', 'country_code' => '', 'manager_name' => '', 'manager_phone' => '', 'coach_name' => '', 'coach_id' => '');
	
	if(isset($_POST['submit'])){
		
		// check team_name
		if(empty($_POST['team_name'])){
			$errors['team_name'] = 'Team Name is required';
		} else{
			$team_name = $_POST['team_name'];
		}
		// chek manager nameh 
		if(empty($_POST['manager_name'])){
			$errors['manager_name'] = 'Manager Name is required';
		} else{
			$manager_name = $_POST['manager_name'];
		}

		// check country_name
		if(empty($_POST['country_name'])){
			$errors['country_name'] = 'Country Name is required';
		} else{
			$country_name = $_POST['country_name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $country_name)){
				$errors['country_name'] = 'Country Name must be letters and spaces only';
			}
		}
		// check country_code
		if(empty($_POST['country_code'])){
			$errors['country_code'] = 'Country Code is required';
		} else{
			$country_code = $_POST['country_code'];
		}

		if(empty($_POST['coach_id'])){
			$errors['coach_id'] = 'Coach ID is required';
		} else{
			$coach_id = $_POST['coach_id'];
		}
		// chek manager nameh 
		if(empty($_POST['coach_name'])){
			$errors['coach_name'] = 'Manager Name is required';
		} else{
			$coach_name = $_POST['coach_name'];
		}

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {

			// escape sql chars
			$team_name = mysqli_real_escape_string($conn, $_POST['team_name']);
			$country_name = mysqli_real_escape_string($conn, $_POST['country_name']);
			$country_code = mysqli_real_escape_string($conn, $_POST['country_code']);
			$manager_phone = mysqli_real_escape_string($conn, $_POST['manager_phone']);
			$manager_name = mysqli_real_escape_string($conn, $_POST['manager_name']);
			$coach_id = mysqli_real_escape_string($conn, $_POST['coach_id']);
			$coach_name = mysqli_real_escape_string($conn, $_POST['coach_name']);
			
			// create sql
			$sql_country = "INSERT INTO country(country_name,country_code) VALUES('$country_name','$country_code')";
			 if(mysqli_query($conn, $sql_country)){
				// success
			 	$sql_team = "INSERT INTO team(team_name,country_code) VALUES('$team_name','$country_code')";
			 	if(mysqli_query($conn, $sql_team)){
					// success
				 	$sql_manager = "INSERT INTO manager(manager_name,team_name) VALUES('$manager_name','$team_name')";	
				 	if(mysqli_query($conn, $sql_manager)){
						// success
						$sql_manager = "INSERT INTO managerphone(manager_name,manager_phone) VALUES('$manager_name','$manager_phone')";
						if(mysqli_query($conn,$sql_manager)){

					 	$sql_coach = "INSERT INTO coach(coach_id,coach_name,team_name) VALUES('$coach_id','$coach_name','$team_name')";
					 	if(mysqli_query($conn, $sql_coach)){
							// success
						 } else {
						 	$queryerror1 = mysqli_error($conn);
						 }

					 } else {
					 	$queryerror2 = mysqli_error($conn);
					 }

				 } else {
				 	$queryerror3 = mysqli_error($conn);
				 }

			 } else {
			 	$queryerror4 = mysqli_error($conn);
			 }
			} else {
			 	$queryerror6 = mysqli_error($conn);
			 } 
	} // end POST check
 }

?>


<!DOCTYPE html>
<html>
  <?php include('templates/header.php'); ?>
 
 <div class="container brown-text">
 	<h2>Register A New Team</h2>
  <div class="row">
    <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    	<div class="row">
        <div class="input-field col s12">
          <input placeholder="Enter Team Name" id="team_name" name="team_name" type="text" class="validate">
          <label for="team_name">Team Name*</label>
          <div class="red-text"><?php echo $errors['team_name']; ?></div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Enter your Country" id="country_name" name="country_name" type="text" class="validate">
          <label for="country_name">Country*</label>
          <div class="red-text"><?php echo $errors['country_name']; ?></div>
        </div>
        <div class="input-field col s6">
          <input placeholder="Enter Country Code" id="country_code" name="country_code" type="text" class="validate">
          <label for="coutry_code">Country Code*</label>
          <div class="red-text"><?php echo $errors['country_code']; ?></div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Enter Manager Name" id="manager_name" name="manager_name" type="text" class="validate">
          <label for="manager_name">Manager Name*</label>
          <div class="red-text"><?php echo $errors['manager_name']; ?></div>
        </div>
        <div class="input-field col s6">
          <input placeholder="Enter Manager Phone No." id="manager_phone" name="manager_phone" type="text" class="validate">
          <label for="manager_phone">Phone No.</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Enter Coach Name" id="coach_name" name="coach_name" type="text" class="validate">
          <label for="coach_name">Coach Name*</label>
          <div class="red-text"><?php echo $errors['coach_name']; ?></div>
        </div>
        <div class="input-field col s6">
          <input placeholder="Enter Coach ID" id="coach_id" name="coach_id" type="text" class="validate">
          <label for="coach_id">Coach ID*</label>
          <div class="red-text"><?php echo $errors['coach_id']; ?></div>
        </div>
      </div>
      <div class="container">
      	<div class="red-text"><?php echo $queryerror1; echo $queryerror2; echo $queryerror3; echo $queryerror4; echo $queryerror5; echo $queryerror6; ?></div>
		<input type="submit" name="submit" value="Register" class="btn brown z-depth-1">
		<span class="right"><a class="btn brown z-depth-1" href="playerdetail.php">Enter Team Players Details</a></span> 
	  </div>
    </form>
   </div>

  <?php include('templates/footer.php'); ?>

</html>