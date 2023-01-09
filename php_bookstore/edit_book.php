<?php	
	// if save change happen
	if(!isset($_POST['save_change'])){
		echo "Something wrong!";
		exit;
	}
    
	$isbn = trim($_POST['barkod']);
	$kitap_adi = trim($_POST['kitap_adi']);
	$yazar = trim($_POST['yazar']);
	$kitap_turu = trim($_POST['kitap_turu']);
	$fiyat = floatval(trim($_POST['fiyat']));
	$sayfa = floatval(trim($_POST['sayfa']));
	$yili = floatval(trim($_POST['yili']));
	$dili = trim($_POST['dili']);
	

	if(isset($_FILES['kapak_foto']) && $_FILES['kapak_foto']['name'] != ""){
		$kapak_foto = $_FILES['kapak_foto']['name'];
		$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
		$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
		$uploadDirectory .= $kapak_foto;
		move_uploaded_file($_FILES['kapak_foto']['tmp_name'], $uploadDirectory);
	}

	require_once("./functions/database_functions.php");
	$conn = db_connect();




	$query = "UPDATE kitaplar SET  
	
	
	kitap_adi = '$kitap_adi', 
	yazar = '$yazar', 
	sayfa='$sayfa',
	yili='$yili',
	dili='$dili',
	kitap_turu = '$kitap_turu', 
	fiyat = '$fiyat'";




	if(isset($kapak_foto)){
		$query .= ", kapak_foto='$kapak_foto' WHERE barkod = '$isbn'";
	} else {
		$query .= " WHERE barkod = '$isbn'";
	}
	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: admin_edit.php?bookisbn=$isbn");
	}
?>