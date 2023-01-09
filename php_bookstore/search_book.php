<?php

  $text = trim($_POST['text']);
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $query = "SELECT * FROM kitaplar  where barkod like'%$text%' or yazar like '%$text%' or kitap_adi like '%$text%' ";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result)==0){
    echo '
    <div class="alert alert-warning" role="alert">
    Kitap Bulunamadı... 
    </div>' . ' <div class="search_top" >
       
 </div>';
  }else{
    $number=mysqli_num_rows($result);
   echo  '<div class="alert alert-success" role="success"> ';
   echo $number;
   echo ' Kitap</div>' . ' <div class="search_top" >       
</div>';

  }

  require_once "./template/header.php";
?>
     
  <p class="lead text-center text-muted">Ara</p>
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      <div class="row">
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
          <div class="col-md-3">
            <a href="book.php?bookisbn=<?php echo $query_row['barkod']; ?>">
              <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $query_row['kapak_foto']; ?>">
            </a>
            <table>
                <tr>
                  <td><strong>  <?php echo $query_row['kitap_adi']; ?></strong></td>
                </tr>
                <tr>
                <td> <?php echo $query_row['yazar']; ?></td>
                </tr>
                <tr>
                <td><strong>$<?php echo $query_row['fiyat'];?></strong>  </td>
                </tr>
              </table>
          </div>
        <?php
          } ?> 
      </div>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./template/footer.php";
?>