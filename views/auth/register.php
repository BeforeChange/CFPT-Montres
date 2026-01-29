<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6">

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <h2 class="text-center mb-4">Inscription</h2>

                <?php if (!empty($errors['general'])): ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($errors['general']) ?>
                    </div>
                <?php endif; ?>

                <form action="/register" method="post" novalidate>

                    <!-- Nom / Prénom -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Nom</label>
                            <input
                                type="text"
                                class="form-control <?= isset($errors['last_name']) ? 'is-invalid' : '' ?>"
                                id="last_name"
                                name="last_name"
                                value="<?= htmlspecialchars($_POST['last_name'] ?? '') ?>"
                                required
                            >
                            <?php if (isset($errors['last_name'])): ?>
                                <div class="invalid-feedback">
                                    <?= htmlspecialchars($errors['last_name']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">Prénom</label>
                            <input
                                type="text"
                                class="form-control <?= isset($errors['first_name']) ? 'is-invalid' : '' ?>"
                                id="first_name"
                                name="first_name"
                                value="<?= htmlspecialchars($_POST['first_name'] ?? '') ?>"
                                required
                            >
                            <?php if (isset($errors['first_name'])): ?>
                                <div class="invalid-feedback">
                                    <?= htmlspecialchars($errors['first_name']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <input
                            type="email"
                            class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                            id="email"
                            name="email"
                            value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                            required
                        >
                        <?php if (isset($errors['email'])): ?>
                            <div class="invalid-feedback">
                                <?= htmlspecialchars($errors['email']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input
                            type="password"
                            class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                            id="password"
                            name="password"
                            required
                        >
                        <?php if (isset($errors['password'])): ?>
                            <div class="invalid-feedback">
                                <?= htmlspecialchars($errors['password']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
                        <input
                            type="password"
                            class="form-control <?= isset($errors['confirm_password']) ? 'is-invalid' : '' ?>"
                            id="confirm_password"
                            name="confirm_password"
                            required
                        >
                        <?php if (isset($errors['confirm_password'])): ?>
                            <div class="invalid-feedback">
                                <?= htmlspecialchars($errors['confirm_password']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary">
                            Créer mon compte
                        </button>
                    </div>

                </form>

                <hr class="my-4">

                <p class="text-center mb-0">
                    Déjà un compte ?
                    <a href="/login" class="text-decoration-none">Se connecter</a>
                </p>

            </div>
        </div>

    </div>
</div>
