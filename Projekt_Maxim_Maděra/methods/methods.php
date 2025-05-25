<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přehled platebních metod</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../include/logo/favicon.ico">
</head>
<body class="bg-light">

    <!-- Navigace -->
    <?php include '../include/navbar.php'; ?>

    <!-- Hlavička -->
    <header class="bg-primary text-white py-5 text-center">
        <div class="container">
            <h1 class="display-5 fw-bold">Přehled platebních metod</h1>
            <p class="lead fw-bold">Vyberte si z přehledu moderních i klasických způsobů platby.</p>
        </div>
    </header>

    <!-- Hlavní obsah -->
    <main class="container my-5">

        <!-- Šablona pro 9 platebních metod -->
        
        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="../include/images/hotovost.jpg" class="img-fluid rounded-start h-100 object-fit-cover" alt="Hotovost">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">Hotovost: Stará dobrá klasika</h5>
                    <p class="card-text fs-5">Bankovky a mince se jako platidlo uchovaly snad nejdéle. Také aby ne, relativně skladné, jednotné a přesně naceněné kusy materiálu vyjadřují jasnou hodnotu. To že jsou v moderním světě stále s námi je ale celkem zázrak. Kdo z vás s ji stále využívá? Maximálně když jdete někam na trh, nebo když jdete do vesnické hospody. Snad jediná výhoda hotovosti je ta, že přesně víte, na čem jste. Podíváte se do peněženky, spočítáte mince a hned víte kolik můžete utratit.
                    </p>
                </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="../include/images/karta.jpg" class="img-fluid rounded-start h-100 object-fit-cover" alt="Hotovost">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">Platební karty: Peněženka ve velikosti občanky</h5>
                    <p class="card-text fs-5">Platební karty se staly symbolem pohodlí v dnešním světě. Malý kousek plastu, který nahradí hrst mincí a bankovek. Kdo by to nemiloval? Stačí přiložit, zadat PIN a platba je hotová. Ať už nakupujete kávu, nebo letenku na druhý konec světa, karta je rychlá a univerzální. Jejich kouzlo spočívá v jednoduchosti. Nemusíte počítat drobné ani nosit těžkou peněženku. Navíc s online bankovnictvím máte přehled o každé transakci hned v telefonu. Jasně, občas se může stát, že terminál zrovna „nebere“ nebo se karta někde zasekne, ale přiznejme si, kdo z nás by se dnes bez ní obešel?</p>
                </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="../include/images/telefon.jpg" class="img-fluid rounded-start h-100 object-fit-cover" alt="Hotovost">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">Mobilní platby: K čemu peněženka - stačí mobil</h5>
                    <p class="card-text fs-5">Apple Pay, Google Pay a další mobilní platby změnily způsob, jak platíme. Proč tahat peněženku, když máte vše v telefonu? Stačí přiložit mobil k terminálu, potvrdit otiskem prstu či obličejem a je to! Rychlé, bezpečné a hlavně cool. Ať už platíte za bagetu nebo lístek na koncert, mobil to zvládne raz dva. Největší výhoda? Vše máte po ruce – kartu, peníze i přehled o platbách v appce. Navíc je to bezpečnější než klasická karta, protože vaše údaje zůstávají v šifrovaném světě.</p>
                </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="../include/images/hodinky.jpg" class="img-fluid rounded-start h-100 object-fit-cover" alt="Hotovost">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">Chytré hodinky: Proč sledovat čas když můžu platit</h5>
                    <p class="card-text fs-5">Chytré hodinky posouvají placení na novou úroveň. Peněženku ani telefon už nepotřebujete! S Apple Pay, Google Pay nebo jinými službami na hodinkách stačí jen přiložit zápěstí k terminálu a během vteřiny je platba hotová. Ať už běžíte pro kávu, nebo platíte v tramvaji, hodinky to zvládnou stylově a rychle. Proč jsou tak skvělé? Jsou pohodlné, diskrétní a máte je pořád na ruce. Navíc jsou platby šifrované, takže bezpečné. Stačí si v aplikaci nastavit kartu a jde se na věc. Hodinky sice potřebují nabít a ne každý terminál je hned chytí, ale přiznejte si – platit hodinkama je prostě frajeřina.</p>
                </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="../include/images/prsten.jpg" class="img-fluid rounded-start h-100 object-fit-cover" alt="Hotovost">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">Platební wearables: Placení módním doplňkem</h5>
                    <p class="card-text fs-5">Platební náramky a platební prsteny jsou novou hvězdou mezi způsoby placení.Jsou malé, stylové a vždy po ruce! Ať už máte stylový náramek nebo elegantní prsten s NFC čipem, stačí přiložit ruku k terminálu a platba je vyřešena. Ideální na rychlý nákup v obchodě nebo třeba při sportu, když nechcete tahat telefon. Co je na nich super? Jsou lehké, nenápadné a hodí se ke každému outfitu. Přidejte si kartu do aplikace, propojte s náramkem nebo prstenem a můžete vyrazit. Ten pocit, když zaplatíte švihnutím ruky, je k nezaplacení.</p>
                </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="../include/images/qr.jpg" class="img-fluid rounded-start h-100 object-fit-cover" alt="Hotovost">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">QR kódy: Placení jedním naskenováním</h5>
                    <p class="card-text fs-5">Platby pomocí QR kódů jsou jako kouzlo moderní doby – rychlé, jednoduché a bezkontaktní! Stačí otevřít bankovní aplikaci, naskenovat QR kód na faktuře nebo účtence a potvrdit platbu. Ať už platíte v kavárně, na trhu nebo platíte faktury, QR kód to zvládne během chvilky. Co je na nich skvělé? Nemusíte nosit hotovost ani kartu, stačí telefon. Navíc jsou bezpečné, protože platbu potvrzujete vy sami v aplikaci. Ať už jde o malý nákup nebo charitativní příspěvek, QR kódy jsou univerzální.</p>
                </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="../include/images/kryptomeny.jpg" class="img-fluid rounded-start h-100 object-fit-cover" alt="Hotovost">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">Kryptoměny: Placení bez peněz</h5>
                    <p class="card-text fs-5">Kryptoměny jako Bitcoin nebo Ethereum přinesly revoluci do světa plateb. Žádná banka, žádný dohled, jen digitální peněženka a blockchain! Stačí vědět číslo peněženky, zadat částku v kryptoaplikaci a platba je na cestě. Ať už kupujete kávu předplatné na internetu nebo platíte za online služby, krypto je svoboda bez hranic. Co je na nich super? Anonymita, rychlost přeshraničních plateb a žádné prostředníky. Vše máte pod kontrolou ve své digitální peněžence.</p>
                </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="../include/images/integrovaneaplikace.jpg" class="img-fluid rounded-start h-100 object-fit-cover" alt="Hotovost">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">Integrované platby v aplikacích: zákaznická i platební karta v jednom</h5>
                    <p class="card-text fs-5">Integrované systémy, jako je Lidl Pay, přinášejí pohodlí přímo do aplikací obchodů. S Lidl Pay si v aplikaci Lidl Plus nastavíte kartu, aktivujete platbu a pak jen naskenujete QR kód u pokladny – a bum, zaplaceno! V jednom kroku navíc získáte slevy a body z věrnostního programu. Podobné systémy nabízejí i další obchody, kde aplikace spojuje platby, slevy a digitální účtenky. Vše máte v telefonu. Kartu, přehled nákupů i personalizované kupóny. Platby jsou šifrované a bezpečné, často s dvoufázovým ověřením.</p>
                </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="../include/images/cipnfc.jpg" class="img-fluid rounded-start h-100 object-fit-cover" alt="Hotovost">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title fs-4 fw-bold">NFC čipy: Platba tělem</h5>
                    <p class="card-text fs-5">NFC čipy implantované do těla jsou jako z sci-fi filmu. Malý čip pod kůží, který vám umožní platit mávnutím ruky! Čip, obvykle vložený mezi palec a ukazováček, funguje jako bezkontaktní karta. Stačí ho přiložit k terminálu, a platba je hotová. Někteří lidé je používají dokonce i k odemykání dveří nebo ukládání kontaktů. Proč je to lákavé? Je to ultra pohodlné. Žádná peněženka, žádný telefon, jen vaše ruka. Čipy jsou šifrované a biokompatibilní, takže bezpečné pro tělo i data. Přesto je třeba myslet na rizika, jako je možná infekce při implantaci.</p>
                </div>
                </div>
            </div>
        </div>

    </main>
    <?php include '../include/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
