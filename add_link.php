<?php
    require_once 'connect.php';

    function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    $type_link		= $_GET['type_link'];

    $closure_name   = test_input($_POST['form_closure_name']);

    $latitude 		= test_input($_POST['form_latitude']);
    $longitude 		= test_input($_POST['form_longitude']);
    $jarak 			= test_input($_POST['form_jarak']);

    //die($latitude.$longitude.$jarak.$keterangan);



    //die($type_link);

    $valid = false;
    if(($latitude=='')OR($longitude=='')OR($jarak=='')OR($closure_name=='')){
    	$valid=false;
    	//die("DISINI");
    }else{
    	$valid		=	true;
    	//die("DISANA");
    }

    //jika gagal
    if(!$valid){
    	session_start();
    	$_SESSION['success'] = false;
        $_SESSION['message'] = '<b>Gagal!</b>Pengisian form gagal, pastikan semua form telah terisi.';
    	header("Location:form_add_link.php?type_link=$type_link");
    }else{
    	//connect to database
	    $conn = mysqli_connect($hostname,  $username, $password, $dbname);

	    if (!$conn) {
	        die("Connection failed: " . mysqli_connect_error());
	    }

	    $closure_name = $conn->real_escape_string($closure_name);
	    $latitude 	= $conn->real_escape_string($latitude);
    	$longitude 	= $conn->real_escape_string($longitude);
    	$jarak 		= $conn->real_escape_string($jarak);

	    $query = mysqli_query($conn, "INSERT INTO tb_link (closure_name, latitude, longitude, jarak, type_link) VALUES ('$closure_name', '$latitude', '$longitude', '$jarak', '$type_link')");

	   	if (!$query) {
	        die("QUERY failed: " . mysqli_error($conn));
	    }else{
	    	session_start();
	    	$_SESSION['success'] = true;
            $_SESSION['message'] = '<b>Sukses! </b>Data Link berhasil ditambahkan';
	    	header("Location:table_link.php?type_link=$type_link");
	    }

    }
?>