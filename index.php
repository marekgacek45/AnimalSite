<?php require("includes/header.php") ?>


<?php
$total = Animal::get_total($conn);
$paginator = new Paginator($_GET['page'] ?? 1, 3, $total);
$animals = Animal::get_page($conn, $paginator->limit, $paginator->offset);
$users = User::getAll($conn);

$base = strtok($_SERVER['REQUEST_URI'], "?")

  ?>
<main>
  <?php

  $image_directory = "assets/header_images";
  $images = glob($image_directory . '/*.jpg');
  $i = 1;
  ?>

  <header class="header">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="header__text d-flex flex-column justify-content-center col-xs-12  col-lg-5">
          <h2 class="heading">Pomóż naszym przyjaciołom znaleźć swój nowy dom</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet quod impedit repellendus harum atque
            similique
            voluptate ea fuga dolorem esse.</p>
          <div class="header__btns ">
            <a href="#"><button class="btn btn-dark">Zobacz zwierzaki</button></a>
            <a href="#"><button class="btn btn-dark">Napisz</button></a>
          </div>
        </div>
        <div class="header__photos d-flex flex-wrap justify-content-center align-items-center col-xs-12 col-lg-7">
          <?php foreach ($images as $image): ?>
            <?php if ($i <= 12): ?>
              <div class="header__photos-box ">

                <img src="<?= $image ?>" alt="zdjęcia piesków" loading="lazy">
                <?php $i++ ?>
              </div>

            <?php endif ?>
          <?php endforeach ?>
        </div>

      </div>
    </div>
  </header>



 <?php include("includes/components/heroImg.php") ?>


  <section class="puppy">
    <div class="container">
  <h2 class="heading">Pomóż naszym przyjaciołom znaleźć swój nowy dom</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet quod impedit repellendus harum atque
            similique
            voluptate ea fuga dolorem esse.</p>
    <div class="container d-flex flex-column justify-content-center align-items-center">
      <div class="puppy-container">
        <div class="puppy__box">
          <div class="puppy__box-text">
            <p>mamy 123</p>
            <h2 class="puppy__box-text-heading">pieski</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, impedit!</p>
            <button class="btn light-btn">sprawdź</button>
          </div>
          <div class=" puppy__box-img">
            <img src="./assets/alvan-nee-brFsZ7qszSY-unsplash-removebg-preview.png" alt="">
          </div>
        </div>
        <div class="puppy__box">
          <div class="puppy__box-text">
            <p>mamy 123</p>
            <h2 class="puppy__box-text-heading">koty</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, impedit!</p>
            <button class="btn light-btn">sprawdź</button>
          </div>
          <div class=" puppy__box-img">
            <img src="./assets/jae-park-7GX5aICb5i4-unsplash-removebg-preview.png" alt="">
          </div>
        </div>
      </div>

      <div class=" puppy__box ">
        <div class="puppy__box-text">
          <p>mamy 123</p>
          <h2 class="puppy__box-text-heading">inne zwierzątka</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, impedit!</p>
          <button class="btn light-btn">sprawdź</button>
        </div>
        <div class=" puppy__box-img">
          <img src="./assets/birger-strahl-fOV7nWWIwRk-unsplash-removebg-preview.png" alt="">
        </div>
      </div>
      </div>
    </div>
  </section>

  <?php include("includes/components/heroImg.php") ?>

    <section>
      <div class="container community">
        <h2>Wspaniała społeczność </h2>
        <div class="community__container">
          <div class="community__box">
            <div class="community__box-img">
              <img src="./assets/wade-austin-ellis-FtuJIuBbUhI-unsplash.jpg" alt="">
            </div>
            <h2>Paweł z Radomia</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed odit facere molestiae natus veniam neque
              nostrum sapiente similique pariatur inventore?</p>
            <a href="#">profil</a>
          </div>
          <div class="community__box">
            <div class="community__box-img">
              <img src="./assets/samuel-girven-buJ6OB_q8hI-unsplash.jpg" alt="">
            </div>
            <h2>Wanda z Płocka</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed odit facere molestiae natus veniam neque
              nostrum sapiente similique pariatur inventore?</p>
            <a href="#">profil</a>
          </div>
          <div class="community__box">
            <div class="community__box-img">
              <img src="./assets/cynthia-smith-vDs0MCYkfQ4-unsplash.jpg" alt="">
            </div>
            <h2>Jurek z Koszalina</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed odit facere molestiae natus veniam neque
              nostrum sapiente similique pariatur inventore?</p>
            <a href="#">profil</a>
          </div>
        </div>
        <h3>najnowsi użytkownicy</h3>
        <div class="community__container">
          <?php foreach ($users as $user): ?>
            <div>
              <h2><?= $user->username ?></h2>
              <img src="uploads/<?= $user->image ?>" alt="" style="width:50px">
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </section>




    </div>
  </section>

</main>



<?php require("includes/footer.php") ?>