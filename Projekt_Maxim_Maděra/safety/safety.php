<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Bezpečnost placení na internetu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="../include/logo/favicon.ico">
</head>
<body class="bg-light">

<!-- Navigace -->
    <?php include '../include/navbar.php'; ?>

<!-- Hlavička -->
    <header class="bg-primary text-white py-5 text-center">
        <div class="container">
            <h1 class="display-5 fw-bold">Bezpečnost placení na internetu</h1>
            <p class="lead fw-bold">Plaťte online chytře a bezpečně – jednoduché tipy vás ochrání před podvody.</p>
        </div>
  </header>

<!-- Hlavní obsah -->
    <main class="container my-5">

<!-- Tipy na bezpečnost -->
    <div class="row g-4">

        <!-- 1 -->
        <div class="col-12">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">1. Nakupujte jen na zabezpečených webech</h5>
                    <p class="card-text fs-5">Před zadáním údajů o kartě zkontrolujte, zda web používá šifrované připojení. Hledejte „https://“ na začátku adresy a ikonu zámku v prohlížeči. Falešné weby často vypadají jako pravé, ale chybí jim tyto znaky. Pokud něco vypadá podezřele, raději nenakupujte.</p>
                </div>
            </div>
        </div>

        <!-- 2 -->
        <div class="col-12">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">2. Používejte dvoufaktorové ověřování (2FA)</h5>
                    <p class="card-text fs-5">Dvoufaktorové ověřování dodává platbám extra vrstvu ochrany. Kromě zadání údajů o kartě potvrdíte platbu třeba kódem z SMS, otiskem prstu nebo přes bankovní aplikaci.</p>
                </div>
            </div>
        </div>

        <!-- 3 -->
        <div class="col-12">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">3. Vyzkoušejte virtuální karty</h5>
                    <p class="card-text fs-5">Virtuální karty fungují jako jednorázové – ideální pro jednorázové nákupy. Pokud by ji někdo zneužil, váš skutečný účet zůstane v bezpečí. Např. Air Bank nebo mBank je nabízejí přímo v aplikaci.</p>
                </div>
            </div>
        </div>

        <!-- 4 -->
        <div class="col-12">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">4. Pozor na phishing a podvodné e-maily</h5>
                    <p class="card-text fs-5">Nikdy nezadávejte údaje o kartě na stránkách, kam vás přesměroval podezřelý odkaz. Pokud si nejste jistí, kontaktujte banku přímo. Nevěřte slepě e-mailům, které vypadají "oficiálně".</p>
                </div>
            </div>
        </div>

        <!-- 5 -->
        <div class="col-12">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">5. Sledujte své transakce</h5>
                    <p class="card-text fs-5">Pravidelně kontrolujte výpisy a notifikace z banky. V případě podezřelé platby kontaktujte banku – většina umožňuje kartu okamžitě zmrazit.</p>
                </div>
            </div>
        </div>

        <!-- 6 -->
        <div class="col-12">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">6. Chraňte své zařízení</h5>
                    <p class="card-text fs-5">Aktualizace systému, silná hesla a antivir jsou základem. Pokud platíte přes veřejné Wi-Fi, zvažte VPN pro vyšší ochranu.</p>
                </div>
            </div>
        </div>
        
        <!-- Co dělat, když... -->
        <div class="col-12">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">Co dělat, když se něco pokazí?</h5>
                    <p class="card-text fs-5">Pokud zjistíte zneužití karty nebo podvod, ihned kontaktujte svou banku. Většina bank peníze vrací, pokud jste postupovali obezřetně. Můžete také kontaktovat Policii ČR.</p>
                </div>
            </div>
        </div>
    </div>

    </main>
    <?php include '../include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
