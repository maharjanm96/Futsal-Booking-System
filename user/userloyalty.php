<!-- User ko loyalty check garni dashboard -->
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
        <i class='bx'	></i>
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
				<a href="#">
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
				<!-- Logout code -->
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
				<span class="num"></span>
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
					<h1>Loyalty Dashboard</h1>
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

			<div class="container2">
                <form action="#" method="POST">
					<h1>My Loyalty Stats Check </h1>
					<input type="tel" id="contact" class="form" name="Contact" placeholder="Enter Contact To Check Your Loyalty"  required pattern="98[0-9]{8}">												
					<input type="submit"  name="check" class="buttn" value="Check" id="btnn">                   
					
                    <style>
                        .container2{
                            width: 100%;
                            height: 30vh;
	                        display: flex;
	                        align-items: center;
	                        justify-content: center;
                        }
                        .container2 form{
                        background: whitesmoke;
                        display: flex;
                        flex-direction: column;
                        padding: 2vw 4vw;
                        width: 90%;
                        max-width: 500px;
                        border-radius: 30px;
                        
                    }
                    .container2 form input{
                        border: 0;
                        margin: 10px 0;
                        padding: 15px;
                        outline: none;
                        font-size: 15px;
                        border-radius: 40px;
                        font-weight: bold;
                    }
						.buttn {
						background: forestgreen;
						padding: 11.5px 155px;
						color: black;
						font-size: 15px;
						font-weight: normal;
						border: 0;
						outline: none;
						cursor: pointer;
						/* width: 200px; */
						margin: 10px auto 0;
						border-radius: 30px;
						}
						.buttn:hover{
						background: forestgreen;
                        color: whitesmoke;
						}
															
						</style>
				</form>
			</div>
			
			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<p><h3>My Total Bookings</h3></p>
						<?php		
							$connection = mysqli_connect("localhost","root","","futsal"); 							
							
								if(isset($_POST['check'])){
									$Contact = $_POST['Contact'];
									
								
							// $query = "SELECT Contact from booking ORDER BY Contact";
							$query = "Select * from booking where Contact='$Contact';";
							$query_run = mysqli_query($connection,$query);
							$row = mysqli_num_rows($query_run);

							echo '<h3>'.$row.'</h3>';
						}															
						?>
					</span>
				</li>
				
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<p><h3>Total Amount (NPR.)</h3></p>
						<?php	
							$price=1000;
							$quotient=0;
							$total=0;
																				
							$connection = mysqli_connect("localhost","root","","futsal"); 
							
								if(isset($_POST['check'])){
									$Contact = $_POST['Contact'];
							// $query = "SELECT fname from booking ORDER BY fname";
							$query = "Select * from booking where Contact='$Contact';";
							$query_run = mysqli_query($connection,$query);

							$row = mysqli_num_rows($query_run);
							
							if($row==0){

							echo "<h3>" .$row. "</h3>";
							}
							else if($row%10==0){
								
								echo "<h3>Free Game</h3>";
							}
							else{
								$quotient=$row/10;							 	
								$total=$row*$price;
								$final=$total-(intval($quotient)*$price);
								echo '<h3>' .$final.'</h3>'; 
							}														
		
							}							
						?>
					</span>
				</li>
			</ul>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>My Bookings</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th></th>
								<th>S.N</th>							
								<th>Name</th>
								<th>Booked Date</th>
								<th>Booked Time</th>
								<!-- <th>Contact</th> -->
								<!-- <th>Delete Booking</th> -->
								<th>Cancel Book</th>
								<th>Update Booking</th>
								
							</tr>
						</thead>
							<tbody>
								<?php
													
									$con = mysqli_connect("localhost", "root", "", "futsal");

									if($con){
										if(isset($_POST['check'])){
											//$Contact = $_POST['Contact'];

												if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']== $Contact)
												{
										$dis_query= "Select * from booking where Contact='$Contact'";
										$dis_execute = mysqli_query($con,$dis_query);
										if($dis_execute){
										
											while($row=mysqli_fetch_assoc($dis_execute)){

												echo "<td>";

												echo "<td>";
												$sn = $row['sn'];
												echo "<p>$sn.</p>";
												echo"</td>";


												echo "<td>";
												$fname = $row['fname'];
												echo "<p>$fname</p>";
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
													<?php						
													echo '<td>';
													echo "<a class='cancel-btn'  href='canceldatabase.php?Contact=$row[Contact] Name=$row[fname] Date=$row[date] Time=$row[time]'>Cancel</a>";
													echo '</td>';
													?>
													<!-- //Cancel Button and work -->
													<!-- <td><a class= "cancel-btn" name = "delete" href="canceldatabase.php?Contact=<?php echo $row['Contact']; ?> ">Cancel</td> -->

													<style>
														.cancel-btn{
															background: forestgreen;
															padding: 10px 30px ;
															color: black;
															font-size: 14px;
															font-weight: normal;
															outline: none;
															cursor: pointer;
															/* width: 10px; */
															/* margin: 100px auto 0; */
															border-radius: 30px;
														}
														.cancel-btn:hover{
															background: #fd2e2e;
															color: whitesmoke;
														}

														</style>
												
												<td> <a class="update-btn" href="update.php?sn=<?php echo $row['sn'];?>">Update</a></td>
																																											
													<!-- CSS for Cancel and Edit button -->
													<style>
														.update-btn{
														background: forestgreen;
														padding: 10px 30px;
														color: black;
														font-size: 14px;
														font-weight: normal;
														border: 0;
														outline: none;
														cursor: pointer;
														width: 130px;
														margin: 10px auto 0;
														border-radius: 30px;
														}
														.update-btn:hover {
														background: cornflowerblue;
														color: white;
														}
													</style>			
																																																	 												 																																				
												<?php
												echo "</td>";
												echo "<tr/>";
											}											
										}								
									}
															else{
															echo '<h1><center>Unauthorized Access to the CONTACT.</center></h1>';
															//$_SESSION['status'] = '<h1><center>Contact is not AUTHORIZED.</center><h1>';
															//header ("Location: http://localhost/project/user/userdashboard.php");
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