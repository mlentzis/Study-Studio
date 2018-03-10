<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Study Studio - Sign Up</title>
        <!-- Reset page styles  -->
		<link href="reset.css" rel="stylesheet"/>
		<link href="StudyStudioStyles.css" rel="stylesheet"/>

    </head>

    <header>
		<div id="navImg"> </div>
        <nav id="headNav"><!-- start of navigation bar -->
            <ul id="left">
                <li><a href="#"><!--<img id="logo" src="Logo.svg"/>-->Study Studio</a></li>
                <li><a href="#">Subject</a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            </ul>
            <ul id="right">
                <li><input type="search" id="navSearch" placeholder="search"></li>
                <li><a href="StudyStudioSignUp.html">Sign Up</a></li>
                <li><a href="StudyStudioHomePage.html">Login</a></li>
            </ul>
        </nav><!-- end nav -->
    </header>
			
		<!--Checks for password match-->

	<script language='javascript' type='text/javascript'>
	
	function check(input) {
		if (input.value != document.getElementById('passwordID').value) {
			input.setCustomValidity('Password Must be Matching.');
		} 
		else {
	// input is valid -- reset the error message
			input.setCustomValidity('');
		}
	}

/*
	function checkValues() {
		if((document.geElementById('firstName').length < 3){
			alert("Missing First Name or Name Too Short");
			//window.history.back();
			return false;
		} else {
			return true;
		}
	}
	*/
	</script>

	<section id="SignUp">
		
		<h1>Sign Up</h1>
		<form name="signupform" action="StudyStudioSignUp_next.php" method="POST" >
			<input type="text" name="firstName" class="signUp" id="firstName" placeholder="First Name" required>
			<input type="text" name="lastName" class="signUp" id="lastName" placeholder="Last Name" required><br>
			<input type="text" name="email" class="signUp" id="email" placeholder="Email" required><br>
			<input type="text" name="school" class="signUp" id="school" placeholder="School" required><br>
			<input type="text" name="userName" class="signUp" id="userName2" placeholder="User Name" required><br>
			<input type="password" name="password2" class="signUp" id="passwordID" placeholder="Password" required>
			<input type="password" name="check" class="signUp" id="check" placeholder="Re-type Password" oninput="check(input);" required><br>
			<!--
			<input type="checkbox" name="instructor" class="signUp" id="instructor" value="instructor" onclick="instructor">
			<label for="instructor">Instructor</label><br>
			-->
			<input type="submit" name="submit" id="signUpBtn" value="Sign Up" >
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