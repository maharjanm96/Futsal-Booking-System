<!-- Admin main login page -->
<?php
   session_start();
?>

<!DOCTYPE html>    
<html lang="en">    
<head> 
   
   
   <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Futsal Booking Login</title>  

    <link rel="stylesheet" type="text/css" href="css/adminstyle.css">
          
</head>     
<body>

   <div class="main">
      <div class="navbar">
         <div class="icon">
            <h2 class="logo">FUT<a>x</a>SAL</h2>
         </div>

               <div class="menu">
                  <ul>
                     <li><a href="#">HOME</li>
                     <li><a href="#">ABOUT</li>
                     <li><a href="#">SERVICE</li>
                     <li><a href="#">DESIGN</li>
                     <li><a href="#">CONTACT</li>   
                  </ul>
               </div>
         
                   <div class="search">
                     <a href="#"> <button class="btn">SEARCH</button></a>
                        <input class="srch" type="search" name="" placeholder="Search.......">
                   </div>
      </div>
      
            <!-- //message pop up -->
            <?php
               if(isset($_SESSION['status']))
               {
            ?>
               
               <?php echo $_SESSION['status']; ?>             					
                           
            <?php              
                  unset($_SESSION['status']);
               }
            ?>
         

      <div class="form">
         <div class="form-box">
            <div class="button-box">
               <div id="btnn"></div>

                  <button type="button" class="toggle-btn" onclick="login()">ADMIN LOGIN</button>                 

               </div>

                  <div class="social-icons">
                     <img src="img/fb.png">
                     <img src="img/ig.png">
                     <img src="img/tw.png">
                     <img src="img/go.png">
                  </div>


            <form  id="login" class="input-group" action="adminlogindatabse.php" method="post" >           
               <input type="tel" id="phone" class="input-field" name="Contact" placeholder="Contact (98XXXXXXXX)" >
               <input type="password" class="input-field" name="password" id="Show" placeholder="Enter Your password" >
               <input type="checkbox" class="check-box" onclick="myFunction()"><b>Show Password</b>
               <button  type="submit" name= "adminlogin" value="adminlogin" class="submit-btn" > Login</button>  
               <button type="userlogin" name="userlogin" class="userlogin" value="userlogin" >Login As User</button>
               <script>
                  //show password 
                  function myFunction()
                     {
                        var x = document.getElementById("Show");
                        if (x.type === "password") 
                           {
                              x.type = "text";
                           } 
                              else
                                 {
                                    x.type = "password";
                                 }
                      }        
               
               </script>
            </form>           

         </div>  
      
      </div>

   </body>  
</html>     
