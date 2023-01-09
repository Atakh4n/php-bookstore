<?php
	session_start();
	
	if((!isset($_SESSION['admin'] ))){
		header("Location:index.php");
	}
	$title = "Kategori Düzenle";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_GET['catid'])){
		$catid = $_GET['catid'];
	} else {
		echo "Empty query!";
		exit;
	}

	if(!isset($catid)){
		echo "Barkod bulunamadı. Tekrar deneyin!";
		exit;
	}

	// get book data
	$query = "SELECT * FROM kategori WHERE kategori_id = '$catid'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Veri Alınamıyor " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
?>
	<form method="post" action="edit_category.php" enctype="multipart/form-data">
		<table class="table">
        <th>Kategori Adı</th>
			<tr>
				<td style="display:none"><input type="text" name="id" value="<?php echo $row['kategori_id'];?>"></td>
				
				<td><input type="text" name="name" value="<?php echo $row['kategori_adi'];?>" required></td>
			</tr>

		</table>
		<input type="submit" name="save_change" value="Kaydet" class="btn btn-primary">
		<a href="admin_categories.php" class="btn btn-default">İptal</a>
	</form>
	<br/>
<?php
	if(isset($conn)) {mysqli_close($conn);}
	require "./template/footer.php"
?>