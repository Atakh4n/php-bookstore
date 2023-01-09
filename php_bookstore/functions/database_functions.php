<?php
  
	if (!function_exists("db_connect")){

		function db_connect(){
			$conn = mysqli_connect("localhost", "root", "", "odev_db");
			$conn->set_charset("utf8");
			if(!$conn){
				echo "Veritabanına Bağlanılamadı! " . mysqli_connect_error($conn);
				exit;
			}
			return $conn;
		}
	}
	if (!function_exists("select5LatestBook")){
	function select5LatestBook($conn){
		$row = array();
		$query = "SELECT barkod, kapak_foto FROM kitaplar ORDER BY kitap_id DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
		    echo "Veri Alınamadı! " . mysqli_error($conn);
		    exit;
		}
		for($i = 0; $i < 5; $i++){
			array_push($row, mysqli_fetch_assoc($result));
		}
		return $row;
	}
}
if (!function_exists("getBookByIsbn")){
	function getBookByIsbn($conn, $kitap_id){
		$query = "SELECT kitap_adi, yazar, fiyat, FROM kitaplar WHERE kitap_id = '$kitap_id'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Veri Alınamadı! " . mysqli_error($conn);
			exit;
		}
		return $result;
	}
}
if (!function_exists("getCartId")){
	function getCartId($conn, $customerid){
		$query = "SELECT id FROM cart WHERE customerid = '$customerid'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "retrieve data failed!" . mysqli_error($conn);
			exit;
		}
		$row = mysqli_fetch_assoc($result);
		return $row['id'];
	}
}

if (!function_exists("insertIntoCart")){
	function insertIntoCart($conn, $customerid,$date){
		$query = "INSERT INTO cart(customerid,date) VALUES('$customerid','$date') ";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Insert Cart failed " . mysqli_error($conn);
			exit;
		}
	}
}
if (!function_exists("getbookprice")){
	function getbookprice($isbn){
		$conn = db_connect();
		$query = "SELECT fiyat FROM kitaplar WHERE barkod = '$isbn'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "get book fiyat failed! " . mysqli_error($conn);
			exit;
		}
		$row = mysqli_fetch_assoc($result);
		return $row['fiyat'];
	}
}
if (!function_exists("getCustomerId")){
	function getCustomerId($name, $address, $city, $zip_code, $country){
		$conn = db_connect();
		$query = "SELECT customerid from uyeler WHERE 
		name = '$name' AND 
		address= '$address' AND 
		city = '$city' AND 
		zip_code = '$zip_code' AND 
		country = '$country'";
		$result = mysqli_query($conn, $query);
		// if there is customer in db, take it out
		if($result){
			$row = mysqli_fetch_assoc($result);
			return $row['customerid'];
		} else {
			return null;
		}
	}
}
if (!function_exists("getCustomerIdbyEmail")){
	function getCustomerIdbyEmail($email){
		$conn = db_connect();
		$query = "SELECT * from uyeler WHERE 
		email = '$email'";
		$result = mysqli_query($conn, $query);
		// if there is customer in db, take it out
		if($result){
			$row = mysqli_fetch_assoc($result);
			return $row;
		} else {
			return null;
		}
	}
}


if (!function_exists("getCatName")){
	function getCatName($conn, $catid){
		$query = "SELECT kategori_adi FROM kategori WHERE kategori_id = '$catid'";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Veri Alınamadı! " . mysqli_error($conn);
			exit;
		}
		if(mysqli_num_rows($result) == 0){
			echo "Not Set";
		}

		$row = mysqli_fetch_assoc($result);
		return $row['kategori_adi'];
	}
}
if (!function_exists("getAll")){
	function getAll($conn){
		$query = "SELECT * from kitaplar ORDER BY barkod DESC";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Veri Alınamadı! " . mysqli_error($conn);
			exit;
		}
		return $result;
	}
}

if (!function_exists("getAllCategories")){
	function getAllCategories($conn){
		$query = "SELECT * from kategori ORDER BY kategori_adi ASC";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Veri Alınamadı! " . mysqli_error($conn);
			exit;
		}
		return $result;
	}
}
?>