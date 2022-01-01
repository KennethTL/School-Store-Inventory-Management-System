<?php 

session_start();

$mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));

$update = false;
$id = 0;
$categoryId = '';
$itemName = '';
$staffId = '';
$quantityN = '';
$date = '';

if (isset($_POST['save'])) {
	$categoryId = $_POST['categoryid'];
	$itemName = $_POST['itemname'];
	$staffId = $_POST['staffid'];
	$quantityN =$_POST['quantity'];
	$date = $_POST['date'];

	$mysqli->query("INSERT INTO requisitions (category_code, item_name, staff_id, quantity, dateT) VALUES ('".$categoryId."', '".$itemName."', '".$staffId."', '".$quantityN."', '".$date."')") or die($mysqli->error());

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: requisitionF.php");
}

if (isset($_GET ['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("UPDATE requisitions SET visibility=1 WHERE requisition_id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: requisitionF.php");
}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM requisitions WHERE requisition_id=$id") or die($mysqli->error());
	
	//count function error!

	if ($result->num_rows){
		$row = $result->fetch_array();
		$categoryId = $row['category_code'];
		$itemName = $row['item_name'];
		$staffId = $row['staff_id'];
		$quantityN = $row['quantity'];
		$date = $row['dateT'];
	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$categoryId = $_POST['categoryid'];
	$itemName = $_POST['itemname'];
	$staffId = $_POST['staffid'];
	$quantityN =$_POST['quantity'];
	$date = $_POST['date'];

	$mysqli->query("UPDATE requisitions SET category_code= '".$categoryId."', item_name= '".$itemName."', staff_id= '".$staffId."', quantity= '".$quantityN."', dateT = '".$date."' WHERE requisition_id='".$id."'") or die ($mysqli->error);

	$_SESSION['message']= "Record has been updated!";
	$_SESSION['msg_type']= "warning";

	header('location: requisitionF.php');

}
?>