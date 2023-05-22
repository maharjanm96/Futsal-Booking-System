<!-- Admin ko lagi bookings herni dashboard -->
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
				<a href="#">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Bookings</span>
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
				<a href="admincanceldash.php">
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


			<?php
            if(isset($_SESSION['status']))
            {
		?>
				
					  <?php echo $_SESSION['status']; ?>
  						
				
		<?php              
               unset($_SESSION['status']);
            }
        ?>

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


		
		
			<div class="head-title">			
				<div class="left">
					<h1>Bookings Dashboard</h1>										
					<ul class="breadcrumb">
						<li>
							<a href="#">Bookings Dashboard</a>
						</li>						
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> -->
			</div>

            <div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Bookings</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								
								<th>Names</th>
                                <th>Contact</th>                               
								<th>Booked Date</th>
								<th>Booked Time</th>
								<th>Delete</th>
								<!-- <th>Update</th> -->
							</tr>
						</thead>
						<tbody>
						<?php
									$conn = mysqli_connect("localhost", "root", "", "futsal");
									if($conn){
										$dis_query ="Select sn, fname,Contact,email,date,time from booking";
										$dis_execute = mysqli_query($conn,$dis_query);
										if($dis_execute){
										
											while($row=mysqli_fetch_assoc($dis_execute)){

												echo "<tr>";								
												echo "<td>";
												$fname = $row['fname'];
												echo "<p>$fname</p>";
												echo"</td>";

                                                echo "<td>";																				 
												 $Contact = $row['Contact'];
												 echo "<p>$Contact</p>";
												 echo"</td>";                                       
                                                
                                                echo "<td>";																				 
												 $date = $row['date'];
												 echo "<p>$date</p>";
												 echo"</td>";
												
												 echo "<td>";																				 
												 $time = $row['time'];
												 echo "<p>$time</p>";
												 echo"</td>";
												 ?>
												 

												 <!-- for deleting the records by admin -->
												 <form action="admindelete.php" method="post">
													<input type="hidden"  name="sn" value="<?php echo $row['sn'] ?>">
													
													<td><input type="submit" name="delete" class='button' value="Delete"> </td>
													
												</form>
																										  												 	
												<!-- CSS for buttons -->
												<style>
														.button {
															background: forestgreen;
															padding: 11px 40px;
															color: black;
															font-size: 15px;
															font-weight: bold;
															border: 0;
															outline: none;
															cursor: pointer;
															width: 130px;
															margin: 10px auto 0;
															border-radius: 30px;
														}

														.button:hover{
															background: red;
															color: whitesmoke;
														}
														
															
													</style>
													
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

			
				
			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="dashscript.js"></script>
</body>
</html>