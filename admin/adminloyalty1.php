<!-- Admin le loyalty check garni dashboard -->
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
				<a href="#">
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
					<h1>User Loyalty Check Dashboard</h1>										
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
				<!-- <a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> -->
</div>


            <div class="container1">
                <form action="#" method="POST">
				<h1>User Loyalty Stats Check </h1>
					<input type="tel" id="contact" class="form" name="Contact" placeholder="Enter Contact To Check User Loyalty" required pattern="98[0-9]{8}">												
					<input type="submit"  name="check" class="button" value="Check"id="btnn"></input>
                   
					
                    <style>
                        .container1{
                            width: 100%;
                            height: 30vh;
	                        display: flex;
	                        align-items: center;
	                        justify-content: center;
                        }
                        .container1 form{
                        background: whitesmoke;
                        display: flex;
                        flex-direction: column;
                        padding: 2vw 4vw;
                        width: 90%;
                        max-width: 500px;
                        border-radius: 30px;
                        
                    }
                    form input{
                        border: 0;
                        margin: 10px 0;
                        padding: 15px;
                        outline: none;
                        font-size: 16px;
                        border-radius: 40px;
                        font-weight: bold;
                    }
						.button {
						background: forestgreen;
						padding: 11.5px 155px;
						color: black;
						font-size: 15px;
						font-weight: bold;
						border: 0;
						outline: none;
						cursor: pointer;
						/* width: 200px; */
						margin: 10px auto 0;
						border-radius: 30px;
						}
						.button:hover{
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
						<p><h3>User Total Bookings</h3></p>
						<?php
							
							$connection = mysqli_connect("localhost","root","","futsal"); 
							
								if(isset($_POST['check'])){
									$Contact = $_POST['Contact'];														                      
							// $query = "SELECT Contact from booking ORDER BY Contact";
							$query = "Select * from booking where Contact='$Contact';";
							$query_run = mysqli_query($connection,$query);
							$row = mysqli_num_rows($query_run);
							echo '<h3>'.$row.'</h3>';
							
							// if($row==2){
							// 	$temprow=0;
							// 	echo '<h3>'.$temprow.'</h3>';
							// 	echo '<h3>'.'Free Game' .'</h3>';

							// }
							
							// else{
							// 	echo '<h3>'.$row.'</h3>';
							// }
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
						<h3>User Bookings</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th></th>
								<th>Name</th>
                                <th>Contact</th>
								<th>Booked Date</th>
								<th>Booked Time</th>
								<!-- <th>Cancel Book</th> -->
								
							</tr>
						</thead>
							<tbody>


				<?php
						$con= mysqli_connect("localhost","root","","futsal");

						if($con){
											
						if(isset($_POST['check'])){
							$Contact = $_POST['Contact'];
							//echo "$Contact";

							//$dis_query ="Select  fname, Contact, date, time FROM booking"; 
							$dis_query= "Select * from booking where Contact='$Contact'";
							$dis_execute = mysqli_query($con,$dis_query);
						

							if($dis_execute){
										
								while($row=mysqli_fetch_assoc($dis_execute)){

									echo "<td>";

									echo "<td>";
									$fname = $row['fname'];
									echo "<p>$fname</p>";
									echo"</td>";

									echo "<td>";
									$fname = $row['Contact'];
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
						<?php
												echo "</td>";
												echo "<tr/>";
											}											
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