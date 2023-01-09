<?php
	$title = "User SignUp";
	require_once "./template/header.php";
?>

	<form class="form-horizontal" method="post" action="user_signup.php">
    <div class="form-group">
        <label for="exampleInputEmail1">Ad</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Erim" name="firstname">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Soyad</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Işıl" name="lastname">
    </div>
    <div class="form-group">

        <label for="inputEmail4">E-Posta</label>
        <input type="text" class="form-control" id="inputEmail4" placeholder="E-Posta" name="email">
        </div>
        <div class="form-group">
        <label for="inputPassword4">Parola</label>
        <input type="password" class="form-control" id="inputPassword4" placeholder="Parola" name="password">
    </div>
    <div class="form-group">
        <label for="inputAddress">Adres</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Adres" name="address">
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
        <label for="inputCity">Şehir</label>
        <input type="text" class="form-control" id="inputCity" name="city">
        </div>
        <div class="form-group col-md-2">
        </div>
        <div class="form-group col-md-4">
        <label for="inputZip">Posta Kodu</label>
        <input type="text" class="form-control" id="inputZip" name="zipcode">
        </div>
    </div>
    <div class="form-group col-md-12">
    <button type="submit" class="btn btn-primary">Kaydol</button>
    </div>
</form>
<div style="position:fixed; bottom:120px">

<?php
    $fullurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullurl,"signup=empty")==true){
        echo '<P style="color:red">You did not fill in all the fields.</P>';
        exit();
    }
    if(strpos($fullurl,"signup=invalidemail")==true){
        echo '<P style="color:red">You did not enter a valid email address.</P>';
        exit();
    }
?>
</div>
<?php
	require_once "./template/footer.php";
?>