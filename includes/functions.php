<?php
class Login{
  public function LoginSystem(){
    $mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));
    session_start(); // Starting Session
    $error = ''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
      if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
      }
      else{
        include 'connect.php';
        // Define $username and $password
        $username = $_POST['email'];
        $password = md5($_POST['password']);
        // SQL query to fetch information of registerd users and finds user match.
        $query=("SELECT email, password FROM users WHERE email=? AND password=? LIMIT 1");
        // To protect MySQL injection for Security purpose
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($username, $password);
        $stmt->store_result();
        if($stmt->fetch()) //fetching the contents of the row {
          $_SESSION['email'] = $username; // Initializing Session
      }
      mysqli_close($conn); // Closing Connection
    }
  }
  public function SessionVerify(){
    $mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));
    if(isset($_SESSION['email'])){
    header("location: includes/checkuser.php"); // Check user session and role
    }
  }
  public function SessionCheck(){
    global $conn;
    $mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));
    session_start();
    // Storing Session
    $user_check = $_SESSION['email'];
    // SQL Query To Fetch Complete Information Of User
    $query =("SELECT * FROM users WHERE email = '".$user_check."'");
    $ses_sql = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_assoc($ses_sql);
    $_SESSION["id"] = $row["user_id"];
    $_SESSION["email"] = $row["email"];
    $_SESSION["role"] = $row["user_type"];
  }
  public function UserType(){
    $mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));
    //if user role is 1, redirect to admin page
    if ($_SESSION["role"] == "Administrator") {
      header("Location: production/admin2.php");
    }
    //if user role is 0, redirect to user page
    if ($_SESSION["role"] == "Principal") {
      header("Location: principal.php");
    }

    if ($_SESSION["role"] == "HOD") {
      header("Location: hod.php");
    }

     if ($_SESSION["role"] == 'Store Clerk') {
      header("Location: storeclerk.php");
    }
  }
}
class UserFunctions{
  public function UserName(){
    $username = $_SESSION["email"];
    echo $username;
  }
}
?>
