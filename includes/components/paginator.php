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