<style>
/* Carousel arrows */
.carousel-control-prev,
.carousel-control-next {
    width: 5%; /* rétrécit la zone cliquable pour ne pas chevaucher le contenu */
    top: 50%;
    transform: translateY(-50%);
}

.carousel-control-prev {
    left: -50px; /* décale la flèche vers la gauche */
}

.carousel-control-next {
    right: -50px; /* décale la flèche vers la droite */
}

/* Flèches noires avec directions correctes */
.carousel-control-prev-icon {
    background-color: black;
    width: 30px;
    height: 30px;
}

.carousel-control-next-icon {
    background-color: black;
    width: 30px;
    height: 30px;
}
</style>


<div class="mb-5 text-center">
    <h1 class="mb-3">Bienvenue sur CFPT Montres</h1>
    <p class="text-muted">Découvrez nos montres de luxe et leurs différentes versions</p>
</div>

<!-- Marques -->
<section class="mb-5">
    <h2 class="mb-4">Nos Marques</h2>
    <div class="row g-4 justify-content-center">
        <?php foreach ($brands as $brand): ?>
            <div class="col-6 col-md-4 col-lg-3 d-flex justify-content-center">
                <div class="card h-100 text-center" style="max-width: 200px; width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($brand->name) ?></h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Montres Carousel -->
<section>
    <h2 class="mb-4">Nos Montres</h2>

    <div id="watchesCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $chunks = array_chunk($watches, 3); // 3 montres par "slide"
            foreach ($chunks as $index => $watchGroup):
            ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <div class="row justify-content-center">
                    <?php foreach ($watchGroup as $watch): ?>
                        <div class="col-12 col-md-4 d-flex justify-content-center">
                            <div class="card h-100" style="max-width: 250px; width: 100%;">
                                <?php if ($watch->image): ?>
                                    <img src="data:image/png;base64,<?= $watch->image ?>" 
                                        class="card-img-top" 
                                        alt="<?= htmlspecialchars($watch->name) ?>"
                                        style="height: 200px; object-fit: contain;">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/300x200?text=Pas+d%27image" 
                                        class="card-img-top" 
                                        alt="Pas d'image"
                                        style="height: 200px; object-fit: contain;">
                                <?php endif; ?>
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?= htmlspecialchars($watch->name) ?></h5>
                                    <p class="card-text">
                                        <strong>Version :</strong>
                                        <?php
                                        $versionName = '';
                                        foreach ($versions as $version) {
                                            if ($version->id == $watch->id_version) {
                                                $versionName = $version->name;
                                                break;
                                            }
                                        }
                                        echo htmlspecialchars($versionName);
                                        ?>
                                    </p>
                                    <p class="card-text"><strong>Prix :</strong> <?= number_format($watch->price, 0, ',', "'") ?> CHF</p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Flèches -->
        <button class="carousel-control-prev" type="button" data-bs-target="#watchesCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#watchesCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>
</section>
