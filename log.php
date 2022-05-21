<?php
    session_start();
    include('config.php');
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">Username  or password  wrong!</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['id'];
                echo '<p class="success">Congratulations, you are logged in!</p>';
            } else {
                echo '<p class="error">Username or password   wrong!</p>';
            }
        }
    }
?>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="stylelog.css">
</head>
<body >
    
    
    <div class="container">
    <div class="card">
        <div class="top-row">
<h1 >Sign In </h1>
    <h3> Welcome Back</h3>
            </div>

<form method="post" action="" name="signin-form">
  <div class="form-element">
    <label>Username</label>
    <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
        <i class="fa fa-envelope"></i>
  </div>
  <div class="form-element">
    <label>Password</label>
    <input type="password" name="password" required />
      <span id = "message" style="color:red"> </span> <br><br>     <i class="fa fa-lock"></i>
       <span><small class="fa fa-eye-slash passcode"></small></span>

  </div>
    <a href="" class='forgot'>
        <p class="forget">Forgot your password?  </p></a>
  <button type="submit" name="login" class="sign-in"  value="login" onclick="check(this.form)"  >Log In</button>
    <a href="Signup.php" class='sign-up'> &nbsp Sign up?</a>

</form>
  
 
     </div>
</div>        
            
            
            
            
            
            
            
            
            
      
       <footer>
  
		
				<div class="clear"> </div>
		
		<div class="copy-tight">
			<p>&copy SAKAN ALSAYED </p>
		</div>
           
    </footer>
    </body>

</html>
    
    
    
    
    
    
    
    
    
    