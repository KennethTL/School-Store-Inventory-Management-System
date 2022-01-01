<?php 

session_start();

$mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));

$update = false;
$id = 0;
$categoryid = '';
$itemname = '';
$quantity = '';
$price = '';
$supplierid = '';
$requisitionid = '';
$status = '';
$date = '';

if (isset($_POST['save'])) {
	$categoryid = $_POST['categoryid'];
	$itemname = $_POST['itemname'];
	$quantity = $_POST['quantity'];
	$price =$_POST['price'];
	$supplierid =$_POST['supplierid'];
	$requisitionid =$_POST['requisitionid'];
	$status =$_POST['status'];
	$date =$_POST['date'];

	$mysqli->query("INSERT INTO orders (category_code, item_name, quantity, unit_price, supplier_id, requisition_id, status, dateT VALUES ('".$categoryid."', '".$itemname."', '".$quantity."', '".$price."', '".$supplierid."', '".$requisitionid."', '".$status."', '".$date."' )") or die($mysqli->error());

	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: editorder.php");
}

if (isset($_GET ['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("UPDATE orders SET visibility = 1 WHERE order_id=$id") or die($mysqli->error());

	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: editorder.php");
}

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM orders WHERE order_id=$id") or die($mysqli->error());
	
	//count function error!

	if ($result->num_rows){
		$row = $result->fetch_array();
		$categoryid = $row['category_code'];
		$itemname = $row['item_name'];
		$quantity = $row['quantity'];
		$price = $row['unit_price'];
		$supplierid = $row['supplier_id'];
		$requisitionid = $row['requisition_id'];
		$status = $row['status'];
		$date = $row['dateT'];
	}
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$categoryid = $_POST['categoryid'];
	$itemname = $_POST['itemname'];
	$quantity = $_POST['quantity'];
	$price =$_POST['price'];
	$supplierid =$_POST['supplierid'];
	$requisitionid =$_POST['requisitionid'];
	$status =$_POST['status'];
	$date =$_POST['date'];

	$mysqli->query("UPDATE orders SET category_code= '".$categoryid."', item_name= '".$itemname."', quantity= '".$quantity."', unit_price= '".$price."', supplier_id= '".$supplierid."', requisition_id= '".$requisitionid."', status= '".$status."', dateT= '".$date."' WHERE order_id='".$id."'") or die ($mysqli->error);

	$_SESSION['message']= "Record has been updated!";
	$_SESSION['msg_type']= "warning";

	header('location: editorder.php');

}
?>