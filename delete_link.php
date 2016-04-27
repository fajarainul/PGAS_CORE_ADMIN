<?php
    require_once 'connect.php';

    $type_link		= $_GET['type_link'];

    $closure_name   = $_GET['closure_name'];

    $id_link 		= $_GET['id_link'];
    
	//connect to database
    $conn = mysqli_connect($hostname,  $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //menghapus link pada tabel LINK
    $query_link = mysqli_query($conn, "DELETE FROM tb_link WHERE id_link=$id_link ");

    //menghapus closure name pada tabel Informasi Core
    $query_inf_core = mysqli_query($conn, "UPDATE tb_informasi_core SET closure_name = REPLACE(closure_name, '$closure_name', '') WHERE type_link = '$type_link' ");

   	if ((!$query_link)AND(!$query_inf_core)) {
        die("QUERY failed: " . mysqli_error($conn));
    }else{
    	session_start();
    	$_SESSION['success'] = true;
        $_SESSION['message'] = '<b>Sukses! </b>Data Link berhasil dihapus';
    	header("Location:table_link.php?type_link=$type_link");
    }

    
?>