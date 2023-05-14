<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid d-flex">
        <a class="navbar-brand" href="/AnimalSite/index.php">Przygarnij Zwierzaka</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <div>
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

            <div>
                <?php if ($user !== null): ?>
                    <p>Cześć <?= $user->username ?></p>
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
</nav>