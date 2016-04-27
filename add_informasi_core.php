<?php
    require_once 'connect.php';

    function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

    $type_link		= $_GET['type_link'];
    $closure_name   = $_GET['closure_name'];

    $tx 	       	= test_input($_POST['form_tx']);
    $rx      		= test_input($_POST['form_rx']);
    $destination	= test_input($_POST['form_destination']);

    //die($latitude.$longitude.$jarak.$keterangan);



    //die($type_link);

    $valid = false;
    if(($tx=='')OR($rx=='')OR($destination=='')){
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
    	header("Location:form_add_informasi_core.php?type_link=$type_link&closure_name=$closure_name");
    }else{
    	//connect to database
	    $conn = mysqli_connect($hostname,  $username, $password, $dbname);

	    if (!$conn) {
	        die("Connection failed: " . mysqli_connect_error());
	    }

	    $tx            = $conn->real_escape_string($tx);
	    $rx 	       = $conn->real_escape_string($rx);
    	$destination   = $conn->real_escape_string($destination);


	    $query_for_check = mysqli_query($conn, "SELECT * from tb_informasi_core WHERE (tx='$tx' AND rx='$rx') AND (destination='$destination' AND type_link='$type_link') ");

        //cek apakah informasi core sudah ada sebelumnya, jika sudah berrti update pada kolom closure_name
        if(mysqli_num_rows($query_for_check)>0){
            
            $query = mysqli_query($conn, "UPDATE tb_informasi_core SET closure_name=CONCAT('$closure_name, ',closure_name) WHERE (tx='$tx' AND rx='$rx') AND (destination='$destination' AND type_link='$type_link') "); 
        }else{
            //jika belum ada sebelumnya maka input baru
            $query = mysqli_query($conn, "INSERT INTO tb_informasi_core (tx, rx, destination, closure_name, type_link) VALUES ('$tx', '$rx', '$destination', '$closure_name', '$type_link')");
        }
	   	if (!$query) {
	        die("QUERY failed: " . mysqli_error($conn));
	    }else{
	    	session_start();
	    	$_SESSION['success'] = true;
            $_SESSION['message'] = '<b>Sukses! </b>Data Informasi Core berhasil ditambahkan';
	    	header("Location:table_informasi_core.php?type_link=$type_link&closure_name=$closure_name");
	    }

    }
?>