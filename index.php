<?php 
 
 
?>

<!DOCTYPE html>
<html>
  <?php include('templates/header.php'); ?>

  <!-- COOL GRID LAYOUT -->
  	<!-- <div class="container">
  		<div class="row first-row">
			<div class="col s10 m9">Register Team</div>
			<div class="col s2 m3"><i class="material-icons"></i></div> 
		</div>
		<div class="row first-row">
			<div class="col s2 m3">content</div>
			<div class="col s10 m9"><i class="material-icons"></i></div>
		</div>
		<div class="row first-row">
			<div class="col s10 m9">content</div>
			<div class="col s2 m3"><i class="material-icons"></i></div> 
		</div>
		<div class="row first-row">
			<div class="col s2 m3">content</div>
			<div class="col s10 m9"><i class="material-icons"></i></div>
		</div>
  	</div> -->

   <div class="container" id="cardz">
	<h2 class="brown-text">Getting Started...</h2>
	<div class="row">
	  <div class="col s12 l6">
	  	<div class="card">
	  	  <div class="card-image">	
	  		 <img src="img/regteam.png" alt="image">
	  		 <a href="registerteam.php" class="btn-floating blue pulse halfway-fab">
	  		   <i class="material-icons">add</i>
	  		 </a>
	  		</div>
	  	   <div class="card-content">
	  		 <span class="card-title brown-text">Register Team</span>
	  		 <blockquote>
	  		  Register Your Team To Participate in Tournament <br>
	  		  Enter you Country, Manager and Coach Details
	  		 </blockquote> 
	  	   </div>
	  	   <div class="card-action">
	  		 <a href="#terms"><span class="brown-text">more info...</span></a>
	  	   </div>
	  	</div>
	  </div>
	  <div class="col s12 l6">
	  	<div class="card">
	  	  <div class="card-image">
	  		 <img src="img/regmatch.png" alt="image">
	  		 <a href="fixamatch.php" class="btn-floating orange pulse halfway-fab">
	  		   <i class="material-icons">edit</i>
	  		 </a>
	  		</div>
	  	   <div class="card-content">
	  		 <span class="card-title brown-text">Fix a Match</span>
	  		 <blockquote>
	  		  Fix matches between two teams in a tournament <br>
	  		  Enter team and venue details
	  		 </blockquote>
	  	   </div>
	  	   <div class="card-action">
	  		 <a href="#terms"><span class="brown-text">more info...</span></a>
	  	   </div>
	  	</div>
	  </div>
	</div>

	


  <?php include('templates/footer.php'); ?>
</html>