<?php require('../includes/header.php'); ?>
<?php Authentication::requireAdmin(); ?>
<?php $animals = Animal::getAll($conn);

$i = 1;
?>

<main class="container d-flex flex-column justify-content-center align-items-center">
    <h2>admin panel</h2>
    <a href="addAnimal.php"><button>dodaj</button></a>

    <table class="table table-striped text-center">
        <thead>
            <tr >
                <th scope="col">#</th>
                <th scope="col">Imię</th>
                <th scope="col">Zwierze</th>
                <th scope="col">Skąd</th>
                <th scope="col">Akcje</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($animals as $animal): ?>
                <tr>
                    <th scope="row">
                        <?= $i++ ?>
                    </th>
                    <td><img src="../uploads/<?= $animal->image ?>" alt="zdjęcie <?= $animal->name ?>" width="30px"> <?= $animal->name ?></td>
                    <td><?=$animal->type?></td>
<td><?=$animal->from_where?></td>
                <td>
                <a href="/AnimalSite/animal.php?id=<?= $animal->id ?>"> <button type="button" class="btn btn-primary">zobacz</button></a>
            <a href="/AnimalSite/admin/editAnimal.php?id=<?= $animal->id ?>"><button type="button" class="btn btn-primary">Edytuj</button></a>
            <a href="/AnimalSite/admin/deleteAnimal.php?id=<?= $animal->id ?>"><button type="button" class="btn btn-danger">Usuń</button></a>

                </td>


                <?php endforeach ?>
              
        </tbody>
    </table>




</main>