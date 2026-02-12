<li class="nav-item">
    <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/') ? 'active' : '' ?>" href="/">
        Home
    </a>
</li>

<li class="nav-item">
    <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/watches') ? 'active' : '' ?>" href="/watches">
        Nos montres
    </a>
</li>

<?php if (isset($_SESSION['user_id'])): ?>

    <li class="nav-item">
        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/profil') ? 'active' : '' ?>" href="/profil">
            Profil
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link position-relative" href="cart.php">
            <ion-icon name="cart-outline" style="font-size:22px;"></ion-icon>
       </a>
    </li>

<?php else: ?>

    <li class="nav-item">
        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/login') ? 'active' : '' ?>" href="/login">
            Connexion
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?= ($_SERVER['REQUEST_URI'] === '/register') ? 'active' : '' ?>" href="/register">
            Inscription
        </a>
    </li>

<?php endif; ?>