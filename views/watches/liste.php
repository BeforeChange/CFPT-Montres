<div class="container-fluid">
    <div class="row">

        <!-- LISTE DES MONTRES -->
        <div class="col-md-9">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">

                <?php foreach ($watches as $watch): ?>
                <div class="col">
                    <div class="watch-card">

                        <div class="watch-img">
                            <img src="/uploads/<?= htmlspecialchars($watch['image']) ?>" alt="">
                        </div>

                        <h5><?= htmlspecialchars($watch['name']) ?></h5>

                        <p class="desc">
                            <?= htmlspecialchars(substr($watch['description'], 0, 60)) ?>...
                        </p>

                        <a href="watch.php?id=<?= $watch['id'] ?>" class="btn-details">
                            Details
                        </a>

                        <div class="price">
                            <?= number_format($watch['price'], 2) ?> CHF
                        </div>

                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>

        <!-- FILTRES -->
        <div class="col-md-3 filter-box">
            <button class="filter-btn">Filtre</button>
            <button class="filter-btn">Filtre</button>
            <button class="filter-btn">Filtre</button>
        </div>

    </div>
</div>
