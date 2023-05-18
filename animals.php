<?php require("includes/header.php") ?>


<?php
$allAnimals = Animal::getAll($conn);
$total = Animal::get_total($conn);
$paginator = new Paginator($_GET['page'] ?? 1, 12, $total);
$animals = Animal::get_page($conn, $paginator->limit, $paginator->offset);

$base = strtok($_SERVER['REQUEST_URI'], "?")

    ?>

<div class="container">
    <h2>Nasze zwierzaki</h2>
    <select class="form-select" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <?php foreach ($allAnimals as $type): ?>
            <option value="<?= $type->type ?>"><?= $type->type ?></option>
        <?php endforeach ?>
    </select>

    <div class="animal-container">
        <?php foreach ($animals as $animal): ?>

            <a href="animal.php?id=<?= $animal->id ?>">
                <div class="animal__box">
                    <img src="uploads/<?= $animal->image ?>" alt="" style="width:100px">
                    <p>
                        <?= $animal->name ?>
                    </p>

                </div>
            </a>
            
            <?php endforeach ?>
        </div>

    <?php include('includes/components/paginator.php') ?>

</div>
<?php require("includes/footer.php") ?>