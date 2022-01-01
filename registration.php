<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
<!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php
$mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));
require('includes/connect.php');
if (isset($_POST['register'])){
        
	$firstname = $_POST['firstname'];
    
	$lastname = $_POST['lastname'];
	
    $email = $_POST['email'];
    
	$password = $_POST['password'];
    
    $usertype = $_POST['usertype'];
    
    
        $query = "INSERT INTO users (fname, lname, email, password, user_type)
VALUES ('$firstname', '$lastname' , '$email', '".md5($password)."', '$usertype')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='home.php'> Login </a></div>";
        }
    }else{
?>


<div><a href="home.php">Back to Home Page</a></div>
<div class="container">
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<div class="form-textbox">
    <label>First Name</label>
    <input type="text" name="firstname" placeholder="First Name" required />
</div>
<div class="form-textbox">
    <label>Last Name</label>
    <input type="text" name="lastname" placeholder="Last Name" required />
</div>
<div class="form-textbox">
    <label>Email Address</label>
    <input type="email" name="email" placeholder="Email" required />
</div>
<div class="form-textbox">
    <label>Password</label>
    <input type="password" name="password" placeholder="Password" required />
</div>
<div class="form-textbox">
    <label>Usertype</label>
    
    <ul><input type="radio" name="usertype" placeholder="" value="Principal" required />Principal</ul>
    <ul><input type="radio" name="usertype" placeholder="" value="HOD" required />HOD</ul>
    <ul><input type="radio" name="usertype" placeholder="" value="Store Clerk" required />Store Clerk</ul>
    
</div>
<div class="form-textbox">
<input type="submit" name="register" value="Register"/>
</div>
</form>
</div>
</div>
<?php } ?>
</body>
</html>
