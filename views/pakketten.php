<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pakketten - De BBQ Kar</title>
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/pakketten.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" referrerpolicy="no-referrer">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <?php include '../classes/nav.php'; ?>

    <main class="site-content">
        <section class="hero">
            <div class="hero-inner">
                <h1>Onze BBQ Pakketten</h1>
                <p>Van intieme diners tot grote evenementen — wij brengen de authentieke rooksmaak naar uw locatie.</p>
            </div>
        </section>

        <section class="packages-wrap">
            <div class="packages-grid">
                <article class="package-card">
                    <div class="package-media" style="background-image:url('../assets/images/bbq-kip.png')"></div>
                    <div class="package-body">
                        <h3>Basis</h3>
                        <p class="price">Vanaf €22,50 p.p.</p>
                        <ul>
                            <li>3 soorten ambachtelijk vlees</li>
                            <li>Houtskool & kruidenmix</li>
                            <li>Bijgerechten & sauzen</li>
                        </ul>
                        <div class="card-actions">
                            <button class="btn-outline">Bekijk Details</button>
                        </div>
                    </div>
                </article>

                <article class="package-card featured">
                    <div class="package-media" style="background-image:url('../assets/images/bbq-vlees.png')"></div>
                    <div class="package-body">
                        <span class="badge">Meest Gekozen</span>
                        <h3>Luxe</h3>
                        <p class="price">Vanaf €34,95 p.p.</p>
                        <ul>
                            <li>5 soorten premium vlees</li>
                            <li>Live carving & sauzen</li>
                            <li>Persoonlijke chef op locatie</li>
                        </ul>
                        <div class="card-actions">
                            <button class="btn-primary">Kies dit pakket</button>
                        </div>
                    </div>
                </article>

                <article class="package-card">
                    <div class="package-media" style="background-image:url('../assets/images/bbq-grill.png')"></div>
                    <div class="package-body">
                        <h3>Maatwerk</h3>
                        <p class="price">Prijs op aanvraag</p>
                        <ul>
                            <li>Volledig menu naar wens</li>
                            <li>Vegetarische opties</li>
                            <li>Dranken & bediening mogelijk</li>
                        </ul>
                        <div class="card-actions">
                            <button class="btn-outline">Vraag Offerte Aan</button>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        <section class="events-section">
            <div class="events-inner">
                <div class="events-text">
                    <h2>Grote Events & Bedrijfsfeesten</h2>
                    <p>Houdt u ook van grote en feestelijke evenementen? Of het nu gaat om bruiloften, bedrijfsborrels of festivals: wij verzorgen catering voor groepen vanaf 50 personen en kunnen alles op locatie regelen.</p>
                    <div class="stats">
                        <div class="stat">
                            <strong>500+</strong>
                            <span>Gasten</span>
                        </div>
                        <div class="stat">
                            <strong>Live</strong>
                            <span>Showcooking</span>
                        </div>
                    </div>
                    <button class="btn-primary">Plan uw Event</button>
                </div>
                <div class="events-image">
                    <img src="../assets/images/bbq-tafel.png" alt="Event tafel verlicht">
                </div>
            </div>
        </section>

        <section class="why-section">
            <h2>Waarom Kiezen Voor De BBQ Kar?</h2>
            <div class="why-grid">
                <div class="why-item">
                    <i class="fa-solid fa-fire"></i>
                    <h4>Authentiek Houtvuur</h4>
                    <p>Echt eikenhout voor die unieke rooksmaak.</p>
                </div>
                <div class="why-item">
                    <i class="fa-solid fa-handshake-simple"></i>
                    <h4>Topkwaliteit</h4>
                    <p>Samenwerking met lokale slagers en seizoensproducten.</p>
                </div>
                <div class="why-item">
                    <i class="fa-solid fa-leaf"></i>
                    <h4>Duurzaam</h4>
                    <p>Verantwoord vlees en duurzame materialen waar mogelijk.</p>
                </div>
                <div class="why-item">
                    <i class="fa-solid fa-user-tie"></i>
                    <h4>Volledige Service</h4>
                    <p>Opbouw, bediening en afhandeling — wij ontzorgen volledig.</p>
                </div>
            </div>
        </section>

    </main>

    <?php include '../classes/footer.php'; ?>
</body>

</html>
