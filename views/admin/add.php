<div class="card shadow-sm">
    <div class="card-body p-4">
        <h3 class="mb-4">Ajouter une montre</h3>

        <form action="/admin/watches/store" method="POST" enctype="multipart/form-data">
            <!-- Marque -->
            <div class="mb-3">
                <label for="id_brand" class="form-label">Marque</label>
                <select
                    class="form-select"
                    id="id_brand"
                    name="id_brand"
                    required
                >
                    <option value="" selected disabled>Choisir une marque</option>
                    <?php foreach ($brands as $brand): ?>
                        <option value="<?= (int) $brand->id ?>">
                            <?= htmlspecialchars($brand->name) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Nom -->
            <div class="mb-3">
                <label for="name" class="form-label">Nom de la montre</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    required
                >
            </div>

            <!-- Image -->
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input
                    type="file"
                    class="form-control"
                    id="image"
                    name="image"
                    accept="image/*"
                    required
                >
            </div>

            <!-- Version -->
            <div class="mb-3">
                <label for="id_version" class="form-label">Version</label>
                <select
                    class="form-select"
                    id="id_version"
                    name="id_version"
                    required
                >
                    <option value="" selected disabled>Choisir une version</option>
                    <?php foreach ($versions as $version): ?>
                        <option value="<?= (int) $version->id ?>">
                            <?= htmlspecialchars($version->name) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Prix -->
            <div class="mb-4">
                <label for="price" class="form-label">Prix</label>
                <input
                    type="number"
                    class="form-control"
                    id="price"
                    name="price"
                    step="0.01"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Ajouter la montre
            </button>

        </form>
    </div>
</div>
