<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Musa Abbasov">
  <title>PRINCIPAL</title>
  <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>
  <?php
require('includes/connect.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['submit'])){
        // removes backslashes
  $email = stripslashes($_POST['email']);
        //escapes special characters in a string
  $email = mysqli_real_escape_string($conn,$email);
  $password = stripslashes($_POST['password']);
  $password = mysqli_real_escape_string($conn,$password);
  //Checking is user existing in the database or not
        $query = "SELECT * FROM users WHERE email='$email'
and password='".md5($password)."'";
  $result = mysqli_query($conn,$query);
  $rows = mysqli_num_rows($result);
        if($rows==1){
      $_SESSION['email'] = $email;
            
      header("Location: principal.php");
         }else{
  echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='loginprincipal.php'>Login</a></div>";
  }
    }else{
?>
  <div class="container">
    <div class="row rwcenter">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Principal Login</h5>
            <form class="form-signin" action="" method="POST">
              <div class="form-label-group">
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

               <div><p><h7><i>Do not have an account?</i><a href="registration.php">Register Here</a></h7></p></div>
                            
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</body>

</html>
