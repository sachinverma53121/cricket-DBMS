<?php 
 include('config/db_connect.php');
    

 
?>

<!DOCTYPE html>
<html>
  <?php include('templates/header.php'); ?>

 <div class="container brown-text">
   <div class="center container"> <br>
   	<ul class="collection with-header">
   		<li class="collection-header"><h4>View Details...</h4></li>
		 <li class="collection-item avatar box valign-wrapper">
		    <i class="material-icons circle blue">event</i>
		    <div class="title"><a href="regteams.php">Registered Teams</a></div>
		    <div class="container">
		      <p class="grey-text">See a list of registered team</p>
		      <a class="secondary-content" href="regteams.php">
		    	<i class="material-icons blue-text medium">keyboard_arrow_right</i>
		      </a>
		    </div>
		 </li>
		 <li class="collection-item avatar box valign-wrapper">
		    <i class="material-icons circle blue">event_note</i>
		    <span class="title"><a href="details.php">See Team Players</a></span>
		    <div class="container">
		      <p class="grey-text">See Details of a team</p>
		      <a class="secondary-content" href="details.php">
		    	<i class="material-icons blue-text medium">keyboard_arrow_right</i>
		      </a>
		    </div>
		 </li> 
		 <li class="collection-item avatar box valign-wrapper">
		    <i class="material-icons circle blue">event_available</i>
		    <span class="title"><a href="matches.php">Matche Schedules</a></span>
		    <div class="container">
		      <p class="grey-text">See Matches of a team</p>
		      <a class="secondary-content" href="matches.php">
		    	<i class="material-icons blue-text medium">keyboard_arrow_right</i>
		      </a>
		    </div>
		 </li>  
   	</ul>	
   </div>
 </div>	


  <?php include('templates/footer.php'); ?>
</html>