<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Můj blog – Úvodní stránka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="include/logo/favicon.ico">
</head>
<body class="bg-light">

    <!-- Navigace -->
    <?php include 'include/navbar.php'; ?>

    <!-- Hlavička -->
    <header class="bg-primary text-white py-5 text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Vítejte na blogu o platebních metodách</h1>
            <p class="display-6 fw-bold">...místě, kde se svět financí setkává s technologií.</p>
        </div>
    </header>

    <!-- Hlavní obsah -->
    <main class="container my-5">
        <div class="card shadow p-4">
            <h2 class="mb-4">O čem je tento blog?</h2>
            <p class="fs-4">
            Dnešní doba se mění rychle – a s ní i způsob, jakým platíme. Už dávno neplatíme jen hotovostí. Karty, mobilní telefony, chytré hodinky nebo dokonce platby otiskem prstu – to vše se stalo běžnou součástí našich životů.
Na našem portálu se podíváme na to, jak se platební metody vyvíjely, co používáme dnes a kam směřujeme zítra. Ať už si kupujete ranní kávu, platíte předplatné online služby nebo převádíte peníze do zahraničí, u nás najdete  informace, které vám pomohou lépe se zorientovat v moderním světě financí.
Zaměřujeme se nejen na přehled klasických i moderních platebních nástrojů, ale i na jejich výhody, nevýhody, bezpečnost a dopad na každodenní život uživatelů. Zjistíte, co všechno umí vaše peněženka v mobilu, proč je důležitá bezpečnost plateb nebo jak technologie mění způsob, jakým vnímáme peníze.
Navíc se na našem diskusním fóru můžete podělit o své zkušenosti, zjistit, co používají ostatní, a najít inspiraci jak inovativně platit.

            </p>
            
        </div>
    </main>
    <?php include 'include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
