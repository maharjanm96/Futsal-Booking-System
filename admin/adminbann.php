<!-- Admin banning dashboard -->
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
				<a href="#">
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
				<?php 
					echo $_SESSION['status'];
				?>
  						
				
			 	<?php              
           			unset($_SESSION['status']);
            }
       		 	?>

			<div class="head-title">			
				<div class="left">
					<h1>Banning Dashboard</h1>										
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
                <form action="adminbanndatabase.php" method="POST">
                    <h1>User Banning Section</h1>
					<input type="tel"  class="form" name="Contact" placeholder="Enter Contact to Bann" required pattern="98[0-9]{8}">												
					<!-- <input type="text" rows="4" cols="50" class ="form" name="mesg" placeholder="Reason To Bann...." required> -->
					<input type="submit" class="button" name="submit" value="Bann User">
	
					
                    <style>
                        .container1{
                            width: 100%;
                            height: 40vh;
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
						padding: 12px 155px;
						color: black;
						font-size: 13px;
						font-weight: bold;
						border: 0;
						outline: none;
						cursor: pointer;
						/* width: 200px; */
						margin: 10px auto 0;
						border-radius: 30px;
						}
						.button:hover{
						background: red;
                        color: whitesmoke;
						}
															
					</style>

  				</form>
			</div>

            

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="dashscript.js"></script>
</body>
</html>