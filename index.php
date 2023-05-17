<?php require("includes/header.php") ?>


<?php
$total = Animal::get_total($conn);
$paginator = new Paginator($_GET['page'] ?? 1, 3, $total);
$animals = Animal::get_page($conn, $paginator->limit, $paginator->offset);

$base = strtok($_SERVER['REQUEST_URI'], "?")

  ?>
<main>
  <?php

  $image_directory = "assets/header_images";
  $images = glob($image_directory . '/*.jpg');
  $i = 1;
  ?>

  <header class="container header">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="header__text d-flex flex-column justify-content-center col-xs-12  col-lg-5">
        <h2 class="heading">Pomóż naszym przyjaciołom znaleźć swój nowy dom</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet quod impedit repellendus harum atque similique
          voluptate ea fuga dolorem esse.</p>
        <div class="header__btns ">
          <a href="#"><button class="btn custom-btn">Zobacz zwierzaki</button></a>
          <a href="#"><button class="btn custom-btn">Napisz</button></a>
        </div>
      </div>
      <div class="header__photos d-flex flex-wrap justify-content-center align-items-center col-xs-12 col-lg-7">
        <?php foreach ($images as $image): ?>
          <?php if ($i <= 12): ?>
            <div class="header__photos-box ">

              <img src="<?= $image ?>" alt="" loading="lazy">
              <?php $i++ ?>
            </div>

          <?php endif ?>
        <?php endforeach ?>
      </div>

    </div>
  </header>



  <section>
    <div class="d-flex justify-content-space-evenly align-items-center heroImg">
      <div class="heroImg-shadow"></div>
      <div class="heroImg__content  container">
        <h2 class="heading">Adoptuj Seniora</h2>
        <p class="heroImg__content-text">It is a long established fact that a reader will be distracted by the readable
          content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
          normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable
          English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model
          text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have
          evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
        <button class="btn btn-primary">sprawdź dobre pieski</button>
      </div>

    </div>
  </section>


  <section>

    <div class="container d-flex flex-column justify-content-center align-items-center">
      <div class="animal-container">
        <div class="animal__box">
          <div class="animal__box-text">
            <p>mamy 123</p>
            <h2>pieski</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, impedit!</p>
            <button class="btn btn-primary">sprawdź</button>
          </div>
          <div class=" animal__box-img">
            <img src="./assets/alvan-nee-brFsZ7qszSY-unsplash-removebg-preview.png" alt="">
          </div>
        </div>
        <div class="animal__box">
          <div class="animal__box-text">
            <p>mamy 123</p>
            <h2>koty</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, impedit!</p>
            <button class="btn btn-primary">sprawdź</button>
          </div>
          <div class=" animal__box-img">
            <img src="./assets/jae-park-7GX5aICb5i4-unsplash-removebg-preview.png" alt="">
          </div>
        </div>
        </div>

        <div class=" animal__box ">
          <div class="animal__box-text">
            <p>mamy 123</p>
            <h2>inne zwierzątka</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A, impedit!</p>
            <button class="btn btn-primary">sprawdź</button>
          </div>
          <div class=" animal__box-img">
            <img src="./assets/birger-strahl-fOV7nWWIwRk-unsplash-removebg-preview.png" alt="">
          </div>
        </div>
      
    </div>

    <section>
    <div class="d-flex justify-content-space-evenly align-items-center heroImg">
      <div class="heroImg-shadow"></div>
      <div class="heroImg__content  container">
        <h2 class="heading">Adoptuj Seniora</h2>
        <p class="heroImg__content-text">It is a long established fact that a reader will be distracted by the readable
          content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
          normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable
          English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model
          text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have
          evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
        <button class="btn btn-primary">sprawdź dobre pieski</button>
      </div>

    </div>
  </section>

<section>
  <div class="container">
  <h2>Wspaniała społeczność </h2>
  <div>
    <div>
      <img src="./assets/wade-austin-ellis-FtuJIuBbUhI-unsplash.jpg" alt="">
      <h2></h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed odit facere molestiae natus veniam neque nostrum sapiente similique pariatur inventore?</p>
      <a href="#">profil</a>
    </div>
    <div>
      <img src="./assets/samuel-girven-buJ6OB_q8hI-unsplash.jpg" alt="">
      <h2></h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed odit facere molestiae natus veniam neque nostrum sapiente similique pariatur inventore?</p>
      <a href="#">profil</a>
    </div>
    <div>
      <img src="./assets/cynthia-smith-vDs0MCYkfQ4-unsplash.jpg" alt="">
      <h2></h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed odit facere molestiae natus veniam neque nostrum sapiente similique pariatur inventore?</p>
      <a href="#">profil</a>
    </div>
  </div>
  <h3>najnowsi użytkownicy</h3>

  </div>
</section>




</main>



<?php require("includes/footer.php") ?>