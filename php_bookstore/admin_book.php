<?php
	session_start();
	if((!isset($_SESSION['admin']))){
		header("Location:index.php");
	}
	$title = "Kitap Listesi";
	require_once "./template/header.php";
	require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
?>	
	<div>
	<a href="admin_signout.php" class="btn btn-danger"><span class="glyphicon glyphicon-off"></span>&nbsp;Çıkış Yap</a>

	<a href="admin_categories.php" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Kategoriler</a>
	
	
   <a href="admin_add.php" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span>&nbsp;Kitap Ekle</a>
	
	
	</div>
	
	<table class="table" style="margin-top: 20px">
		<tr>
		    <th>Kitap ID</th>
			<th>Barkod</th>
			<th>Başlık</th>
			<th>Yazar</th>
			<th>Sayfa</th>
			<th>Yılı</th>
			<th>Dili</th>
			<th>Resim</th>
			<th>Kitap Türü</th>
			<th>Fiyat</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
		<td><?php echo $row['kitap_id']; ?></td>
			<td><?php echo $row['barkod']; ?></td>
			<td><?php echo $row['kitap_adi']; ?></td>
			<td><?php echo $row['yazar']; ?></td>
			<td><?php echo $row['sayfa']; ?></td>
			<td><?php echo $row['yili']; ?></td>
			<td><?php echo $row['dili']; ?></td>
			<td><?php echo $row['kapak_foto']; ?></td>
			<td><?php echo $row['kitap_turu']; ?></td>
			<td><?php echo $row['fiyat']; ?></td>
			
	        
			<?php
				if( isset($_SESSION['admin']) ){
					echo '<td><a href="admin_edit.php?bookisbn=';
					echo $row['barkod'];
					echo'"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Düzenle</a></td>';
					echo '<td><a href="admin_delete.php?bookisbn=';
					echo $row['barkod'];
					echo '"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;Sil</a></td>';
				}
			?>

		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	require_once "./template/footer.php";
?>