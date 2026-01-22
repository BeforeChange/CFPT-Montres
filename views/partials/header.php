<header>
    <!-- <h1>< ?=$title?></h1> -->
    <!-- <nav> -->
        <!-- < ?php include __DIR__ . '/links.php'; ?> -->
    <!-- </nav> -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                <?=$title?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <?php include __DIR__ . '/links.php'; ?>
                    <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul> -->
                    <form class="d-flex" role="search">
                        <a class="btn btn-primary" href="#" role="button">Connexion</a>
                        <a class="btn btn-primary" href="#" role="button">Inscription</a>
                    </form>
                </div>
        </div>
    </nav>
</header>
