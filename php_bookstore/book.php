<?php
  session_start();
  $isbn = $_GET['bookisbn'];
  // connec to database
  require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT * FROM kitaplar WHERE barkod = '$isbn'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  
  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Kitap Yok";
    exit;
  }
  
  $title = $row['kitap_adi'];
  require "./template/header.php";
?>
      <!-- Example row of columns -->
      <p class="lead" style="margin: 25px; background-color: white; border: 4px double;border-radius: 10px;" ><a href="books.php">Kitaplar</a> > <?php echo $row['kitap_adi']; ?></p>
      <div class="row" style="background-color:white; border: 6px double; border-radius:25px;">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['kapak_foto']; ?>">
        </div> 
        <div class="col-md-6" style="background-color:#e5e5e5; border: 3px double; border-radius:20px;">
          <h4>Kitap Türü</h4>
          <p><?php echo $row['kitap_turu']; ?></p>
          <h4>Kitap Detayları</h4>
          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "kitap_turu" || $key == "kapak_foto" || $key == "kitap_adi"){
                continue;
              }
              switch($key){
                case "kitap_id":
                  $key = "Kitap ID";
                  break;
                case "barkod":
                  $key = "ISBN";
                  break;
                case "kitap_adi":
                  $key = "Title";
                  break;
                case "yazar":
                  $key = "Yazar";
                  break;
                  case "sayfa":
                    $key = "Sayfa";
                    break;
                    case "yili":
                      $key = "Yılı";
                      break;
                      case "dili":
                        $key = "Dili";
                        break;
                case "fiyat":
                  $key = "Fiyat";
                  break;
                  
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>
          
          <br>
       	</div>
       
      </div>
<?php
  require "./template/footer.php";
?>