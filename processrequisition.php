<?php 

session_start();

$mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));

$update = false;
$id = 0;
$status = '';
$date='';

if (isset($_POST['save'])) {
	$status = $_POST['status'];
	$date = $_POST['date'];

	$mysqli->query("INSERT INTO requisitions (status, dateT) VALUES ('".$status."', '".$date."')") or die($mysqli->error());

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: decision.php");
}

if (isset($_GET ['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("UPDATE requisitions SET visibility = 1 WHERE requisition_id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: decision.php");
}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM requisitions WHERE requisition_id=$id") or die($mysqli->error());
	
	//count function error!

	if ($result->num_rows){
		$row = $result->fetch_array();
		$status = $row['status'];
		$date = $row['dateT'];
	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$status = $_POST['status'];
	$date = $_POST['date'];

	$mysqli->query("UPDATE requisitions SET status= '".$status."', dateT= '".$date."' WHERE requisition_id='".$id."'") or die ($mysqli->error);

	$_SESSION['message']= "Record has been updated!";
	$_SESSION['msg_type']= "warning";

	header('location: decision.php');

}
?>