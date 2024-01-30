<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Y School</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/sign_in.css">
	<link rel="icon" href="sanjuanlogo.png">
   
</head>

<body class="body-login">
    <div class="black-fill"><br /> <br />
    	<div class="d-flex justify-content-center align-items-center flex-column">
    	<form class="login" action="register.php" method="post" onsubmit="return validateForm()">
    		<div class="text-center">
    			<img src="sanjuanlogo.png"
    			     width="100px"
                     height="85px">
    		</div>
    		<h2>Create an Account</h2>
        
        <div class="mb-3">
		    <label class="form-label">First Name</label>
		    <input type="text" class="form-control" id="firstName" name="firstName" required>
            <div class="error-message" id="firstNameError"></div>
		</div>
        <div class="mb-3">
		    <label class="form-label">Last Name</label>
		    <input type="text" class="form-control" id="lastName" name="lastName"required>
            <div class="error-message" id="lastNameError"></div>
		</div>
		  <div class="mb-3">
		    <label class="form-label">Username</label>
		    <input type="text" class="form-control" id="username" name="username" required>
            <div class="error-message" id="usernameError"></div>
		  </div>
		  
		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="password" class="form-control" id="password" name="password"required >
            <div class="error-message" id="passwordError"></div>
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Login As</label>
		    <select class="form-control" name="role">
		    	<option value="1">Admin</option>
		    	<option value="2">Student</option>
		    	<option value="3">Teacher</option>
		    </select>
		  </div>
		  
        <div class="d-grid gap-2">
		   	<button type="submit" class="btn btn-primary">Register</button>
            <a href="index.php" class="btn btn-secondary">Go Back</a>
        </div>

        <br /><br />
        <div class="text-center text-light">
        	Copyright &copy; 2024 <br> Juan National High School. 
			<br>All rights reserved.
        </div>
		</form>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
</body>
</html>