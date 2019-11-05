<?php 
 include('config/db_connect.php');
    $queryerror = '';
    // write query for getting admin details
	$sql = 'SELECT username, password FROM admin';

	// make query and get result
	$result = mysqli_query($conn, $sql);
	// fetch the resulting rows as array
	$user_name = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//print_r($user_name);

	if(isset($_POST['submit'])){
       if($_POST['username'] === $user_name[0]['username'] && $_POST['password'] === $user_name[0]['password']) {
       	 header('Location: superuser.php');
       } else if ( $_POST['username'] === $user_name[0] ){
       	$queryerror = 'Wrong Password';
       } else {
       	$queryerror = 'Wrong Username';
       }
	   
	}	
 
?>

<!DOCTYPE html>
<html>
  <?php include('templates/header.php'); ?>

 <div class="container brown-text">
  <div class="container">	
  <h2>Admin Login</h2>
  <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  	<div class="row">
        <div class="input-field col s12">
          <input id="username" name="username" type="text" class="validate">
          <label for="username">Username</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" name="password" type="text" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="center">
      	<div class="red-text"><?php echo $queryerror; ?></div>
		<input type="submit" name="submit" value="Submit" class="btn brown z-depth-1">
	  </div>
  </form>
  </div>
 </div>	


  <?php include('templates/footer.php'); ?>
</html>