
<!-- User main dashboard -->
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
        <i class='bx'></i>
			<span class="text">FUTxSAL</span>
		</a>
		<ul class="side-menu top">
			<li class="active">

				<a href="#">
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
				<a href="teamtestdashboard.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Challenge  Opponents</span>
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
				<!-- Logout Code -->
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
						$mesg= "You are not logged in. ";
            			$_SESSION['status'] = '<span style="color: whitesmoke; font-size: 25px; position:absolute; left: 600px; top: 100px"> ' . $mesg.  '</span>';
						header("location:index.php");
					}
					
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
					<h1>Found Opponents</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>

            </div>
                                    							                                  
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Opponents List</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Details</th>
								<th>Invite</th>
								
							</tr>
						</thead>
						<tbody>
						<?php
                        	                    
												echo "<td>";                                          
                                                include "bruteforce.php";  	
												echo"</td>";
												
												echo "<td>";
												

						?>
						<form method ="post" action= "inviteMailer.php">

							<label>Enter your team name:</label>
							<input type="text" name="teamName" class="inp" required><br>

							<label>Enter your team strength:</label>
							<input type="text" name="teamStrength" class="inp" required><br>

							<label>Enter opponet's email to send invite:</label>
							<input type="email" name="email" class="inp" required><br>

							<label>Enter booked futsal date:</label>
							<input type="text" name="futsalDate" class="inp" required><br>

							<label>Enter booked futsal time:</label>
							<input type="text" name="futsalTime" class="inp" required><br>

							<button type="submit" class="btn-email">Invite</button>
						</form>

														<style>
															.inp{
															padding: 10px;
															font-size: 15px;
															border: 10px;
															outline: none;
															width: 200px;
															margin: 10px auto;
															border-radius: 30px;
															background: grey;
}
															.btn-email {
															background: forestgreen;
															padding: 10px 30px;
															color: black;
															font-size: 14px;
															border: none;												
															cursor: pointer;														
															border-radius: 30px;
															}
														</style>
						</tbody>
					</table>
				</div>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="dashscript.js"></script>
</body>
</html>