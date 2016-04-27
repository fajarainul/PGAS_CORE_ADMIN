<?php
  session_start();

  if(!isset($_SESSION['username'])){

    header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>PGAS CORE</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- Include datatable -->
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.11/css/jquery.dataTables.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <!-- <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div> -->

            <!--logo start-->
            <a href="#" class="logo"><img src="assets/img/pgas.png" style="max-height:40px;width:auto;"></img></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <p style="font-size:16px; margin-left:-80px; color:white">Sistem Pemetaan Joint Closure dan Management Core<br>PT PGAS Telekomunikasi Nusantara</p>
            </div>
            <!-- <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div> -->
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	 <!--  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['name'];?></h5> -->
                  <li class="mt">
                      <a href="index.php">
                          <i class="fa fa-home"></i>
                          <span>Home</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Table LINK</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="table_link.php?type_link=CSBWI">CYBER SERPONG BWI</a></li>
                          <li><a  href="table_link.php?type_link=CSEQU">CYBER SERPONG EQUATRA</a></li>
                          <li><a  href="table_link.php?type_link=NCBWI">NOC CYBER BWI</a></li>
                          <li><a  href="table_link.php?type_link=NCEQU">NOC CYBER EQUATRA</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Table OTB</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="table_otb.php?type_otb=OTBCYBER">OTB CYBER</a></li>
                          <li><a  href="table_otb.php?type_otb=OTBNOC">OTB NOC</a></li>
                          <li><a  href="table_otb.php?type_otb=SBWI">OTB SERPONG</a></li>
                          <li><a  href="table_otb.php?type_otb=DBWI">OTB DUREN</a></li>
                      </ul>
                  </li> 
                  <li>
                      <a href="logout.php">
                          <i class="fa fa-sign-out"></i>
                          <span>Logout</span>
                      </a>
                  </li>     

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> FORM ADD INFORMASI CORE</h3>
            <?php
              if(isset($_SESSION['success'])){
                if(!$_SESSION['success']){
                  echo '<div class="col-md-12 mt">';
   
                    echo '<div class="alert alert-danger">'.$_SESSION['message'].'</div>';
                      
                  echo '</div>';

                }

                unset($_SESSION['success']);
                unset($_SESSION['message']);
              }
            ?>   

            <?php
              $type_link = $_GET['type_link'];
              $closure_name = $_GET['closure_name'];
              switch ($type_link) {
                case 'CSBWI':
                  $name_link ='Cyber - Serpong BWI';
                  break;
                case 'CSEQU':
                  $name_link ='Cyber - Serpong Equtra';
                  break;
                case 'NCBWI':
                  $name_link ='NOC - Cyber BWI';
                  break;
                case 'NCEQU':
                  $name_link ='NOC - Cyber Equtra';
                  break;
              }
            ?>
				  <!-- BASIC FORM ELELEMNTS -->
            <?php 
              $action = 'type_link='.$type_link.'&closure_name='.$closure_name;
            ?>
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Add Data Informasi Core ==> <?php echo $name_link."  (".$closure_name.")";?></h4>
                      <form class="form-horizontal style-form" method="POST" action="add_informasi_core.php?<?php echo $action;?>">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tx</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control" placeholder="Tx" name="form_tx" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Rx</label>
                              <div class="col-sm-3">
                                  <input type="text" class="form-control" placeholder="Rx" name="form_rx" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Destination</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" placeholder="Destination" name="form_destination" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" class="btn btn-primary" value="Submit">
                              </div>
                          </div>
                      </form>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              PGAS CORE
             
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>

    <!-- Include datatable -->
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>


  </body>
</html>
