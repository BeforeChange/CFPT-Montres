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

                <!-- Infos utilisateur -->
                <h5 class="mb-3">Informations personnelles</h5>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label text-muted">Prénom</label>
                        <p class="fw-semibold">
                            <?= htmlspecialchars($user->first_name) ?>
                        </p>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label text-muted">Nom</label>
                        <p class="fw-semibold">
                            <?= htmlspecialchars($user->last_name) ?>
                        </p>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted">Adresse email</label>
                    <p class="fw-semibold">
                        <?= htmlspecialchars($user->email) ?>
                    </p>
                </div>
                
                <div class="mb-4">
                    <label class="form-label text-muted">Inscrit le</label>
                    <p class="fw-semibold">
                        <?= $user->created_at->format('d/m/Y - H:i') ?>
                    </p>
                </div>
                <hr>

                <!-- Actions -->
                <div class="d-flex flex-wrap gap-2">
                    <a href="/profil/edit" class="btn btn-outline-primary">
                        Modifier le profil
                    </a>
                    <a href="/password/change" class="btn btn-outline-secondary">
                        Changer le mot de passe
                    </a>
                    <a href="/logout" class="btn btn-outline-danger ms-auto">
                        Déconnexion
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>
