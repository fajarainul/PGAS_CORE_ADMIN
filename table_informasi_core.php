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
          	<h3><i class="fa fa-angle-right"></i> TABLE INFORMASI CORE</h3>
				<div class="row">           
                    <?php
                      if(isset($_SESSION['success'])){
                        if($_SESSION['success']){
                          echo '<div class="col-md-12 mt">';
           
                            echo '<div class="alert alert-success">'.$_SESSION['message'].'</div>';
                              
                          echo '</div>';

                        }else{
                          echo '<div class="col-md-12 mt">';
           
                            echo '<div class="alert alert-danger">'.$_SESSION['message'].'</div>';
                              
                          echo '</div>';
                        }

                        unset($_SESSION['success']);
                      }
                    ?>            
	                  <div class="col-md-12 mt">
	                  	<div class="content-panel" style="padding:20px;">
	                          <table class="table table-hover" id="table" style="padding:20px;">
                              <?php
                                  if(((isset($_GET['type_link']))AND(!empty($_GET['type_link'])))   AND   ((isset($_GET['closure_name']))AND(!empty($_GET['closure_name'])))){
                                    $type_link = $_GET['type_link'];
                                    $closure_name = $_GET['closure_name'];

                                    switch ($type_link) {
                                      case 'CSBWI':
                                        $text = "CYBER - SERPONG BWI";
                                        break;
                                      case 'NCBWI':
                                        $text = "NOC - CYBER BWI";
                                        break;
                                      case 'CSEQU':
                                        $text = "CYBER - SERPONG EQUATRA";
                                        break;
                                      case 'NCEQU':
                                        $text = "NOC - CYBER EQUTRA";
                                        break;
                                    }
                                  }
                              ?>
                              <?php
                                $link = 'form_add_informasi_core.php?type_link='.$type_link.'&closure_name='.$closure_name;
                              ?>
                            <h4><i class="fa fa-angle-right"></i> <?php echo $text."  => ".$closure_name;?><a href="<?php echo $link?>" class="btn btn-primary pull-right">Add Data Informasi Core</a></h4>
	                  	  	  <hr>
	                              <thead>
	                              <tr>
	                                  <th>Core Tx</th>
                                    <th>Core Rx</th>
	                                  <th>Destination</th>
                                    <th></th>
	                              </tr>
                                </thead>
                                <tbody>
                                <?php
                                  require_once 'connect.php';

                                  //connect to database
                                  $conn = mysqli_connect($hostname,  $username, $password, $dbname);

                                  if (!$conn) {
                                      die("Connection failed: " . mysqli_connect_error());
                                  }

                                  //query
                                  $query = mysqli_query($conn, "SELECT id_inf_core,tx, rx,destination FROM tb_informasi_core WHERE type_link ='$type_link' AND closure_name LIKE '%$closure_name%' ");
                                  //var_dump($query);
                                  if (!$query) {
                                      die("QUERY failed: " . mysqli_error($conn));
                                  }

                                  while($row = mysqli_fetch_array($query)){
                                    echo '<tr>';
                                      echo '<td>'.$row['tx'].'</td>';
                                      echo '<td>'.$row['rx'].'</td>';
                                      echo '<td>'.$row['destination'].'</td>';
                                      echo '<td>';                                      
                                        echo '<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id_inf_core="'.$row['id_inf_core'].'" data-type_link="'.$type_link.'" data-closure_name="'.$closure_name.'" data-tx="'.$row['tx'].'" data-rx="'.$row['rx'].'" data-destination="'.$row['destination'].'"><i class="fa fa-pencil"></i></button>';
                                        echo '<a href="delete_informasi_core.php?id_inf_core='.$row['id_inf_core'].'&type_link='.$type_link.'&closure_name='.$closure_name.'" onClick="return confirmDelete()" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>';
                                      echo '</td>';
                                    echo '</tr>';
                                  }
                                ?>
                                
	                              </tbody>
	                          </table>
	                  	  </div><! --/content-panel -->
	                  </div><!-- /col-md-12 -->


                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Edit Informasi Core</h4>
                          </div>
                          <div class="modal-body">
                            <form class="form-horizontal style-form" method="POST"action="" id="form">
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Core Tx</label>
                                  <div class="col-sm-10">
                                      <input type="text"  id="form_tx" name="form_tx" class="form-control" placeholder="placeholder">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Core Rx</label>
                                  <div class="col-sm-10">
                                      <input type="text"  id="form_rx" name="form_rx" class="form-control" placeholder="placeholder">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Destination</label>
                                  <div class="col-sm-10">
                                      <input type="text"  id="form_destination" name="form_destination" class="form-control" placeholder="placeholder">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-12">
                                      <input type="submit" class="btn btn-primary pull-right"value="Submit"></input>
                                      <button type="button" class="btn btn-danger pull-right" data-dismiss="modal" style="margin-right:20px">Cancel</button>               
                                  </div>        
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            
                          </div>
                        </div>
                      </div>
                    </div><!-- END Modal -->


				</div><!-- row -->
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

    <!--script for this page-->
    
  <script>
      //custom select box

        $(document).ready( function () {
          $('#table').DataTable();
        });

        //triggered when modal is about to be shown
        $('#myModal').on('show.bs.modal', function(e) {

            //get data-tx attribute of the clicked element
            var tx = $(e.relatedTarget).data('tx');

            //get data-rx attribute of the clicked element
            var rx = $(e.relatedTarget).data('rx');

            //get data-destination attribute of the clicked element
            var destination = $(e.relatedTarget).data('destination');

            var id_inf_core = $(e.relatedTarget).data('id_inf_core');

            var type_link = $(e.relatedTarget).data('type_link');

            var closure_name = $(e.relatedTarget).data('closure_name');

            //put the value to form input
            $(".modal-body #form_tx").val( tx );
            $(".modal-body #form_rx").val( rx );
            $(".modal-body #form_destination").val( destination );


            var form = document.getElementById('form');

            form.action ="edit_table_informasi_core.php?id_inf_core="+id_inf_core+"&type_link="+type_link+"&closure_name="+closure_name;
          
        });

        function confirmDelete(){
          return confirm('Anda yakin akan menghapus data ini?');
        }
  </script>

  </body>
</html>
