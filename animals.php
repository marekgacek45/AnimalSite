<?php require("includes/header.php") ?>


<?php
$total = Animal::get_total($conn);
$paginator = new Paginator($_GET['page'] ?? 1, 3, $total);
$animals = Animal::get_page($conn, $paginator->limit, $paginator->offset);

$base = strtok($_SERVER['REQUEST_URI'], "?")

    ?>


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


<?php require("includes/footer.php") ?>