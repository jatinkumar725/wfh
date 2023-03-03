<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
<?php 
	if(!isset($_SESSION['login_id']))
	    header('location:login.php');
    include 'db_connect.php';
    ob_start();
  if(!isset($_SESSION['system'])){

    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  }
  ob_end_flush();

	include 'header.php' 
      
     
?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <?php include 'sidebar.php' ?>
  <?php include 'topbar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	 <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
	    <div class="toast-body text-white">
	    </div>
	  </div>
    <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>

    <section class="section dashboard" id="main">
        <!-- Content Header (Page header) -->
        <div class="pagetitle pt-2 pb-3 d-flex align-items-center">
            <span id="page_name">
              <?php
                $page = isset($_GET['page']) ? $_GET['page'] : $title = "Dashboard";
                echo $title
              ?>
            </span>
            <nav>
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                  <a aria-current="page" class="active" href="./">
                    <i class="fa fa-home" aria-hidden="true"></i>
                  </a>
                </li>
                <li class="breadcrumb-item active">
                  <i class="fa fa-angle-right" aria-hidden="true"></i>
                  <span>
                    <?php
                      $page = isset($_GET['page']) ? $_GET['page'] : $title = "Dashboard";
                      echo $title 
                    ?>
                  </span>
                </li>
              </ol>
            </nav>
          </div>
          <!-- /.content-header -->
          <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
            if (!file_exists($page . ".php")) {
              include '404.html';
            } else {
              include $page . '.php';

            }
          ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer id="footer" class="main-footer">
    <div class="copyright">
      Copyright 
      <strong>
        <span>Cargo Bazaar India</span>
      </strong>. 
      All Rights Reserved
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<?php include 'footer.php' ?>
</body>
</html>
