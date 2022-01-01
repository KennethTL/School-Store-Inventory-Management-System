<?php 

session_start();

$mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));

$update = false;
$id = 0;
$categoryid = '';
$itemname = '';
$quantity = '';
$price = '';

if (isset($_POST['save'])) {
	$categoryid = $_POST['categoryid'];
	$itemname = $_POST['itemname'];
	$quantity = $_POST['quantity'];
	$price =$_POST['price'];

	$mysqli->query("INSERT INTO inventory (category_code, item_name, quantity, unit_price) VALUES ('".$categoryid."', '".$itemname."', '".$quantity."', '".$price."')") or die($mysqli->error());

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: editinventory.php");
}

if (isset($_GET ['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("UPDATE inventory SET visibility = 1 WHERE inventory_id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: editinventory.php");
}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM inventory WHERE inventory_id=$id") or die($mysqli->error());
	
	//count function error!

	if ($result->num_rows){
		$row = $result->fetch_array();
		$categoryid = $row['category_code'];
		$itemname = $row['item_name'];
		$quantity = $row['quantity'];
		$price = $row['unit_price'];
	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$categoryid = $_POST['categoryid'];
	$itemname = $_POST['itemname'];
	$quantity = $_POST['quantity'];
	$price =$_POST['price'];

	$mysqli->query("UPDATE inventory SET category_code= '".$categoryid."', item_name= '".$itemname."', quantity= '".$quantity."', unit_price= '".$price."' WHERE inventory_id='".$id."'") or die ($mysqli->error);

	$_SESSION['message']= "Record has been updated!";
	$_SESSION['msg_type']= "warning";

	header('location: editinventory.php');

}
?>