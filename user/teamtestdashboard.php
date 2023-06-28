
<!-- User le booking garni dashbaord -->
<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/userdashstyle.css">

	<title>FUTxSAL User</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
        <i class='bx' > </i>
			<span class="text">FUTxSAL</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="userdashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="userdashbooking.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Bookings </span>
				</a>
			</li>
			<li>
				<a href="userloyalty.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Loyalty Bonus</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Challenge Opponents</span>
				</a>
			</li>
			<li>
				<!-- <a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Report</span>
				</a> -->
			</li>			
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
			<?php					
					if (! empty($_SESSION['logged_in']))
					{
						?>												
				 <form method="post" action="userlogout.php"> 
							
				<input type = "submit" name="sub" class="btn" value="Logout" > 
				 <style>
															.btn{
															background-color: forestgreen; 
															padding: 10px 100px;
															color:whitesmoke;
															font-size: 15px;															
															border: 0;
															outline: none;
															cursor: pointer;															
															margin: -25px 10px -50px;
															border-radius: 30px;
															}
															
															.btn:hover{
															background: red;
															color: whitesmoke;
															}
					</style> 
				<?php
					}
					else
					{
						//echo 'You are not logged in.';
						$string= "You are not logged in. ";
            			$_SESSION['status'] = '<span style="color: whitesmoke; font-size: 25px; position:absolute; left: 600px; top: 100px"> ' . $string.  '</span>';
						header("location:index.php");
					}
					
					?>
						
				 </form> 
			</li>
				
		</ul>
	</section>
	<!-- SIDEBAR -->


	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
            
			<form1 action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form1>

			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">5</span>
			</a>
			<a href="#" class="profile">
				<img src="img/natch.jpg">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
		<!-- booking successfull mesg popup -->
			<?php
            	if(isset($_SESSION['status']))
           		{
			?>			
					<?php 
						echo $_SESSION['status'];
					?>
  										
			 		<?php              
           				unset($_SESSION['status']);
            	}
       		 		?>

			<div class="head-title">
				<div class="left">
					<h1>Challenge Opponent Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Register And Challenge Other Teams</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
            </div> 

                        <div class= "team-register">
            
                            <form method="post" action="algorithm.php">
                                <label>Enter Your Team Name:</label>
                                <input type="text" name="teamName" required><br>
                                <label>Please Select Your Team's Strength:</label>
                                <input type="text" name = "teamStrength" id="result" required>                           
                           
                                <input type="button" id="str-btn" name="strength" onclick="myFunction(this.value)" value="1">
                                <input type="button" id="str-btn" name="strength" onclick="myFunction(this.value)" value="2">
                                <input type="button" id="str-btn" name="strength" onclick="myFunction(this.value)" value="3">
                                <input type="button" id="str-btn" name="strength" onclick="myFunction(this.value)" value="4">
                                <input type="button" id="str-btn" name="strength" onclick="myFunction(this.value)" value="5">

                            	<script>
									function myFunction(strength) {
										document.getElementById("result").value = strength;
										}
								</script>

                                <button type="submit" id="submit">Register And Find Opponents</button>
                            </form>
                        </div>
				
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script src="dashscript.js"></script>
</body>
</html>