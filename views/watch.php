<main class="container py-5">

    <div class="row g-5">

        <!-- IMAGE -->
        <div class="col-lg-6 text-center">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <img 
                        src="data:image/webp;base64,<?= htmlspecialchars($watch->image) ?>" 
                        alt="<?= htmlspecialchars($brand->name . ' ' . $watch->name) ?>"
                        class="img-fluid rounded"
                        style="max-height: 500px; object-fit: contain;"
                    >

                </div>
            </div>

        </div>


        <!-- INFORMATIONS -->
        <div class="col-lg-6">

            <p class="text-muted text-uppercase mb-2">
                <?= htmlspecialchars($brand->name) ?>
            </p>

            <h1 class="fw-bold mb-3">
                <?= htmlspecialchars($watch->name) ?>
            </h1>

            <p class="text-secondary mb-4">
                Version : <?= htmlspecialchars($version->name) ?>
            </p>
            <p class="text-secondary mb-4">
                <?= htmlspecialchars($watch->short_description ?? '') ?>
            </p>

            <h2 class="fw-bold mb-4">
                <?= number_format($watch->price, 0, "'", " ") ?> CHF
            </h2>

            <div class="d-flex gap-3 mb-4">
                <button class="btn btn-dark btn-lg px-4">
                    Ajouter au panier
                </button>
            </div>

            <hr class="my-4">

            <!-- DESCRIPTION LONGUE -->
            <div>
                <h5 class="mb-3">Description</h5>
                <p class="text-secondary" style="line-height: 1.8;">
                    <?= nl2br(htmlspecialchars($watch->long_description ?? 'Aucune description trouvé')) ?>
                </p>
            </div>

        </div>

    </div>

</main>
