<?php
    require_once 'connect.php';

    function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$id_inf_core	= $_GET['id_inf_core'];
    $type_link		= $_GET['type_link'];
    $closure_name   = $_GET['closure_name'];

    $tx 		    = test_input($_POST['form_tx']);
    $rx 		    = test_input($_POST['form_rx']);
    $destination 	= test_input($_POST['form_destination']);

    //die($tx.$rx.$destination.$keterangan);



    //die($type_link);

    $valid = false;
    if(($tx=='')OR($rx=='')OR($destination=='')){
    	$valid=false;
    	//die("DISINI");
    }else{
    	$valid		=	true;
    	//die("DISANA");
    }

    if(!$valid){
    	session_start();
    	$_SESSION['success'] = false;
    	header("Location:table_informasi_core.php?type_link=$type_link&closure_name=$closure_name");
    }else{
    	//connect to database
	    $conn = mysqli_connect($hostname,  $username, $password, $dbname);

	    if (!$conn) {
	        die("Connection failed: " . mysqli_connect_error());
	    }

	    
	    $tx 	= $conn->real_escape_string($tx);
    	$rx 	= $conn->real_escape_string($rx);
    	$destination 		= $conn->real_escape_string($destination);

	    $query = mysqli_query($conn, "UPDATE tb_informasi_core SET tx='$tx', rx='$rx', destination='$destination' WHERE id_inf_core=$id_inf_core");

	   	if (!$query) {
	        die("QUERY failed: " . mysqli_error($conn));
	    }else{
	    	session_start();
	    	$_SESSION['success'] = true;
	    	header("Location:table_informasi_core.php?type_link=$type_link&closure_name=$closure_name");
	    }

    }

    
?>