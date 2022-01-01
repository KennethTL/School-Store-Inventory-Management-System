<?php 

session_start();

$mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));

$update = false;
$id = 0;
$firstname = '';
$lastname = '';
$email = '';
$usertype = '';

if (isset($_POST['save'])) {
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$email = $_POST['email'];
	$usertype =$_POST['usertype'];

	$mysqli->query("INSERT INTO users (fname, lname, email, user_type) VALUES ('".$firstname."', '".$lastname."', '".$email."', '".$usertype."')") or die($mysqli->error());

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: admin2.php");
}

if (isset($_GET ['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("UPDATE users SET visibility = 1 WHERE user_id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: admin2.php");
}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM users WHERE user_id=$id") or die($mysqli->error());
	
	//count function error!

	if ($result->num_rows){
		$row = $result->fetch_array();
		$firstname = $row['fname'];
		$lastname = $row['lname'];
		$email = $row['email'];
		$usertype = $row['user_type'];
	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$email = $_POST['email'];
	$usertype =$_POST['usertype'];

	$mysqli->query("UPDATE users SET fname= '".$firstname."', lname= '".$lastname."', email= '".$email."', user_type= '".$usertype."' WHERE user_id='".$id."'") or die ($mysqli->error);

	$_SESSION['message']= "Record has been updated!";
	$_SESSION['msg_type']= "warning";

	header('location: admin2.php');

}
?>