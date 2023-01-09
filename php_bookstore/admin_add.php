<?php
	session_start();

	header('Content-Type: text/html; charset=utf-8');
	if((!isset($_SESSION['admin']))){
		header("Location:index.php");
	}
	$title = "Yeni Kitap Ekle";
	require "./template/header.php";
	require "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_POST['add'])){

		$kitap_id = trim($_POST['kitap_id']);
		$kitap_id = mysqli_real_escape_string($conn, $kitap_id);

		$isbn = trim($_POST['barkod']);
		$isbn = mysqli_real_escape_string($conn, $isbn);
		
		$kitap_adi = trim($_POST['kitap_adi']);
		$kitap_adi = mysqli_real_escape_string($conn, $kitap_adi);

		$yazar = trim($_POST['yazar']);
		$yazar = mysqli_real_escape_string($conn, $yazar);
		
		$sayfa = trim($_POST['sayfa']);
		$sayfa = mysqli_real_escape_string($conn, $sayfa);

		$yili = trim($_POST['yili']);
		$yili = mysqli_real_escape_string($conn, $yili);

		$dili = trim($_POST['dili']);
		$dili = mysqli_real_escape_string($conn, $dili);
		
		$kitap_turu = trim($_POST['kitap_turu']);
		$kitap_turu = mysqli_real_escape_string($conn, $kitap_turu);
		
		$fiyat = floatval(trim($_POST['fiyat']));
		$fiyat = mysqli_real_escape_string($conn, $fiyat);

		
		
		

		// add kapak_foto
		if(isset($_FILES['kapak_foto']) && $_FILES['kapak_foto']['name'] != ""){
			$kapak_foto = $_FILES['kapak_foto']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
			$uploadDirectory .= $kapak_foto;
			move_uploaded_file($_FILES['kapak_foto']['tmp_name'], $uploadDirectory);
		}

		


		$query = "INSERT INTO kitaplar VALUES ('" . $kitapid . "','" . $isbn . "', '" . $kitap_adi . "', '" . $yazar . "', '" . $sayfa . "','" . $yili . "','" . $dili . "','" . $kapak_foto . "', '" . $kitap_turu . "', '" . $fiyat . "')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Can't add new data " . mysqli_error($conn);
			exit;
		} else {
			header("Location: admin_book.php");
		}
	}
	
?>
	<form method="post" action="admin_add.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ISBN</th>
				<td><input type="text" name="barkod"></td>
			</tr>
			<tr>
				<th>Kitap Adı</th>
				<td><input type="text" name="kitap_adi" required></td>
			</tr>
			<tr>
				<th>Yazar</th>
				<td><input type="text" name="yazar" required></td>
			</tr>
			<tr>
				<th>Sayfa</th>
				<td><input type="text" name="sayfa" required></td>
			</tr>
			<tr>
				<th>Yılı</th>
				<td><input type="text" name="yili" required></td>
			</tr>
			<tr>
				<th>Dili</th>
				<td>
				
				<select name="dili" >
				<option value="Türkçe">Türkçe</option>
				<option value="İngilizce">İngilizce</option>
				<option value="Almanca">Almanca</option>
				</select>
			</tr>
			<tr>
				<th>Resim Yükle</th>
				<td><input type="file" name="kapak_foto"></td>
			</tr>
			<tr>
				<th>Kitap Türü</th>
				<td><?php
		$hostname="localhost";
		$username="root";
		$password="";
		$dbname="odev_db";
				$conn=mysqli_connect($hostname,$username,$password,$dbname) or die ("Connection Error:".mysqli_error($conn));
				$sqlquery=mysqli_query($conn,"select * from kategori");
				?>
				
				<select name="kitap_turu" >
				<?php
				
                 while($row=mysqli_fetch_array($sqlquery))
				 {
                ?>
				<option	value="<?=$row["kategori_adi"];?>"><?=$row["kategori_adi"];?></option>
				<?php
				 }
				?>
				</select>
			     
				
			</td>
			</tr>
			<tr>
				<th>Fiyat</th>
				<td><input type="text" name="fiyat" required></td>
			</tr>
			
			
			
		</table>
		
		<input type="submit" name="add" value="Yeni Kitap Ekle" class="btn btn-primary">
		<input type="reset" value="İptal" class="btn btn-default">
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>