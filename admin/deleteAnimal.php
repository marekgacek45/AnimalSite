<?php require('../includes/header.php'); ?>
<?php Authentication::requireAdmin(); ?>

<?php

if (isset($_GET["id"])) {
    $animal = Animal::getByID($conn, $_GET['id']);

    if (!$animal) {
        die('animal not found');
    }

} else {
    die('nie ma takiego zwierza');
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {


    if ($animal->delete($conn)) {
        redirect("/AnimalSite/admin/index.php");
    }

}
?>

<p>jesteś pewien ze chcesz go usunac?</p>
<form method="post">
    <button type="submit">tak</button>
</form>
<a href="/AnimalSite/admin/index.php"><button>nie</button></a>