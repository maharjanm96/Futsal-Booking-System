<!-- User ko main login page ra register page -->
<?php
   session_start();

?>
<!DOCTYPE html>    
<html lang="en">    
<head>    
    <title>Futsal Booking Login</title>  
   
    <link rel="stylesheet" type="text/css" href="css/userstyle.css">
          
</head>     
<body> 

   <div class="main">
      <div class="navbar">
         <div class="icon">
            <h2 class="logo">FUT<a>x</a>SAL</h2>           
         </div>

               <div class="menu">
                  <ul>
                     <li><a href="">HOME</a></li>
                     <li><a href="">SERVICE</a></li>
                     <li><a href="">ABOUT</a></li>
                     <li><a href="">INFO</a></li>
                     <li><a href="">CONTACT</a></li>
                     

                     <?php
                        if(isset($_SESSION['status']))
                        {
		               ?>			
					         <?php echo $_SESSION['status']; ?>
				
		               <?php              
                        unset($_SESSION['status']);
                        }
                     ?> 
                  </ul>
               </div>              
        
                   
         </div>
      

      <div class="form">
         <div class="form-box">
            <div class="button-box">
               <div id="btnn"></div>

                  <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                  <button type="button" class="toggle-btn" onclick="register()">Register</button>

               </div>

                  <div class="social-icons">
                     <img src="img/fb.png">
                     <img src="img/ig.png">
                     <img src="img/tw.png">
                     <img src="img/go.png">
                  </div>

                  <!-- User Login Form -->
                  <form  id="login" class="input-group" action="loginconn.php" method="post">
           
                     <input type="tel" id="phone" class="input-field" name="Contact" placeholder="Contact (98XXXXXXXX)" required pattern="98[0-9]{8}" title="Must be 10 numbers starting with 98.">

                     <input type="password" class="input-field" name="password" id="Show" placeholder="Enter Your password" required>

                     <input type="checkbox" class="check-box" onclick="myFunction()"><b>Show Password</b>

                     <button  type="submit" name= "Login"  class="submit-btn" >Login</button>
      
                        <script>
                     
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
                 <!-- User Register Form -->
            <form action="registerconn.php" method="post" id="register" class="input-group">

               <input type="text" class="input-field" name="fname" placeholder="Enter Your Full Name " required pattern="[a-zA-Z'-'\s]*" title="Must be alphabet only.">  

               <input type="text" class="input-field" name="email" placeholder="Enter Your Email Address " required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Example: abc12@gmail.com">  
         
               <input type="tel" id="phone" class="input-field" name="Contact" placeholder="Contact (98XXXXXXXX)" required pattern="98[0-9]{8}" title="Must be 10 numbers starting with 98.">

               <input type="password" class="input-field" name="password" id="Input" placeholder="Enter Your Password " required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters.">  

               <input type="checkbox" class="check-box" onclick="showFunction()"><b>Show Password</b>

               <script>
                  function showFunction()
                  {
                     var x = document.getElementById("Input");
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
      
               <button type="submit"  class="submit-btn" >Register</button>             
                  
            </form>  

          </div>  
      
      </div>

      <script>
         var x = document.getElementById("login");
         var y = document.getElementById("register");
         var z = document.getElementById("btnn");

         function register()
         {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
         }

         function login()
         {
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
         }

        

      </script>
   </body>  
</html>     

