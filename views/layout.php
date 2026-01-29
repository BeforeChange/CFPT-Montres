<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= htmlspecialchars($title) ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Styles globaux -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- CSS supplémentaires -->
    <?php foreach ($extra_css as $css_file): ?>
        <link rel="stylesheet" href="assets/css/<?= htmlspecialchars($css_file) ?>">
    <?php endforeach; ?>
</head>

<body class="d-flex flex-column min-vh-100 bg-light">

    <?php include __DIR__ . '/partials/header.php'; ?>

    <main class="flex-fill">
        <div class="container py-4">
            <?= $content ?>
        </div>
    </main>

    <?php include __DIR__ . '/partials/footer.php'; ?>

</body>
</html>
