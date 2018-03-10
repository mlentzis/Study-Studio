<!doctype html>

<html>
	<?php session_start(); ?>
    <head>
        <meta charset="utf-8" />
        <title>Study Studio - Sign Up</title>
        <!-- Reset page styles  -->
		<link href="reset.css" rel="stylesheet">
		<link href="StudyStudioStyles.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
		<link href="fonts.css" rel="stylesheet">
    </head>

    <header>
		<div id="navImg"> </div>
        <nav id="headNav"><!-- start of navigation bar -->
			


			<?php	if (1) : ?>
					<ul id="left">
						<li><a href="#">Study Studio</a></li>
						<li><a href="#">Subject</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#"></a></li>
					</ul>
					<ul id="right">
						<li><input type="search" id="navSearch" placeholder="Search"></li>
						<li><a href="StudyStudioSignUp.html">Sign Up</a></li>
						<li><a href="StudyStudioHomePage.html">Login</a></li>
					</ul>
				
			<?php	else: ?>
					<ul id="left">
						<li><a href="#">Study Studio</a></li>
					</ul>
			<?php endif; ?>
				 
			
        </nav><!-- end nav -->
    </header>
		
	<section id="SignUp">
		
		<h1>Sign Up</h1>
		<form>
			<input type="text" name="firstName" class="signUp" id="firstName" placeholder="First Name">
			<input type="text" name="lastName" class="signUp" id="lastName" placeholder="Last Name"><br>
			<input type="text" name="email" class="signUp" id="email" placeholder="Email"><br>
			<input type="text" name="school" class="signUp" id="school" placeholder="School"><br>
			<input type="text" name="userName2" class="signUp" id="userName2" placeholder="User Name"><br>
			<input type="password" name="password2" class="signUp" id="SignUp" placeholder="Password">
			<input type="password" name="check" class="signUp" id="check" placeholder="Re-type Password"><br>
			<!--
			<input type="checkbox" name="instructor" class="signUp" id="instructor" value="instructor" onclick="instructor">
			<label for="instructor">Instructor</label><br>
			-->
			<input type="submit" name="submit" id="signUpBtn" value="Sign Up">
		</form>
		
	</section>

	<section id="section2">
	
	</section>
	
	<script>
		document.getElementById('instructor').onclick = function instructor()
		{
			document.getElementById("section2").innerHTML=("added stuff here");
		}
	</script>





	<footer>
                <p id="footer">
				    <!-- information here -->
				</p>
				
				<!-- three column layout for footer information, if needed -->
				<nav id="end">
					<ul>
						<div id="col1">
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
						</div>
						<div id="col2">
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
						</div>
						<div id="col3">
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
						</div>
					</ul>
				</nav>
        </footer>