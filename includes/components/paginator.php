<!-- <nav>
  <ul>
    <li>
      <?php if ($paginator->previous): ?>
        <a href="<?= $base ?>?page=<?= $paginator->previous ?>">Poprzednia</a>
      <?php else: ?>
        Poprzednia
        <span class="page-link">Poprzednia</span>
      <?php endif ?>
    </li>
    <li>
      <?php if ($paginator->next): ?>
        <a href="<?= $base ?>?page=<?= $paginator->next ?>">Następna</a>
      <?php else: ?>
        Następna

      <?php endif ?>
    </li>
  </ul>
</nav>

<nav>
  <ul>
    <?php for ($i = 1; $i <= $paginator->total_pages; $i++): ?>
      <li>
        <a href="<?= $base ?>?page=<?= $i ?>"><?= $i ?></a>
      </li>
    <?php endfor ?>
  </ul>
</nav> -->



<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item disabled">
      <?php if ($paginator->previous): ?>
        <a class="page-link" href="<?= $base ?>?page=<?= $paginator->previous ?>">Poprzednia</a>
      <?php else: ?>
        <span class="page-link">Poprzednia</span>
      <?php endif ?>
    </li>

    <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item active" aria-current="page">
      <span class="page-link">2</span>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li> -->

    <?php for ($i = 1; $i <= $paginator->total_pages; $i++): ?>
      <li>
        <a class="page-link <?php  ?>" href="<?= $base ?>?page=<?= $i ?>"><?= $i ?></a>
      </li>
    <?php endfor ?>

    <li class="page-item">
      <?php if ($paginator->next): ?>
        <a class="page-link" href="<?= $base ?>?page=<?= $paginator->next ?>">Następna</a>
      <?php else: ?>
        <span class="page-link">Następna</span>

      <?php endif ?>



    </li>
  </ul>
</nav>