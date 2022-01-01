<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> ADMIN </title>

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
  header ("location: loginadmin.php");
?>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="admin2.php" class="site_title"><i class="fa fa-paw"></i> <span>ADMIN</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
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
                  <li><a><i class="fa fa-sitemap"></i> User Information <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="listusers.php">Read User Info</a></li>
                      <li><a href="editusers.php">Edit User Info</a></li>
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
                <h3>ADMINISTRATOR</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Search</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>EDIT USER INFORMATION</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      ..........

                      <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>ADMINISTRATOR</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>........</h2>
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
      $result = $mysqli->query("SELECT * FROM users WHERE visibility = 0") or die($mysqli->error);


    ?>


    <div class="row justify-content-center">
      <table class="table">
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>User Type</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>

      <?php
      while ($row = $result->fetch_assoc()): ?>

        <tr>
          <td><?php echo $row['fname']; ?></td>
          <td><?php echo $row['lname']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['user_type']; ?></td>
          <td>
            <a href="admin.php?edit=<?php echo $row['user_id']; ?>" class ="btn btn-info"> Edit </a>
            <a href="process.php?delete=<?php echo $row['user_id']; ?>" class ="btn btn-danger"> Delete </a>

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
    <form action="process.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="form-group">
      <label>First Name</label>
      <input type="text" name="fname" class="form-control" value="<?php echo $firstname; ?>" placeholder="First Name">
      </div>
      <div class="form-group">
      <label>Last Name</label>
      <input type="text" name="lname" class="form-control" value="<?php echo $lastname; ?>" placeholder="Last Name">
      </div>
      <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Email">
      </div>
      <div class="form-group">
      <label>User Type (Administrator / Principal / HOD / Store Clerk)</label>
      <input type="text" name="usertype" class="form-control" value="<?php echo $usertype ?>" placeholder="User">
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
