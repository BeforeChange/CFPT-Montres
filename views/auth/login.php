<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-6 col-lg-4">

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <h2 class="text-center mb-4">Connexion</h2>

                <?php if (!empty($errors['general'])): ?>
                    <div class="alert alert-danger">
                        <?= htmlspecialchars($errors['general']) ?>
                    </div>
                <?php endif; ?>

                <form action="/login" method="post" novalidate>

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

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-primary">
                            Se connecter
                        </button>
                    </div>

                </form>

                <hr class="my-4">

                <p class="text-center mb-0">
                    Pas encore de compte ?
                    <a href="/register" class="text-decoration-none">Créer un compte</a>
                </p>

            </div>
        </div>

    </div>
</div>
