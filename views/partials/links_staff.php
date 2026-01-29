<?php if (!empty($is_staff) && $is_staff()): ?>
    <li class="nav-item">
        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/admin/dashboard') ? 'active' : '' ?>" href="/admin/dashboard">
            Logs
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/admin/users') ? 'active' : '' ?>" href="/admin/users">
            Gérer les utilisateurs
        </a>
    </li>
<?php endif; ?>
