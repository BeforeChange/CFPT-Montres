<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                <img src="assets/img/logo.svg" alt="Logo" width="32" height="32">
                <span><?= htmlspecialchars($title) ?></span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php include __DIR__ . '/links_base.php'; ?>
                </ul>

                <?php if ($is_staff): ?>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php include __DIR__ . '/links_staff.php'; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>
