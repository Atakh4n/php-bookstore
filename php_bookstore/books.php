<?php
  session_start();
  $count = 0;
  // connecto database
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  if(isset($_POST['title'])){
    if(isset($_POST['asc'])){
      $query = "SELECT * FROM kitaplar order by kitap_adi asc";

    }
    else if(isset($_POST['desc'])){
      $query = "SELECT * FROM kitaplar order by kitap_adi desc";
    }else{
      $query = "SELECT * FROM kitaplar";
    }
  }else if(isset($_POST['fiyat'])){
    if(isset($_POST['asc'])){
      $query = "SELECT * FROM kitaplar order by fiyat asc";

    }
    else if(isset($_POST['desc'])){
      $query = "SELECT * FROM kitaplar order by fiyat desc";
    }else{
      $query = "SELECT * FROM kitaplar";
    }
  }else if(isset($_POST['yazar'])){
    if(isset($_POST['asc'])){
      $query = "SELECT * FROM kitaplar order by yazar asc";

    }
    else if(isset($_POST['desc'])){
      $query = "SELECT * FROM kitaplar order by yazar desc";
    }else{
      $query = "SELECT * FROM kitaplar";
    }
  }else{
    $query = "SELECT * FROM kitaplar";
  }

  $result = mysqli_query($conn, $query);
  $title = "Tüm Kitaplar";
    require_once "./template/header.php";
?>
<html>
  <head><link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oldenburg&display=swap" rel="stylesheet"></head></html>
  <p style="font-family: 'Oldenburg', cursive;font-size: 35px;color: black; text-align:center; ">Tüm Kitaplar</p>
<h5 class="lead text-muted">Sırala:</h5>


  
<form method="post" action="books.php">
  <div class="radio">
    <label><input type="radio" name="asc" >Azalan</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="desc">Artan</label>
  </div>

  <button type="submit" class="btn btn-secondary" name="title">Kitap Adı</button>
  <button type="submit" class="btn btn-secondary" name="fiyat">Fiyat</button>
  <button type="submit" class="btn btn-secondary" name="yazar">Yazar</button>
  <button type="submit" class="btn btn-secondary" name="clear">Temizle</button>
  
</form>

<br><br>

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
                <td><strong>₺<?php echo $query_row['fiyat'];?></strong>  </td>
                </tr>
              </table>
            </div>
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          } ?> 
      </div>
      <br><br>
      
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  require_once "./template/footer.php";
?>

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
