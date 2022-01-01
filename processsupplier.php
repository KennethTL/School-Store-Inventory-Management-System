<?php 

session_start();

$mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));

$update = false;
$id = 0;
$name = '';
$contact = '';
$email = '';

if (isset($_POST['save'])) {
	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];

	$mysqli->query("INSERT INTO supplier (name, contact, email) VALUES ('".$name."', '".$contact."', '".$email."')") or die($mysqli->error());

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: editsupllier.php");
}

if (isset($_GET ['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("UPDATE supplier SET visibility = 1 WHERE supplier_id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: editsupllier.php");
}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM supplier WHERE supplier_id=$id") or die($mysqli->error());
	
	//count function error!

	if ($result->num_rows){
		$row = $result->fetch_array();
		$name = $row['name'];
		$contact = $row['contact'];
		$email = $row['email'];
	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];

	$mysqli->query("UPDATE supplier SET name= '".$name."', contact= '".$contact."', email= '".$email."' WHERE supplier_id='".$id."'") or die ($mysqli->error);

	$_SESSION['message']= "Record has been updated!";
	$_SESSION['msg_type']= "warning";

	header('location: editsupllier.php');

}
?>