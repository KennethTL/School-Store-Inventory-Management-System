<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> STORE CLERK </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <?php

session_start();

error_reporting(0);

if($_SESSION['email'])
{
  echo "You are logged in as: ".$_SESSION['email'];
}
else 
  header ("location: loginstoreclerk.php");
?>
    <div class="container body">

      <?php require_once 'processorder.php'; ?>

 <?php
      if (isset($_SESSION['message'])): ?>


    <div class="alert alert-<?=$_SESSION['msg_type']?>">  
    
    <?php 
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>  
  </div>
  <?php endif;  ?>

      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="storeclerk.php" class="site_title"><i class="fa fa-paw"></i> <span>STORE CLERK</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Store Clerk</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>School Inventory</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bookmark"></i> Journal <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="journal.php">Journal Details</a></li>
                      <li><a href="permanent.php">Permanent Inventory</a></li>
                      <li><a href="consumable.php">Consumable Inventory</a></li>
                      <li><a href="expendable.php">Expendable Inventory</a></li>
                      <li><a href="editinventory.php">Edit Inventory</a></li>
                    </ul>
                  </li>  
                </ul>
              </div>
              <div class="menu_section">
                <h3>Requisition Forms</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-inbox"></i> Approved Requisitions<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="approved.php">Requisition Details</a></li>
                    </ul>
                  </li>  
                </ul>
              </div>
              <div class="menu_section">
                <h3>Suppliers and Orders</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-truck"></i> Records <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="supplier.php">Supplier Details</a></li>
                      <li><a href="orders.php">Orders</a></li>
                      <li><a href="received.php">Received Orders</a></li>
                      <li><a href="editsupplier.php">Edit Supplier Details</a></li>
                      <li><a href="editorder.php">Edit Order Details</a></li>
                    </ul>
                  </li>  
                </ul>
              </div>
              <div class="menu_section">
                <h3>Staff and Students</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-users"></i> Information <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="teacher.php">Staff Details</a></li>
                      <li><a href="student.php">Student Details</a></li>
                    </ul>
                  </li>  
                </ul>
              </div>
              <div class="menu_section">
                <h3>Inventory Management</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-list-alt"></i> Store Activities <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="lending.php">Lending Records</a></li>
                      <li><a href="issued.php">Issued Items</a></li>
                      <li><a href="returned.php">Returned Items</a></li>
                      <li><a href="lost.php">Lost Items</a></li>
                      <li><a href="editrecords.php">Edit Records</a></li>
                    </ul>
                  </li>  
                </ul>
              </div>
              <div class="menu_section">
                <h3>Departments</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-university"></i> Records<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="department.php">Department Details</a></li>
                    </ul>
                  </li>  
                </ul>
              </div>
              <div class="menu_section">
                <h3>Penalties</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-times"></i> Details<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="listP.php">Summary</a></li>
                    <li><a href="editP.php">Edit Records</a></li>
                  </ul>
                  </li>  
                </ul>
              </div>
              <div class="menu_section">
                <h3>Reports</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-book"></i> File <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="inventoryR.php">Inventory Information</a></li>
                      <li><a href="issuedR.php">Issued Items</a></li>
                      <li><a href="returnedR.php">Returned Items</a></li>
                      <li><a href="lostR.php">Lost Items</a></li>
                      <li><a href="ordersR.php">Orders Made</a></li>
                    </ul>
                  </li>  
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="images/user.png" alt="">User
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">                    
                      <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Store Clerk</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Order Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      All Records
                      <div class = "x_content">
                       

    <div class="container">

    <?php
      $mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));
      $result = $mysqli->query("SELECT * FROM orders WHERE visibility = 0") or die($mysqli->error);


    ?>


    <div class="row justify-content-center">
      <table class="table">
        <thead>
          <tr>
            <th>Category Code</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Supplier ID</th>
            <th>Requisition ID</th>
            <th>Date</th>
            <th>Status</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>

      <?php
      while ($row = $result->fetch_assoc()): ?>

        <tr>
          <td><?php echo $row['category_code']; ?></td>
          <td><?php echo $row['item_name']; ?></td>
          <td><?php echo $row['quantity']; ?></td>
          <td><?php echo $row['unit_price']; ?></td>
          <td><?php echo $row['supplier_id']; ?></td>
          <td><?php echo $row['requisition_id']; ?></td>
          <td><?php echo $row['dateT']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td>
            <a href="editorder.php?edit=<?php echo $row['order_id']; ?>" class ="btn btn-info"> Edit </a>
            <a href="processorder.php?delete=<?php echo $row['order_id']; ?>" class ="btn btn-danger"> Clear </a>

          </td>
        </tr>

      <?php endwhile; ?>
    </table>
  </div>

    <?php  
      function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
      }

    ?> 

    
    </div>

                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            SSIMS 2019
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
