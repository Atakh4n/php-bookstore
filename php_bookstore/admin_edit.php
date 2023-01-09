<?php
	session_start();
	if((!isset($_SESSION['admin']))){
		header("Location:giris.php");
	}
	$title = "Edit book";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_GET['bookisbn'])){
		$isbn = $_GET['bookisbn'];
	} else {
		echo "Empty query!";
		exit;
	}

	if(!isset($isbn)){
		echo "Empty isbn! check again!";
		exit;
	}

	// get book data
	$query = "SELECT * FROM kitaplar WHERE barkod = '$isbn'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Veri alınamadı" . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
?>
	<form method="post" action="edit_book.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>Barkod</th>
				<td><input type="text" name="barkod" value="<?php echo $row['barkod'];?>" readOnly="true"></td>
			</tr>
			<tr>
				<th>Başlık</th>
				<td><input type="text" name="kitap_adi" value="<?php echo $row['kitap_adi'];?>" required></td>
			</tr>
			<tr>
				<th>Yazar</th>
				<td><input type="text" name="yazar" value="<?php echo $row['yazar'];?>" required></td>
			</tr>
			<tr>
				<th>Sayfa</th>
				<td><input type="text" name="sayfa" value="<?php echo $row['sayfa'];?>" required></td>
			</tr>
			<tr>
				<th>Yılı</th>
				<td><input type="text" name="yili" value="<?php echo $row['yili'];?>" required></td>
			</tr>
			<tr>
				<th>Dili</th>
				<td><input type="text" name="dili" value="<?php echo $row['dili'];?>" required></td>
			</tr>
			<tr>
				<th>Resim</th>
				<td><input type="file" name="kapak_foto"></td>
			</tr>
			<tr>
				<th>Fiyat</th>
				<td><input type="text" name="fiyat" value="<?php echo $row['fiyat'];?>" required></td>
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
			</tr>
			
			
			
		</table>
		<input type="submit" name="save_change" value="Change" class="btn btn-primary">
		<a href="admin_book.php" class="btn btn-default">İptal Et</a>
	</form>
	<br/>
	<a href="admin_book.php" class="btn btn-success">Onayla</a>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require "./template/footer.php"
?>