<!-- Admin Cancel dashboard -->
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
	<link rel="stylesheet" href="css/admindashstyle.css">

	<title>FUTxSAL Admin</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx' ></i> 
			<span class="text">FUTxSAL Admin</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="admindashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="admindashbooking.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text" >Bookings</span>
				</a>
			</li>
			<li>
				<a href="adminbann.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Banning</span>
				</a>
			</li>
			<li>
				<a href="adminloyalty1.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Loyalty Bonus</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Cancel</span>
				</a>
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
				<!-- logout code -->
			<?php					
					if (! empty($_SESSION['logged_in']))
					{
						?>												
				 <form method="post" action="adminlogout.php"> 
							
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
						header("location:admin.php");
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
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num"></span>
			</a>
			<a href="#" class="profile">
				<img src="img/me.jpg">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>

		<?php
            if(isset($_SESSION['status']))
            {
		?>
				
					  <?php echo $_SESSION['status']; ?>
  						
				
		<?php              
               unset($_SESSION['status']);
            }
        ?>
		
			<div class="head-title">			
				<div class="left">
					<h1> Cancel Dashboard</h1>										
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

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<!-- <h3>5</h3> -->
						<p><h3>Total Cancellations</h3></p>
						<?php
							$connection = mysqli_connect("localhost","root","","futsal"); 
							$query = "SELECT Contact from cancel ORDER BY Contact";
							$query_run = mysqli_query($connection,$query);

							$row = mysqli_num_rows($query_run);
							echo '<h3>'.$row.'</h3>';
						?>

					</span>
				</li>
				
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<!-- <h3>Rs.5000</h3> -->
						<p><h3>Estimated Loss</h3></p>
						<?php	
							$price=1000;
														
							$connection = mysqli_connect("localhost","root","","futsal"); 
							$query = "SELECT Contact from cancel ORDER BY Contact";
							$query_run = mysqli_query($connection,$query);

							$row = mysqli_num_rows($query_run);

							echo "<h3>" .$row*$price. "</h3>";
							//echo "<h5>Including Free Games Price</h5>";					
						?>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Cancelled Contacts</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
																					
								<th>Contacts And Description</th>
                                <!-- <th>Name</th>   -->
																

							</tr>
						</thead>
						<tbody>
						<?php
									$conn = mysqli_connect("localhost", "root", "", "futsal");
									if($conn){
										$dis_query ="Select Contact from cancel";
										$dis_execute = mysqli_query($conn,$dis_query);
										if($dis_execute){
											
											while($row=mysqli_fetch_assoc($dis_execute)){
												echo "<tr>";
												
												
												echo "<td>";																				 
												 $Contact = $row['Contact'];
												 echo "<p>$Contact</p>";
												 echo"</td>";
																							 
													
												// echo '<td>';
												// $name = $row['fname'];
												//   echo"<p>$name</p>";
												//   echo '</td>';
												 												
												?>									
													
												<?php
												echo "</td>";
												echo "<tr/>";
											}
											
											
										}
									}

									?>



							
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