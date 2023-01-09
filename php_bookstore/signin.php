<?php
	$title = "Giriş Yap";
	require_once "./template/header.php";
?>

	<form class="form-horizontal" method="post" action="user_verify.php">
  <div class="form-group">
    <label for="exampleInputEmail1">E-Posta</label>
    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="E-posta Adresi || Admin kullanıcı adı: admin" name="username">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Parola</label>
    <input type="password" class="form-control" placeholder="Parola || Admin parola: 123" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Giriş Yap</button>
</form>
<div style="position:fixed; bottom:400px">
<?php
    $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullurl,"signin=empty")==true){
        echo '<P style="color:red">Tüm Alanları Doldurmak Zorunludur.</P>';
        exit();
    }
    if(strpos($fullurl,"signin=invalidusername")==true){
        echo '<P style="color:red">E-Posta Sistemimizde Kayıtlı Değil.</P>';
        exit();
    }
    if(strpos($fullurl,"signin=invalidpassword")==true){
        echo '<P style="color:red">Parola Yanlış</P>';
        exit();
    }
?>
</div>
<?php
	require_once "./template/footer.php";
?>