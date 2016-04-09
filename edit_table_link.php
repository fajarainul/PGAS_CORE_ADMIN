<?php
    require_once 'connect.php';

    function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$id_link		= $_GET['id_link'];
    $type_link		= $_GET['type_link'];

    $latitude 		= test_input($_POST['form_latitude']);
    $longitude 		= test_input($_POST['form_longitude']);
    $jarak 			= test_input($_POST['form_jarak']);

    //die($latitude.$longitude.$jarak.$keterangan);



    //die($type_link);

    $valid = false;
    if(($latitude=='')OR($longitude=='')OR($jarak=='')){
    	$valid=false;
    	//die("DISINI");
    }else{
    	$valid		=	true;
    	//die("DISANA");
    }

    if(!$valid){
    	session_start();
    	$_SESSION['success'] = false;
    	header("Location:table_link.php?type_link=$type_link");
    }else{
    	//connect to database
	    $conn = mysqli_connect($hostname,  $username, $password, $dbname);

	    if (!$conn) {
	        die("Connection failed: " . mysqli_connect_error());
	    }

	    
	    $latitude 	= $conn->real_escape_string($latitude);
    	$longitude 	= $conn->real_escape_string($longitude);
    	$jarak 		= $conn->real_escape_string($jarak);

	    $query = mysqli_query($conn, "UPDATE tb_link SET latitude='$latitude', longitude='$longitude', jarak='$jarak' WHERE id_link=$id_link");

	   	if (!$query) {
	        die("QUERY failed: " . mysqli_error($conn));
	    }else{
	    	session_start();
	    	$_SESSION['success'] = true;
	    	header("Location:table_link.php?type_link=$type_link");
	    }

    }

    
?>