<?php

session_start();

if(!empty($_SESSION['users_nickname']))
{
    Header('Location:home.php');
    exit();
}

require_once('netting/baglan.php');

$users_nickname = $_POST['users_nickname'] ?? null;
$users_password = $_POST['users_password'] ?? null;
$users_name = $_POST['users_name'] ?? null;

$warning='';

//echo $users_nickname . "<br>";
//echo $users_password . "<br>";

if ($_POST)
{
    #$ifade = "SELECT * FROM users WHERE users_nickname = :users_nickname and users_password = :users_password";
    $ifade = "SELECT * FROM users WHERE users_nickname = :users_nickname";
    $sorgu = $db->prepare($ifade);

    $sorgu->bindParam("users_nickname",$users_nickname);
    #$sorgu->bindParam("users_password",$users_password);
    $sorgu->execute();

    $user = $sorgu->fetch(PDO::FETCH_ASSOC);
   
    //$db = null;

    if ($user) 
    {
        $warning = "Bu kullanıcı adı kullanılıyor!";
    }
    else 
    {
        $ifade = "INSERT INTO users (users_name, users_nickname, users_password, users_datetime) VALUES (:users_name, :users_nickname, :users_password, :users_datetime)";
        $sorgu = $db->prepare($ifade);

        $sorgu->bindParam("users_name",$users_name);
        $sorgu->bindParam("users_nickname",$users_nickname);
        $sorgu->bindParam("users_password",$users_password);
        $sorgu->bindParam("users_datetime",time());

        $sorgu->execute();

        //$db = null;
        $_SESSION['users_nickname'] = $users_nickname;
        Header('Location:home.php');
exit();
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
</head>
<body>
    <a href="index.php">Giriş Yap</a>

<h1>Kayıt Ol</h1>
<form action="singup.php" method="POST">
    <input type="text" name="users_name" placeholder="Ad ve soyad giriniz" required/>
    <input type="text" name="users_nickname" placeholder="Kullanıcı adınızı giriniz" required/>
    <input type="password" name="users_password" placeholder="Şifrenizi giriniz" required/>
    <input type="submit" value="Kayıt Ol"/>

      <?php 
      if ($warning) {
        echo "<p style='color:red;'>$warning</p>";
      }
      ?>
</form>



</body>
</html>