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
				<a href="#">
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
				<a href="teamtestdashboard.php">
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
					// else
					// {
					// 	//echo 'You are not logged in.';
					// 	$string= "You are not logged in. ";
            		// 	$_SESSION['status'] = '<span style="color: whitesmoke; font-size: 25px; position:absolute; left: 600px; top: 100px"> ' . $string.  '</span>';
					// 	//header("location:index.php");
					// }
					
					?>
						
				 </form> 
				<?php
					// if(isset($_POST['sub'])){
					// 	session_destroy();
					// 	hedaer("location:http://localhost/project/user/index.php");
						
					// }
				?>
					<!-- <i class='bx bxs-log-out-circle' ></i>
					<span class="text" >Logout</span> 
				
				</a> -->
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
					<h1>Booking Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Booking Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
            </div>               

				<?php
				// if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']== true)
				// {
				?> 
								<div class="userbooking">
										<form action = "bann.php" method ="post">
											<!-- <h2>USER BOOKING FORM<h2> -->
												<label for="fname">Name:</label>&nbsp;
												<input type = "text" id="name" name="fname"  requried pattern ="[a-zA-Z'-'\s]*">&nbsp;&nbsp;&nbsp;&nbsp;
												<label for="Contact">Contact:<label>&nbsp;
												<input type="tel" id="contact" name="Contact"  required pattern="98[0-9]{8}">&nbsp;&nbsp;&nbsp;&nbsp;
												<label for ="email">Email Address:<label>&nbsp;&nbsp;
												<input type="text" id="email" name="email"  required><br>
											<!-- <br><label for="strenght">Your Team Strength:&nbsp;
												<input type="number" id="strength" name="strength" placeholder="1 = WEAK AND 5 = STRONG " required> -->
												
											<label for ="date ">Select Date:<label>&nbsp;&nbsp;
											<input type="date" id="date" name="date" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<label for="time">Select Time:<label>
											<input type="text" id="result" name="time" required><br>
											
												<input type="button" id="slot" name="time" onclick="myFunction(this.value)" value="7:00 AM TO 8:00 AM">
												<input type="button" id="slot" name="time" onclick="myFunction(this.value)" value="8:00 AM TO 9:00 AM">
												<input type="button" id="slot" name="time" onclick="myFunction(this.value)" value="9:00 AM TO 10:00AM">
												<input type="button" id="slot" name="time" onclick="myFunction(this.value)" value="10:00AM TO 11:00AM">
												<input type="button" id="slot" name="time" onclick="myFunction(this.value)" value="11:00AM TO 12:00PM">
												<input type="button" id="slot" name="time" onclick="myFunction(this.value)" value="12:00PM TO 1:00 PM">
												<input type="button" id="slot" name="time" onclick="myFunction(this.value)" value="1:00 PM TO 2:00 PM">
												<input type="button" id="slot" name="time" onclick="myFunction(this.value)" value="2:00 PM TO 3:00 PM">
												<input type="button" id="slot" name="time" onclick="myFunction(this.value)" value="3:00 PM TO 4:00 PM">
												<input type="button" id="slot" name="time" onclick="myFunction(this.value)" value="4:00 PM TO 5:00 PM">
												<input type="button" id="slot" name="time" onclick="myFunction(this.value)" value="5:00 PM TO 6:00 PM">
												<input type="button" id="slot" name="time" onclick="myFunction(this.value)" value="6:00 PM TO 7:00 PM"><br>
					
													<script>
														function myFunction(time) {
															document.getElementById("result").value = time;
															}
													</script>

											
											<button type="submit" class="bbtn" id="submit" name="book">Book Now</button>
																															
										</form>		
								</div>
		<?php
		// }
		// 						else{
		// 								echo "You are not logged in.";
		// 							}

			?>
				
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script src="dashscript.js"></script>
</body>
</html>