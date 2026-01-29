<!-- Nos partenaires -->
<h2>Salut  <?= htmlspecialchars($user->last_name ?? '') ?> , Bienvenue dans notre site</h2>

<h4>Nos partenaires</h4>

<div class="card-group">

    <div class="card">
        <img src="/image/RolexLogo2.png"  class="card-img-top" alt="Rolex">
        <div class="card-body">
            <h5 class="card-title">Rolex</h5>
            <p class="card-text">
                Marque suisse de luxe reconnue pour ses montres de haute précision, 
                élégantes et durables depuis plus de 100 ans.
            </p>
        </div>
    </div>

    <div class="card">
        <img src="/image/HublotLogo.png" class="card-img-top" alt="Hublot">
        <div class="card-body">
            <h5 class="card-title">Hublot</h5>
            <p class="card-text">
                Maison horlogère innovante mêlant tradition suisse et design moderne 
                avec des matériaux de haute technologie.
            </p>
        </div>
    </div>

    <div class="card">
        <img src="/image/PatekLogo.png" class="card-img-top" alt="Patek Philippe">
        <div class="card-body">
            <h5 class="card-title">Patek Philippe</h5>
            <p class="card-text">
                Référence mondiale de l’horlogerie de luxe, connue pour ses montres 
                d’exception et son savoir-faire artisanal.
            </p>
        </div>
    </div>

</div><br>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="/watches/liste.php" class="btn btn-outline-primary">Montres</a>
    <!-- <button class="btn btn-primary me-md-2" type="button">Montres</button> -->
</div>

<!-- Nos produits -->
<h4>Nos produits</h4>

<div class="row">
    <?php foreach ($watches as $watch): ?>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="uploads/<?= htmlspecialchars($watch['image']) ?>" class="card-img-top" alt="">
                
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($watch['name']) ?></h5>

                    <p class="card-text">
                        <?= htmlspecialchars(substr($watch['description'], 0, 80)) ?>...
                    </p>

                    <h6><?= number_format($watch['price'], 2) ?> CHF</h6>

                    <a href="watch.php?id=<?= $watch['id'] ?>" class="btn btn-primary btn-sm">
                        Voir détails
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
