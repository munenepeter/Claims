<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}
 
// Include config file
require_once "db/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $unknown_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No User found with that username.";
                }
            } else{
              $unknown_err = "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close( $stmt);
    }
   
   if($username === 'peter'){
      header("location: claim manager/index.php");
   }else if($username === 'gibson'){
        header("location: index.php");  
   }else if($username === 'esther'){
        header("location: claim analyst/index.php");
   }else if($username === 'ivy'){
        header("location: assessor/index.php"); 
   }
    
     
    
     
    }
    // Close connection
    mysqli_close($link);

?>
 
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body style="font-size:22px;">
    <div class="container">
        <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0"  style="margin-left:200px;">
                <!--nested row-->
         <div class="row">
          <div class="col-lg-9">
            <div class="p-5">
         <div class="text-center">
                <h1 style="color:dark-blue;" class="h1 mb-4" >Login.</h1>
             <p style="color:blue"><i>Please fill in your credentials to login.</i></p>
             <span class="help-block"style="margin-left:0; color:red;"><i><?php echo $unknown_err ;?></i></span>
              </div> 
        <form action="" method="post" class="user">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input style="color:brown; font-size:22px;" type="text" id="exampleInputEmail" name="username" class="form-control form-control-user" value="<?php echo $username; ?>">
                <span class="help-block" style="color:red"><i><?php echo $username_err; ?></i></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input style="color:brown; font-size:22px;" type="password" name="password" class="form-control form-control-user">
                <span class="help-block" style="color:red"><i><?php echo $password_err; ?></i></span>
            </div>
            <div class="form-group">
                <input type="submit" id="login" class="btn btn-primary btn-user" value="Login" style="margin-left:150px;">
            </div>
        </form>
        <hr>
        <p class="lead text-right" style="color:blue;"><a href="forgot-password.php"><i>Forgot password?</i></a></p>
    </div>
   </div>  
   </div>             
   </div>             
   </div>             
   </div>             
   </div> 
    </div>
    <script>
      /*   var users = [
    { username: 'peter', password: '123456' },
    { username: 'gibson', password: '123456' },
    { username: 'esther', password: '123456' },
    { username: 'ivy', password: '123456' }
];

var button = document.getElementById('login');

button.onclick = function() {
   var username = document.getElementById('username').value;
   var password = document.getElementById('password').value; 

      if(username == users[0].username && password == users[i].password) {
      window.location.href = 'http://localhost/claims/claim manager/index.php';
          
      if(username == users[1].username && password == users[i].password) {
      window.location.href = 'http://localhost/claims/index.php';
          
      if(username == users[2].username && password == users[i].password) {
      window.location.href = 'http://localhost/claims/claim analyst/index.php';
          
      if(username == users[3].username && password == users[i].password) {
      window.location.href = 'http://localhost/claims/assessor/index.php';

      }else{
         alert('You are trying to break in!');
      }
  
}*/
    </script> 
    <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/jquery.min.js"></script>


</body>
</html>