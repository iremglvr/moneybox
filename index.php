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
<html class="h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body class="h-100 d-flex align-items-center">
    <div class="mx-auto" style="width: 400px;">
        <h1>Kullanıcı Girişi</h1>
        <form action="index.php" method="POST">
            <div class="mb-3">
            <label for="users_nickname">Kullanıcı Adı:</label>
            <input class="form-control" type="text" name="users_nickname" required/>
            </div>
            <div class="mb-3">
            <label for="users_password">Şifre:</label>
            <input class="form-control" type="password" name="users_password" required/>
            </div>
            <a href="singup.php"><i class="bi bi-pencil-fill"></i> Kayıt Ol </a> 
            <input class="btn btn-primary w-100" type="submit" value="Giriş Yap"/> 
          
        </form>
    </div>
 

</body>
</html>