<?php require('../includes/header.php'); ?>
<?php Authentication::requireAdmin(); ?>
<?php 

$total = User::get_total($conn);
$paginator = new Paginator($_GET['page'] ?? 1, 10, $total);
$users = User::get_page($conn, $paginator->limit, $paginator->offset);
$base = strtok($_SERVER['REQUEST_URI'], "?");

$i = 1;
?>

<main class="container d-flex flex-column justify-content-center align-items-center">
    <h2>admin panel</h2>
    <ul>
        <a href="/AnimalSite/admin/index.php"><li>zwierzaki</li></a>
        <a href="/AnimalSite/admin/users_list.php"><li>użytkownicy</li></a>
    </ul>



    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa użytkownika</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Email</th>
                <th scope="col">Akcje</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($users as $user): ?>
                <tr>
                    <th scope="row">
                        <?= $i++ ?>
                    </th>
                    <td><img src="../uploads/<?= $user->image ?>" alt="zdjęcie <?= $user->username ?>" width="30px"> <?= $user->username ?></td>
                    <td><?= $user->first_name ?></td>
                    <td><?= $user->last_name ?></td>
                    <td><?= $user->email ?></td>
                    <td>
                        <a href="/AnimalSite/user.php?id=<?= $user->id ?>"> <button type="button"
                                class="btn btn-primary">zobacz</button></a>
                        

                    </td>


                <?php endforeach ?>

               
        </tbody>
    </table>


    <?php include('../includes/components/paginator.php') ?>

</main>