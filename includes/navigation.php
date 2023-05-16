<!-- <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <div class="navbar-brand">
            <a class="navbar-brand" href="/AnimalSite/index.php">
                <img src="assets/paw.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Przygarnij Zwierzaka
            </a>
        </div>
       
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar__items mr-auto">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>
            </div>

            <div class="navbar__actions ml-auto">
                <?php if ($user !== null): ?>
                    <a href="user.php"><img src="uploads/<?= $user->image ?>" style="width:30px"></a>

                    <?php if (isset($user->admin) && $user->admin == 'yes'): ?>
                        <a href="admin/index.php"><button class="btn btn-primary">Panel admina</button></a>
                    <?php endif ?>

                    <a href="logout.php"><button class="btn btn-primary">Wyloguj</button></a>
                <?php else: ?>
                    <a href="login.php"><button class="btn btn-primary">Zaloguj</button></a>
                <?php endif ?>
            </div>
        </div>
    </div>
</nav> -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid navbar__container">
        <a class="navbar-brand" href="/AnimalSite/index.php">
            <img src="assets/paw.png" alt="Logo" width="30" height="24">
        Przygarnij Zwierzaka
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Zwierzaki</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Galeria</a>
                </li>
            </ul>
            <div class="d-flex order-lg-2 mobile">
            <?php if ($user !== null): ?>
                    <a href="user.php"><img src="uploads/<?= $user->image ?>" style="width:30px"></a>

                    <?php if (isset($user->admin) && $user->admin == 'yes'): ?>
                        <a href="admin/index.php"><button class="btn btn-primary">Panel admina</button></a>
                    <?php endif ?>

                    <a href="logout.php"><button class="btn btn-primary">Wyloguj</button></a>
                <?php else: ?>
                    <a href="login.php"><button class="btn btn-primary">Zaloguj</button></a>
                <?php endif ?>
            </div>
        </div>
        <div class="d-flex order-lg-2 desktop">
        <?php if ($user !== null): ?>
                    <a href="user.php"><img src="uploads/<?= $user->image ?>" style="width:30px"></a>

                    <?php if (isset($user->admin) && $user->admin == 'yes'): ?>
                        <a href="admin/index.php"><button class="btn custom-btn">Panel admina</button></a>
                    <?php endif ?>

                    <a href="logout.php"><button class="btn custom-btn">Wyloguj</button></a>
                <?php else: ?>
                    <a href="login.php"><button class="btn custom-btn">Zaloguj</button></a>
                <?php endif ?>
        </div>
    </div>
</nav>