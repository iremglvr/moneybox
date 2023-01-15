<?php require_once 'header.php'; ?>

  <body class=" bg-light">

    <div class="container-fluid p-0 " id="home">

     <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gelir</h5>
            <p class="card-text">Bir gelir işlemi girin.</p>
            <a href="income-add.php" class="btn btn-outline-secondary w-100 btn-lg"><i class="bi bi-plus"></i> Gelir Ekle</a>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Gider</h5>
            <p class="card-text">Bir gider işlemi girin.</p>
            <a href="expenses-add.php" class="btn btn-outline-secondary w-100 btn-lg"><i class="bi bi-dash"></i>
            Gider Ekle</a>
          </div>
        </div>
      </div>

    </div>

    <div class="alert alert-" role="alert">
      <h4 class="alert-heading">Gelir ve Gider Türleri</h4>
      <p>Gelir ve Gider kategorilerinize ekleme ve çıkarma işlemi yapabilirsiniz.</p>
      <hr>
      <p class="mb-0">Gelir ve Gider kategorileri harcamalarınızı gruplamanıza ve incelemenize olanak sağlar.</p>
    </div>

    




<?php require_once 'footer.php'; ?>

</div>
