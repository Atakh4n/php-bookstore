

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Inline+Text:wght@900&family=Caudex:ital,wght@1,700&family=IM+Fell+Double+Pica+SC&family=Zilla+Slab+Highlight:wght@700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oldenburg&display=swap" rel="stylesheet">

  <title>Kitap Evreni</title>
</head>
<body>
  
</body>
</html>

<?php
  session_start();
  $count = 0;
  // connecto database
  




  $title = "Index";
  
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $row = select5LatestBook($conn);
?> 
     <br>
      <p style="font-family: 'Oldenburg', cursive;font-size: 35px;color: black; text-align:center; ">Son Eklenen 5 Kitap</p>
      
      <div class="row" style="margin-left: 170px;"> 
        <?php foreach($row as $book) { ?>
      	<div class="col-md-2">
      		<a href="book.php?bookisbn=<?php echo $book['barkod']; ?>">
           <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $book['kapak_foto']; ?>">
          </a>
          <br><br>
      	</div>
        <?php } ?> 
      </div>
      <br>
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer.php";
?>
