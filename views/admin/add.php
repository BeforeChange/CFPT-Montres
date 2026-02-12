<div class="card shadow-sm">
    <div class="card-body p-4">
        <h3 class="mb-4">Ajouter une montre</h3>

        <form action="/admin/watches/store" method="POST" enctype="multipart/form-data">

            <!-- Marque -->
            <div class="mb-3">
                <label for="id_brand" class="form-label">Marque</label>
                <select class="form-select" id="id_brand" name="id_brand" required>
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
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <!-- Catégorie -->
            <div class="mb-3">
                <label for="category" class="form-label">Catégorie</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="" selected disabled>Choisir une catégorie</option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                    <option value="Unisex">Unisex</option>
                </select>
            </div>

            <!-- Étanchéité -->
            <div class="mb-3">
                <label for="water_resistance" class="form-label">Étanchéité</label>
                <select class="form-select" id="water_resistance" name="water_resistance" required>
                    <option value="" selected disabled>Choisir une valeur</option>
                    <option value="10m">10m</option>
                    <option value="50m">50m</option>
                    <option value="100m">100m</option>
                    <option value="200m+">200m+</option>
                </select>
            </div>

            <!-- Matière du boîtier -->
            <div class="mb-3">
                <label for="case_material" class="form-label">Matière du boîtier</label>
                <select class="form-select" id="case_material" name="case_material" required>
                    <option value="" selected disabled>Choisir une matière</option>
                    <option value="Or">Or</option>
                    <option value="Acier inoxydable">Acier inoxydable</option>
                    <option value="Céramique">Céramique</option>
                    <option value="Titane">Titane</option>
                    <option value="Platine">Platine</option>
                    <option value="Carbone">Carbone</option>
                </select>
            </div>

            <!-- Mouvement -->
            <div class="mb-3">
                <label for="movement" class="form-label">Mouvement</label>
                <select class="form-select" id="movement" name="movement" required>
                    <option value="" selected disabled>Choisir un mouvement</option>
                    <option value="Automatique">Automatique</option>
                    <option value="Quartz">Quartz</option>
                    <option value="Manuel">Manuel</option>
                </select>
            </div>

            <!-- Image -->
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>

            <!-- Version -->
            <div class="mb-3">
                <label for="id_version" class="form-label">Version</label>
                <select class="form-select" id="id_version" name="id_version" required>
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
                <input type="number" class="form-control" id="price" name="price" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Ajouter la montre
            </button>

        </form>
    </div>
</div>
