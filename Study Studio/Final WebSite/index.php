 <ul class="nav navbar-nav navbar-right">
                 <?php            
 if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name']) ){
    //if(1){ 
     ?>
     <style>
     #signupID
     {
         display:none;
     }
     #loginID
     {
         display:none;
     } 
     </style>
    <?php } else{ ?>
    <style>
     #signoutID
     {
         display:none;
     }
     </style>
     <?php } //else end of if(isset($_SESSION['user_name'])....?>
                     <li>
                        <a class="page-scroll" href="">Welcome : 
                        <?php            
         if(isset($_SESSION["user_name"]) &&!empty($_SESSION["user_name"]))
                            echo $_SESSION["user_name"];
                        else
                            echo "Guest";
                        ?>
                        </a>
                    </li>                           
                   <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                 <li>
                        <a class="page-scroll" id="signoutID" href="signout.php">
<span class="fa fa-sign-out"></span> Signout</a>
                    </li> 
                   <li>
                        <a class="page-scroll" id="loginID" href="login.php">
<span class="fa fa-sign-in"></span> Login</a>
                    </li>
                     <li>
                        <a class="page-scroll" id="signupID" href="signup.php">
<span class="fa fa-user"></span> Sign Up</a>
                    </li>
                </ul>
            