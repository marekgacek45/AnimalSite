<?php require("includes/header.php") ?>


<?php
$total = Animal::get_total($conn);
$paginator = new Paginator($_GET['page'] ?? 1, 3, $total);
$animals = Animal::get_page($conn, $paginator->limit, $paginator->offset);

$base = strtok($_SERVER['REQUEST_URI'], "?")

  ?>
<main class="container">
  <h1>Przygarnij Zwierzaka</h1>





  <?php foreach ($animals as $animal): ?>

    <div class="animal__card">
      <img src="uploads/<?= $animal->image ?>" alt="" style="width:100px">
      <p>
        <?= $animal->name ?>
      </p>
      <p><a href="animal.php?id=<?= $animal->id ?>"> zobacz zwierzaka</a></p>
    </div>


  <?php endforeach ?>

  <nav>
    <ul>
      <li>
        <?php if($paginator->previous): ?>
          <a href="<?=$base?>?page=<?=$paginator->previous?>">Poprzednia</a>
        <?php else: ?>
          Poprzednia
        <?php endif ?>
      </li>
      <li>
        <?php if($paginator->next): ?>
          <a href="<?=$base?>?page=<?=$paginator->next?>">Następna</a>
        <?php else: ?>
          Następna
        <?php endif ?>
      </li>
    </ul>
  </nav>

  <nav>
    <ul>
      <?php for($i=1;$i<=$paginator->total_pages;$i++): ?>
        <li>
        <a href="<?=$base?>?page=<?=$i?>"><?=$i?></a>
        </li>
        <?php endfor ?>
    </ul>
  </nav>

</main>



<?php require("includes/footer.php") ?>