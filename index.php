<?php

session_start();

if(!empty($_SESSION['users_nickname']))
{
    Header('Location:home.php');
    exit();

}

$users_nickname = $_POST['users_nickname'] ?? null;
$users_password = $_POST['users_password'] ?? null;

$warning='';

//echo $users_nickname . "<br>";
//echo $users_password . "<br>";

if ($_POST)
{
    require_once('netting/baglan.php');

    #$ifade = "SELECT * FROM users WHERE users_nickname = :users_nickname and users_password = :users_password";
    $ifade = "SELECT * FROM users WHERE users_nickname = :users_nickname";
    $sorgu = $db->prepare($ifade);

    $sorgu->bindParam("users_nickname",$users_nickname);
    #$sorgu->bindParam("users_password",$users_password);
    $sorgu->execute();

    $user = $sorgu->fetch(PDO::FETCH_ASSOC);
   
    $db = null;

    if ($user) 
    {
        if ($user['users_password'] === $users_password) 
        {
            $_SESSION['users_nickname'] = $users_nickname;
            Header('Location:home.php');
        }
        else 
        {
            $warning = "Şifre Hatalı!";
        }
    }
    else 
    {
        $warning = "Kullanıcı Adı Hatalı!";
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANA SAYFA</title>
</head>
<body>
    <a href="singup.php">Kayıt ol</a>

<h1>Kullanıcı Girişi</h1>
<form action="index.php" method="POST">
    <input type="text" name="users_nickname" placeholder="Kullanıcı adınızı giriniz" required/>
     <input type="password" name="users_password" placeholder="Şifrenizi giriniz" required/>
      <input type="submit" value="Giriş Yap"/>
      <?php 
      if ($warning) {
        echo "<p style='color:red;'>$warning</p>";
      }
      ?>
</form>



</body>
</html>