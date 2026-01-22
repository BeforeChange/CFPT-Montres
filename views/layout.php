<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <?php
        foreach ($extra_css as $css_file) {
            echo '<link rel="stylesheet" href="assets/css/' . htmlspecialchars($css_file) . '">' . PHP_EOL;
        }
    ?>
    <title><?=$title?></title>
</head>
<body>
    <?php include __DIR__ . '/partials/header.php'; ?>
    <main>
        <?=$content?>
    </main>
    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>