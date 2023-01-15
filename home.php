<?php
require_once 'header.php';

if (empty($_SESSION['users_nickname']))
{
  Header('Location:index.php');
  exit();
}




 ?>

  <body class=" bg-light">

    <a href="logout.php">Çıkış Yap</a>

    <div class="container-fluid p-0 " id="home">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
       
        <div class="carousel-inner">
          
          <?php 
          $sql=$db->prepare("SELECT * FROM slider");
          $sql->execute();

          // echo "<pre>";
          // print_r($sqlCek);
          // echo "</pre>";

          while($sqlCek=$sql->fetch(PDO::FETCH_ASSOC))
            {
           ?>
          <div class="carousel-item <?= ($sqlCek['slider_image_order']==1) ? 'active' : '' ?>">
            <img  src="images/slider/<?php echo $sqlCek['slider_image']; ?>" class="d-block w-100 " alt="...">
          </div>



       <?php } ?>
          
        </div>

        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


<?php require_once 'footer.php'; ?>





      