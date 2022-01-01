<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HOD |FILL REQUISITION FORMS</title>

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
  header ("location: loginhod.php");
?>
    <div class="container body">
      <?php require_once 'processhod.php'; ?>

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
              <a href="hod.php" class="site_title"><i class="fa fa-paw"></i> <span>HOD</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>HOD</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-edit"></i> Requisition <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="requisitionF.php">Fill requisition form</a></li>
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
                <h3>HOD</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Requisistion Form</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      ..........
                      <div class = "x_content">
                       

    <div class="container">

    <?php
      $mysqli = new mysqli ('localhost', 'root', '', 'ssims2') or die(mysqli_error ($mysqli));
      $result = $mysqli->query("SELECT * FROM requisitions WHERE visibility = 0") or die($mysqli->error);


    ?>


    <div class="row justify-content-center">
      <table class="table">
        <thead>
          <tr>
            <th>Category Code</th>
            <th>Item Name</th>
            <th>Staff ID</th>
            <th>Quantity</th>
            <th>Date</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>

      <?php
      while ($row = $result->fetch_assoc()): ?>

        <tr>
          <td><?php echo $row['category_code']; ?></td>
          <td><?php echo $row['item_name']; ?></td>
          <td><?php echo $row['staff_id']; ?></td>
          <td><?php echo $row['quantity']; ?></td>
          <td><?php echo $row['dateT']; ?></td>
          <td>
            <a href="requisitionF.php?edit=<?php echo $row['requisition_id']; ?>" class ="btn btn-info"> Edit </a>
            <a href="processhod.php?delete=<?php echo $row['requisition_id']; ?>" class ="btn btn-danger"> Delete </a>

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

    <div class="row justify-content-center">
    <form action="processhod.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="form-group">
      <label>Category (PM001-PERMANENT / EX002-EXPENDABLE / CM003-CONSUMABLE)</label>
      <div>
      <label><input type="radio" name="categoryid" class="form-control" value="PM001" placeholder="Category ID">PM001</label>
      <label><input type="radio" name="categoryid" class="form-control" value="EX002" placeholder="Category ID">EX002</label>
      <label><input type="radio" name="categoryid" class="form-control" value="CM003" placeholder="Category ID">CM003</label>
      </div>
    </div>
      <div class="form-group">
      <label>Item Name</label>
      <input type="text" name="itemname" class="form-control" value="<?php echo $itemName; ?>" placeholder="Item Name">
      </div>
      <div class="form-group">
      <label>Staff ID</label>
      <input type="text" name="staffid" class="form-control" value="<?php echo $staffId; ?>" placeholder="Staff ID">
      </div>
      <div class="form-group">
      <label>Quantity</label>
      <input type="text" name="quantity" class="form-control" value="<?php echo $quantityN; ?>" placeholder="Quantity">
      </div>
      <div class="form-group">
      <label>Date</label>
      <input type="text" name="date" class="form-control" value="<?php echo $date; ?>" placeholder="DD/MM/YYYY">
      </div>

        <?php 
        if ($update == true):
        ?>
            <button type="submit" name="update" class="btn btn-info">Update</button>
      <?php endif; ?>
      <?php if ($update == false): ?>
            <button type="submit" name="save" class="btn btn-primary">Save</button>
      <?php endif; ?>
      </div>
    </form>
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
            SSIMS 
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
