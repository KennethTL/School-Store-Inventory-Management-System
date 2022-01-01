<?php 

session_start();

$mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));

$update = false;
$id = 0;
$inventoryid = '';
$name = '';
$staffid = '';
$admissionno = '';
$datelended = '';
$datereturn = '';
$status = '';

if (isset($_POST['save'])) {
	$inventoryid = $_POST['inventoryid'];
	$name = $_POST['name'];
	$staffid = $_POST['staffid'];
	$admissionno =$_POST['admissionno'];
	$datelended =$_POST['datelended'];
	$datereturn =$_POST['datereturn'];
	$status =$_POST['status'];

	$mysqli->query("INSERT INTO lending (inventory_id, name, staff_id, admission_no, date_lended, date_return, status) VALUES ('".$inventoryid."', '".$name."', '".$staffid."', '".$admissionno."', '".$datelended."', '".$datereturn."', '".$status."')") or die($mysqli->error());

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: editrecords.php");
}

if (isset($_GET ['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("UPDATE lending SET visibility = 1 WHERE issue_id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: editrecords.php");
}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM lending WHERE issue_id=$id") or die($mysqli->error());
	
	//count function error!

	if ($result->num_rows){
		$row = $result->fetch_array();
		$inventoryid = $row['inventory_id'];
		$name = $row['name'];
		$staffid = $row['staff_id'];
		$admissionno = $row['admission_no'];
		$datelended = $row['date_lended'];
		$datereturn = $row['date_return'];
		$status = $row['status'];
	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$inventoryid = $_POST['inventoryid'];
	$name = $_POST['name'];
	$staffid = $_POST['staffid'];
	$admissionno =$_POST['admissionno'];
	$datelended =$_POST['datelended'];
	$datereturn =$_POST['datereturn'];
	$status =$_POST['status'];

	$mysqli->query("UPDATE lending SET inventory_id= '".$inventoryid."', name= '".$name."', staff_id= '".$staffid."', admission_no= '".$admissionno."', date_lended= '".$datelended."', date_return= '".$datereturn."', status= '".$status."' WHERE issue_id='".$id."'") or die ($mysqli->error);

	$_SESSION['message']= "Record has been updated!";
	$_SESSION['msg_type']= "warning";

	header('location: editrecords.php');

}
?>