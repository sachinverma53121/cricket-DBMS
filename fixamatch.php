<?php 
 include('config/db_connect.php');

	$match_no = $stadium_name = $city = $match_date = $match_time = $queryerror = '';
	$errors = array('match_no' => '', 'stadium_name' => '', 'city' => '', 'match_date' => '', 'match_time' => '');
	
	if(isset($_POST['submit'])){
		
		// check match_no
		if(empty($_POST['match_no'])){
			$errors['match_no'] = 'Team Name is required';
		} else{
			$match_no = $_POST['match_no'];
		}
		// chek match_date 
		if(empty($_POST['match_date'])){
			$errors['match_date'] = 'Manager Name is required';
		} else{
			$match_date = $_POST['match_date'];
		}

		// check stadium_name
		if(empty($_POST['stadium_name'])){
			$errors['stadium_name'] = 'Country Name is required';
		} else{
			$stadium_name = $_POST['stadium_name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $stadium_name)){
				$errors['stadium_name'] = 'Country Name must be letters and spaces only';
			}
		}
		// check city
		if(empty($_POST['city'])){
			$errors['city'] = 'Country Code is required';
		} else{
			$city = $_POST['city'];
		}

		
		// chek match time
		if(empty($_POST['match_time'])){
			$errors['match_time'] = 'Manager Name is required';
		} else{
			$match_time = $_POST['match_time'];
		}

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {

			// escape sql chars
			$match_no = mysqli_real_escape_string($conn, $_POST['match_no']);
			$stadium_name = mysqli_real_escape_string($conn, $_POST['stadium_name']);
			$city = mysqli_real_escape_string($conn, $_POST['city']);
			$match_date = mysqli_real_escape_string($conn, $_POST['match_date']);
			$match_time = mysqli_real_escape_string($conn, $_POST['match_time']);
			
			// create sql
			//$sql = "INSERT INTO registerteam(match_no,stadium_name,city) VALUES('$match_no','$stadium_name','$city')";
			$sql = '';
			// save to db and check
			// if(mysqli_query($conn, $sql)){
			// 	// success
			// 	header('Location: playerdetails.php');
			// } else {
			// 	$queryerror = mysqli_error($conn);
			// }
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
          <input placeholder="Enter Match No" id="match_no" name="match_no" type="text" class="validate">
          <label for="match_no">Match No</label>
          <div class="red-text"><?php echo $errors['match_no']; ?></div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Enter Stadium Name" id="stadium_name" name="stadium_name" type="text" class="validate">
          <label for="stadium_name">Stadium Name</label>
          <div class="red-text"><?php echo $errors['stadium_name']; ?></div>
        </div>
        <div class="input-field col s6">
          <input placeholder="Enter City of Match" id="city" name="city" type="text" class="validate">
          <label for="city">City Name</label>
          <div class="red-text"><?php echo $errors['city']; ?></div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Enter Match Date" id="match_date" name="match_date" type="text" class="validate">
          <label for="match_date">Match Date</label>
          <div class="red-text"><?php echo $errors['match_date']; ?></div>
        </div>
        <div class="input-field col s6">
          <input placeholder="Enter Match Time" id="match_time" name="match_time" type="text" class="validate">
          <label for="match_time">Match Time</label>
          <div class="red-text"><?php echo $errors['match_time']; ?></div>
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