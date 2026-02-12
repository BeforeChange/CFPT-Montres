<?php if (!empty($is_staff) && $is_staff()): ?>
    <li class="nav-item">
        <a class="nav-link" href="/admin/watches/store">
            Ajouter des montres
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/admin/logs">
            Logs
        </a>
    </li>
<?php endif; ?>
