<?php
    require_once 'connect.php';

    $id_inf_core    = $_GET['id_inf_core'];

    $type_link		= $_GET['type_link'];

    $closure_name   = $_GET['closure_name'];

    
	//connect to database
    $conn = mysqli_connect($hostname,  $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //menghapus closure name pada tabel Informasi Core
    $query = mysqli_query($conn, "UPDATE tb_informasi_core SET closure_name = REPLACE(closure_name, '$closure_name', '') WHERE type_link = '$type_link' AND id_inf_core=$id_inf_core ");

   	if (!$query) {
        die("QUERY failed: " . mysqli_error($conn));
    }else{
    	session_start();
    	$_SESSION['success'] = true;
        $_SESSION['message'] = '<b>Sukses! </b>Data Informasi Core berhasil dihapus';
    	header("Location:table_informasi_core.php?type_link=$type_link&closure_name=$closure_name");
    }

    
?>