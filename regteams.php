<?php 
 include('config/db_connect.php');
  $sql = 'SELECT team_name FROM team';

  // make query and get result
  $result = mysqli_query($conn, $sql);

  // fetch the resulting rows as array
  $teams = mysqli_fetch_all($result, MYSQLI_ASSOC);
  //print_r($teams);

  // free result form memory
  mysqli_free_result($result);

  //closing connection
  mysqli_close($conn);

    

 
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
  <div class="container brown-text">
  	<ul class="collection with-header">
      <li class="collection-header center"><h4>Registered Teams...</h4></li>

    <?php foreach($teams as $team) : ?>  
      <li class="collection-item avatar box valign-wrapper">
        <i class="material-icons circle blue">insert_chart</i>
        <div class="title"><a href="clickedteamdetail.php?team_name=<?php echo $team['team_name']; ?>"><?php echo htmlspecialchars($team['team_name']); ?></a></div>
          <div class="container">
            <a class="secondary-content" href="regteams.php">
              <i class="material-icons blue-text medium">keyboard_arrow_right</i>
            </a>
        </div>
      </li>
    <?php endforeach; ?>
    <?php if(count($teams) >= 2) : ?>
      <p style="text-indent :1.5em;"> there are 2 or more teams...</p>
    <?php else : ?>
      <p style="text-indent :1.5em;"> there are less than 2 teams...</p>
    <?php endif; ?> 
  </div>
 </div>



  <?php include('templates/footer.php'); ?>
</html>