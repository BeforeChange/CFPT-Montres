<div class="container-fluid py-4">

    <div class="row">

        <!-- LISTE DES MONTRES -->
        <div class="col-lg-9">

            <div class="row g-4">

                <?php foreach ($watches as $watch): ?>
                    <div class="col-xl-3 col-lg-4 col-md-6">

                        <div class="card h-100 shadow-sm border-0">

                            <div class="d-flex align-items-center justify-content-center p-3"
                                 style="height: 220px;">
                                <img
                                    src="data:image/png;base64,<?= htmlspecialchars($watch->image) ?>"
                                    alt="<?= htmlspecialchars($watch->name) ?>"
                                    class="img-fluid"
                                    style="max-height: 100%; object-fit: contain;"
                                >
                            </div>

                            <div class="card-body d-flex flex-column">

                                <h5 class="card-title mb-2">
                                    <?= htmlspecialchars($watch->name) ?>
                                </h5>

                                <p class="fw-bold mb-3">
                                    <?= number_format($watch->price, 0, "'", " ") ?> CHF
                                </p>

                                <a href="/watch/<?= $watch->id ?>"
                                   class="btn btn-dark mt-auto">
                                    Voir les détails
                                </a>

                            </div>

                        </div>

                    </div>
                <?php endforeach; ?>

            </div>

        </div>

        <!-- FILTRES -->
<div class="col-lg-3">

    <form method="GET" action="" class="card shadow-sm border-0 sticky-top" style="top: 20px;">

        <div class="card-body">

            <h5 class="mb-4 fw-bold">Filtres</h5>

            <!-- MARQUE -->
            <div class="mb-4">
                <h6 class="fw-semibold">Marque</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="brand[]" value="Rolex" id="rolex">
                    <label class="form-check-label" for="rolex">Rolex</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="brand[]" value="Audemars Piguet" id="audemars">
                    <label class="form-check-label" for="audemars">Audemars Piguet</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="brand[]" value="Patek Philippe" id="patek">
                    <label class="form-check-label" for="patek">Patek Philippe</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="brand[]" value="Omega" id="omega">
                    <label class="form-check-label" for="omega">Omega</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="brand[]" value="Jaeger-LeCoultre" id="jaeger">
                    <label class="form-check-label" for="jaeger">Jaeger-LeCoultre</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="brand[]" value="Hublot" id="hublot">
                    <label class="form-check-label" for="hublot">Hublot</label>
                </div>
            </div>

            <!-- PRIX -->
            <div class="mb-4">
                <h6 class="fw-semibold">Prix (CHF)</h6>
                <div class="row g-2">
                    <div class="col-6">
                        <input type="number" name="price_min" class="form-control" placeholder="Min">
                    </div>
                    <div class="col-6">
                        <input type="number" name="price_max" class="form-control" placeholder="Max">
                    </div>
                </div>
            </div>

            <!-- GENRE -->
            <div class="mb-4">
                <h6 class="fw-semibold">Genre</h6>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Homme" id="homme">
                    <label class="form-check-label" for="homme">Homme</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Femme" id="femme">
                    <label class="form-check-label" for="femme">Femme</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Unisexe" id="unisexe">
                    <label class="form-check-label" for="unisexe">Unisexe</label>
                </div>
            </div>

            <!-- MOUVEMENT -->
            <div class="mb-4">
                <h6 class="fw-semibold">Mouvement</h6>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="movement[]" value="Automatique" id="auto">
                    <label class="form-check-label" for="auto">Automatique</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="movement[]" value="Quartz" id="quartz">
                    <label class="form-check-label" for="quartz">Quartz</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="movement[]" value="Manuel" id="manuel">
                    <label class="form-check-label" for="manuel">Manuel</label>
                </div>
            </div>

            <!-- MATIERE -->
            <div class="mb-4">
                <h6 class="fw-semibold">Matière du boîtier</h6>
                <select name="material" class="form-select">
                    <option value="">Toutes</option>
                    <option value="Acier">Acier</option>
                    <option value="Or">Or</option>
                    <option value="Titane">Titane</option>
                    <option value="Céramique">Céramique</option>
                </select>
            </div>

            <!-- ETANCHEITE -->
            <div class="mb-4">
                <h6 class="fw-semibold">Étanchéité</h6>
                <select name="water_resistance" class="form-select">
                    <option value="">Toutes</option>
                    <option value="30m">30m</option>
                    <option value="50m">50m</option>
                    <option value="100m">100m</option>
                    <option value="200m+">200m et +</option>
                </select>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-dark">
                    Appliquer les filtres
                </button>
                <a href="/watches" class="btn btn-outline-secondary">
                    Réinitialiser
                </a>
            </div>

        </div>

    </form>

</div>


</div>

</div>
