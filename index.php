<?php require("includes/header.php") ?>


<?php
$total = Animal::get_total($conn);
$paginator = new Paginator($_GET['page'] ?? 1, 3, $total);
$animals = Animal::get_page($conn, $paginator->limit, $paginator->offset);

$base = strtok($_SERVER['REQUEST_URI'], "?")

  ?>
<main>
  <?php

  $animalPhotos = Animal::getAll($conn);
  $i = 1
    ?>














  <header class="container header">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="header__tex d-flex flex-column justify-content-center align-items-flex-start col-xs-12  col-lg-5">
        <h2 class="heading">Pomóż naszym przyjaciołom znaleźć swój nowy dom</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet quod impedit repellendus harum atque similique
          voluptate ea fuga dolorem esse.</p>
        <div>
          <a href="#"><button class="btn btn-primary">Zobacz zwierzaki</button></a>
          <a href="#"><button class="btn btn-primary">Napisz</button></a>
        </div>
      </div>
      <div class="header__photos d-flex flex-wrap  col-xs-12  col-lg-7">
        <?php foreach ($animalPhotos as $animal): ?>
          <?php if ($i <= 16): ?>
            <div class="header__photos-box">

              <img src="uploads/<?= $animal->image ?>" alt="">
              <?php $i++ ?>
            </div>

          <?php endif ?>
        <?php endforeach ?>
      </div>

    </div>
  </header>



<section>
  <div class="d-flex justify-content-center align-items-center heroImg">
    <div class="heroImg-shadow"></div>
    <div class="heroImg__content d-flex flex-column justify-content-center align-items-center">
      <h2 class="heading">Adoptuj Seniora</h2>
      <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
<button class="btn btn-primary">sprawdź dobre pieski</button>
    </div>

  </div>
</section>


  <section class="container ">
    <div class="row ">
      <div class="col-xs-12 col-lg-6 ">
        <div>
          <p>mamy 123</p>
          <h2>Psy</h2>
          <button class="btn btn-primary">sprawdź</button>
        </div>

      </div>
      <div class="col-xs-12 col-lg-6">
        <div>
          <p>mamy 123</p>
          <h2>Koty</h2>
          <button class="btn btn-primary">sprawdź</button>
        </div>
        <div> <img src="" alt=""></div>
      </div>
      <div class="col-xs-12">
        <div>
          <p>mamy 123</p>
          <h2>inne zwierzątka</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, impedit!</p>
          <button class="btn btn-primary">sprawdź</button>
        </div>
        <div>
          <img src="" alt="">
        </div>
      </div>
    </div>
  </section>

  <?php foreach ($animals as $animal): ?>

    <div class="animal__card">
      <img src="uploads/<?= $animal->image ?>" alt="" style="width:100px">
      <p>
        <?= $animal->name ?>
      </p>
      <p><a href="animal.php?id=<?= $animal->id ?>"> zobacz zwierzaka</a></p>
    </div>


  <?php endforeach ?>

  <?php include('includes/components/paginator.php') ?>

</main>



<?php require("includes/footer.php") ?>