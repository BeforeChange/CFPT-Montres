<div class="mb-5 text-center">
    <h1 class="mb-3">Logs du site</h1>
    <p class="text-muted">Derniers accès et actions enregistrés</p>
</div>

<?php
$logFile = __DIR__ . '/../../logs/app.log'; // ajuste le chemin selon ton projet
$logs = [];

if (file_exists($logFile)) {
    $logs = array_reverse(file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));
}

// Fonction pour parser une ligne de log selon ton format
function parseLogLine(string $line): array {
    // Exemple de ligne :
    // [2026-02-05 10:08:12] INFO: GET http://cfpt.montres.local/profil (path: /profil, ip: ::1)
    if (preg_match('/^\[(.*?)\]\s+(\w+):\s+(\w+)\s+(.*?)\s+\(path:\s+(.*?),\s+ip:\s+(.*?)\)$/', $line, $matches)) {
        return [
            'date' => $matches[1],
            'level' => $matches[2],
            'method' => $matches[3],
            'url' => $matches[4],
            'path' => $matches[5],
            'ip' => $matches[6],
        ];
    }
    return ['raw' => $line];
}
?>

<?php if (empty($logs)): ?>
    <div class="alert alert-info">Aucun log disponible pour le moment.</div>
<?php else: ?>
    <div style="max-height: 600px; overflow-y: auto;" class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark sticky-top">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Niveau</th>
                    <th>Méthode</th>
                    <th>URL</th>
                    <th>Path</th>
                    <th>IP</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logs as $index => $line): 
                    $log = parseLogLine($line);
                ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($log['date'] ?? '') ?></td>
                        <td><?= htmlspecialchars($log['level'] ?? '') ?></td>
                        <td><?= htmlspecialchars($log['method'] ?? '') ?></td>
                        <td style="word-break: break-all;"><?= htmlspecialchars($log['url'] ?? $log['raw']) ?></td>
                        <td><?= htmlspecialchars($log['path'] ?? '') ?></td>
                        <td><?= htmlspecialchars($log['ip'] ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
