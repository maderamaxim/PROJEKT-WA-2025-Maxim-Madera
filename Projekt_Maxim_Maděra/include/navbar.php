<?php if (session_status() === PHP_SESSION_NONE) { session_start(); } ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-black">
  <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/index.php">
        <img src="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/include/logo/logo.jpg" alt="Logo" height="32" class="me-2">
    </a>
    <a class="navbar-brand" href="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/index.php">Blog o platebních metodách</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/methods/methods.php">Platební metody</a></li>
            <li class="nav-item"><a class="nav-link" href="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/safety/safety.php">Bezpečné placení</a></li>
            <li class="nav-item"><a class="nav-link" href="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/future/future.php">Budoucnost plateb</a></li>        
            <li class="nav-item"><a class="nav-link" href="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/community/community.php">Komunita</a></li>
        </ul>
        <ul class="navbar-nav">
          <?php if (isset($_SESSION['username'])): ?>
            <li class="nav-item">
              <span class="nav-link text-white">Přihlášen: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
            </li>
            <li class="nav-item">
              <a href="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/controllers/logout.php" class="btn btn-outline-light ms-2">Odhlásit se</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a href="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/register.php" class="btn btn-outline-light me-2">Registrace</a>
            </li>
            <li class="nav-item">
              <a href="/WA-2025-Madera-Maxim/Projekt_Maxim_Maděra/app/views/auth/login.php" class="btn btn-light">Login</a>
            </li>
          <?php endif; ?>
        </ul>
    </div>
  </div>
</nav>
