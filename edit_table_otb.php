<?php
    require_once 'connect.php';

    function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$id_otb			= $_GET['id_otb'];
    $type_otb		= $_GET['type_otb'];

    $port 			= test_input($_POST['form_port']);
    $arah 			= test_input($_POST['form_arah']);
    $jarak 			= test_input($_POST['form_jarak']);
    $keterangan 	= test_input($_POST['form_keterangan']);

    //die($port.$arah.$jarak.$keterangan);

    $valid = false;
    if(($port=='')OR($arah=='')OR($jarak=='')OR($keterangan=='')){
    	$valid=false;
    	//die("DISINI");
    }else{
    	$valid		=	true;
    	//die("DISANA");
    }

    if(!$valid){
    	session_start();
    	$_SESSION['success'] = false;
    	header("Location:table_otb.php?type_otb=$type_otb");
    }else{
    	//connect to database
	    $conn = mysqli_connect($hostname,  $username, $password, $dbname);

	    if (!$conn) {
	        die("Connection failed: " . mysqli_connect_error());
	    }

	    
	    $port 		= $conn->real_escape_string($port);
    	$arah 		= $conn->real_escape_string($arah);
    	$jarak 		= $conn->real_escape_string($jarak);
    	$keterangan	= $conn->real_escape_string($keterangan);

	    $query = mysqli_query($conn, "UPDATE tb_otb SET port='$port', arah='$arah', jarak='$jarak', keterangan='$keterangan' WHERE id_otb=$id_otb ");

	   	if (!$query) {
	        die("QUERY failed: " . mysqli_error($conn));
	    }else{
	    	session_start();
	    	$_SESSION['success'] = true;
	    	header("Location:table_otb.php?type_otb=$type_otb");
	    }

    }

    
?>