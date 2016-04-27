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
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>PGAS CORE</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
               
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
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
              
              	  <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['name'];?></h5>

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
          	<h3><i class="fa fa-angle-right"></i> TABLE OTB</h3>
				<div class="row">      
                    <?php
                      if(isset($_SESSION['success'])){
                        if($_SESSION['success']){
                          echo '<div class="col-md-12 mt">';
           
                            echo '<div class="alert alert-success"><b>Sukses!</b> Data OTB berhasil diubah.</div>';
                              
                          echo '</div>';

                        }else{
                          echo '<div class="col-md-12 mt">';
           
                            echo '<div class="alert alert-danger"><b>Gagal!</b> Data LINK gagal diubah. Pastikan semua form telah terisi.</div>';
                              
                          echo '</div>';
                        }

                        unset($_SESSION['success']);
                      }
                    ?>            
	                  <div class="col-md-12 mt">
	                  	<div class="content-panel" style="padding:20px;">
	                          <table class="table table-hover" id="table" style="padding:20px;">
                             <?php
                             if((isset($_GET['type_otb']))AND(!empty($_GET['type_otb']))){
                              $get_type_otb = $_GET['type_otb'];
                              $BWI_AND_EQU = false;

                              switch ($get_type_otb) {
                                case 'OTBCYBER':                               
                                  $text = "CYBER EQUATRA";
                                  $text2 = "CYBER BWI";

                                  $type_otb = "CEQU";
                                  $type_otb2 = "CBWI";

                                  $BWI_AND_EQU = true;
                                break;
                                case 'DBWI':
                                  $type_otb = 'DBWI';
                                  $text = "DUREN BWI";
                                break;
                                case 'SBWI':
                                  $type_otb = 'SBWI';
                                  $text = "SERPONG BWI";
                                break;
                                case 'OTBNOC':
                                  $text = "NOC EQUATRA";
                                  $text2 = "NOC BWI";
                                  $type_otb = "NOCEQU";
                                  $type_otb2 = "NOCBWI";
                                  $BWI_AND_EQU = true;
                                break;
                              }
                            }
                            ?>     
	                  	  	  <h4><i class="fa fa-angle-right"></i> <?php echo $text;?></h4>
	                  	  	  <hr>
	                              <thead>
	                              <tr>
	                                  <th>PORT</th>
	                                  <th>Arah</th>
	                                  <th>Jarak</th>
	                                  <th>Keterangan</th>
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
                                  $query = mysqli_query($conn, "SELECT id_otb, port, arah,jarak,keterangan FROM tb_otb WHERE type_otb='$type_otb'");
                                  if (!$query) {
                                      die("QUERY failed: " . mysqli_error($conn));
                                  }

                                  while($row = mysqli_fetch_array($query)){
                                    echo '<tr>';
                                      echo '<td>'.$row['port'].'</td>';
                                      echo '<td>'.$row['arah'].'</td>';
                                      echo '<td>'.$row['jarak'].'</td>';
                                      echo '<td>'.$row['keterangan'].'</td>';
                                      echo '<td>';
                                        echo '<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-type_otb="'.$get_type_otb.'" data-id_otb="'.$row['id_otb'].'" data-port="'.$row['port'].'" data-arah="'.$row['arah'].'" data-jarak="'.$row['jarak'].'" data-keterangan="'.$row['keterangan'].'"><i class="fa fa-pencil"></i></button>';
                                      echo '</td>';
                                    echo '</tr>';
                                  }
                                ?>
	                              </tbody>
	                          </table>
	                  	  </div><! --/content-panel -->
	                  </div><!-- /col-md-12 -->

                    <!--Apabila yang dipilih adalah CYBER OTB atau NOC OTB-->
                    <?php
                        if($BWI_AND_EQU){
                    ?>
                    <div class="col-md-12 mt">
                      <div class="content-panel" style="padding:20px;">
                            <table class="table table-hover" id="table2" style="padding:20px;">
                            <h4><i class="fa fa-angle-right"></i> <?php echo $text2;?></h4>
                            <hr>
                                <thead>
                                <tr>
                                    <th>PORT</th>
                                    <th>Arah</th>
                                    <th>Jarak</th>
                                    <th>Keterangan</th>
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
                                  $query = mysqli_query($conn, "SELECT id_otb, port, arah,jarak,keterangan FROM tb_otb WHERE type_otb='$type_otb2'");
                                  if (!$query) {
                                      die("QUERY failed: " . mysqli_error($conn));
                                  }

                                  while($row = mysqli_fetch_array($query)){
                                    echo '<tr>';
                                      echo '<td>'.$row['port'].'</td>';
                                      echo '<td>'.$row['arah'].'</td>';
                                      echo '<td>'.$row['jarak'].'</td>';
                                      echo '<td>'.$row['keterangan'].'</td>';
                                      echo '<td>';
                                        echo '<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-type_otb="'.$get_type_otb.'" data-id_otb="'.$row['id_otb'].'" data-port="'.$row['port'].'" data-arah="'.$row['arah'].'" data-jarak="'.$row['jarak'].'" data-keterangan="'.$row['keterangan'].'"><i class="fa fa-pencil"></i></button>';
                                      echo '</td>';
                                    echo '</tr>';
                                  }
                                ?>
                                </tbody>
                            </table>
                        </div><! --/content-panel -->
                    </div><!-- /col-md-12 -->
                    <?php
                        } // END if(($type_otb=="OTBCYBER")||($type_otb=="OTBNOC"))
                    ?>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Edit Informasi Core</h4>
                          </div>
                          <div class="modal-body">
                            <form class="form-horizontal style-form" method="POST" id="form" action=" ">
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Port</label>
                                  <div class="col-sm-10">
                                      <input type="text"  id="form_port" name="form_port" class="form-control" placeholder="placeholder">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Arah</label>
                                  <div class="col-sm-10">
                                      <input type="text"  id="form_arah" name="form_arah" class="form-control" placeholder="placeholder">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Jarak</label>
                                  <div class="col-sm-10">
                                      <input type="text"  id="form_jarak" name="form_jarak" class="form-control" placeholder="placeholder">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Keterangan</label>
                                  <div class="col-sm-10">
                                      <input type="text"  id="form_keterangan" name="form_keterangan" class="form-control" placeholder="placeholder">
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
      $(document).ready( function () {
          $('#table2').DataTable();
      });

      //triggered when modal is about to be shown
        $('#myModal').on('show.bs.modal', function(e) {

            //get data-port attribute of the clicked element
            var port = $(e.relatedTarget).data('port');

            //get data-arah attribute of the clicked element
            var arah = $(e.relatedTarget).data('arah');

            //get data-jarak attribute of the clicked element
            var jarak = $(e.relatedTarget).data('jarak');

            //get data-keterangan attribute of the clicked element
            var keterangan = $(e.relatedTarget).data('keterangan');

            var id_otb = $(e.relatedTarget).data('id_otb');

            var type_otb = $(e.relatedTarget).data('type_otb');

            //put the value to form input
            $(".modal-body #form_port").val( port );
            $(".modal-body #form_arah").val( arah );
            $(".modal-body #form_jarak").val( jarak );
            $(".modal-body #form_keterangan").val( keterangan );


            //untuk merubah action pada form MODAL
            var form = document.getElementById('form');

            form.action="edit_table_otb.php?id_otb="+id_otb+"&type_otb="+type_otb;
          
        });


  </script>

  </body>
</html>
