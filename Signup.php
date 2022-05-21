  
<?php
    session_start();
    include('config.php');
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">The email address is already registered!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO users(username,password,email) VALUES (:username,:password_hash,:email)");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                echo '<p class="success">Your registration was successful!</p>';
            } else {
                echo '<p class="error">Something went wrong!</p>';
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
<h1 >Sign Up </h1>

<form name="myForm" action="" onsubmit="return validateForm()" method="post">
    <div class="form-element">
<label>Username</label>
<input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
</div>
<div class="form-element">
<label>Email</label>
<input type="email" name="email" required />
</div>
<div class="form-element">
<label>Password</label>
<input type="password" name="password" required />
</div>
<button type="submit" name="register"  class="sign-in" value="register" onclick="return validateForm()"> Sign up</button> 
  <a href="" class='sign-up'> &nbsp Home?</a>
</form>
        
    
  <script>
function validateForm() {
  let x = document.forms["myForm"]["username"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
    
 let pw = document.forms["myForm"]["password"].value;
    if(pw.length < 8) {
    alert("Password length must be at least 8 characters");
    return false;
  }   
    
   
    
    
    
    
    
}
</script>
       <footer>
  
		
				<div class="clear"> </div>
		
		<div class="copy-tight">
			<p>&copy SAKAN ALSAYED</p>
		</div>
           
           
    </footer>
    </body>

</html>