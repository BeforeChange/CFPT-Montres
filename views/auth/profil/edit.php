<div class="row justify-content-center">
    <div class="col-12 col-lg-8">

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <div class="d-flex align-items-center mb-4">
                    <div class="me-3">
                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                            style="width: 64px; height: 64px; font-size: 1.5rem;">
                            <?= strtoupper(substr($_SESSION['user_first_name'] ?? 'U', 0, 1)) ?>
                        </div>
                    </div>

                    <div>
                        <h4 class="mb-0">
                            <?= htmlspecialchars($user->first_name ?? '') ?>
                            <?= htmlspecialchars($user->last_name ?? '') ?>
                        </h4>
                        <small class="text-muted">
                            <?= htmlspecialchars($user->email ?? '') ?>
                        </small>
                    </div>
                </div>

                <hr>

                <h5 class="mb-3">Modifier vos informations</h5>

                <form method="POST" action="/profil/update">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                value="<?= htmlspecialchars($user->first_name ?? '') ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                value="<?= htmlspecialchars($user->last_name ?? '') ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?= htmlspecialchars($user->email ?? '') ?>" required>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        <a href="/profil" class="btn btn-outline-secondary">Annuler</a>
                        <a href="javascript:void(0)" class="btn btn-outline-secondary ms-auto">Changer le mot de passe</a>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
