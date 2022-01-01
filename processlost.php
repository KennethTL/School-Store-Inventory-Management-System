<?php 

session_start();

$mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));

$update = false;
$id = 0;
$issueid = '';
$staffid = '';
$admissionno = '';
$penalty = '';

if (isset($_POST['save'])) {
	$issueid = $_POST['issueid'];
	$staffid = $_POST['staffid'];
	$admissionno =$_POST['admissionno'];
	$penalty =$_POST['penalty'];

	$mysqli->query("INSERT INTO lost (issue_id, staff_id, admission_no, penalty) VALUES ('".$issueid."', '".$staffid."', '".$admissionno."', '".$penalty."')") or die($mysqli->error());

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: editP.php");
}

if (isset($_GET ['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("UPDATE lost SET visibility = 1 WHERE penalty_id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: editP.php");
}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM lost WHERE penalty_id=$id") or die($mysqli->error());
	
	//count function error!

	if ($result->num_rows){
		$row = $result->fetch_array();
		$issueid = $row['issue_id'];
		$staffid = $row['staff_id'];
		$admissionno = $row['admission_no'];
		$penalty = $row['penalty'];
	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$issueid = $_POST['issueid'];
	$staffid = $_POST['staffid'];
	$admissionno =$_POST['admissionno'];
	$penalty =$_POST['penalty'];


	$mysqli->query("UPDATE lost SET issue_id= '".$issueid."', staff_id= '".$staffid."', admission_no= '".$admissionno."', penalty= '".$penalty."' WHERE penalty_id='".$id."'") or die ($mysqli->error);

	$_SESSION['message']= "Record has been updated!";
	$_SESSION['msg_type']= "warning";

	header('location: editP.php');

}
?>