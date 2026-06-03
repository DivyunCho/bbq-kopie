<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" referrerpolicy="no-referrer">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php include '../classes/nav.php'; ?>
    <main class="site-content">
        <div class="HomeStartContainer">
            <div class="HomeTopText">Artisan pitmasters</div>
            <div class="HomeMiddleText">Ambachtelijke BBQ op locatie</div>
            <div class="HomeBottomText">Breng de authentieke smaak van open vuur naar jouw
                feest of zakelijk evenement. Wij combineren
                vakmanschap met de fijnste lokale ingrediënten.</div>
            <div class="HomeBottomButtons">
                <a class="HomeButton1" href="boeking.php">Ontdek de pakketten</a>
                <a class="HomeButton2" href="menu.php">Bekijk fotogallerij</a>
            </div>
        </div>
        <div class="HomeMiddleContainer">
            <div class="HomeMiddleContainerImage">
                <img src="../assets/images/Barbecue.png" alt="BBQ Image">
            </div>
            <div class="HomeMiddleContainerText">
                <h2>Voor elk moment</h2>
                <div class="HomeMiddleFlexbox">
                    <i class='bx bxs-party'></i>
                    <h3>Particuliere Feesten</h3>
                </div>
                <p>Van intieme tuinfeesten tot grootschalige bruiloften, wij zorgen
                    voor een onvergetelijke culinaire ervaring die uw gasten nog
                    lang zullen herinneren.</p>
                <div class="HomeMiddleFlexbox">
                    <i class='bx bx-buildings'></i>
                    <h3>Bedrijfsbijeenkomsten</h3>
                </div>
                <p>Versterk de teamband met een stoere maar verfijnde BBQ. Wij
                    regelen alles van opbouw tot afwas, zodat u zich kunt richten
                    op uw relaties.</p>
            </div>
        </div>
        <div class="HomeBottomContainer">
            <h2>Sfeerimpressies</h2>
            <p>Een kijkje in de keuken van onze pitmasters en de sfeer op onze
                evenementen.</p>
            <div class="HomeBottomContainerImages">
                <div class="BigImage">
                    <img src="../assets/images/BBQ.png" alt="BBQ Image">
                </div>
                <div class="StackedImages">
                    <div class="SmallImage">
                        <img src="../assets/images/BBQ.png" alt="BBQ Image">
                    </div>
                    <div class="SmallImage">
                        <img src="../assets/images/BBQ.png" alt="BBQ Image">
                    </div>
                </div>
            </div>
        </div>
        <div class="HomeReviewsFlexbox">
            <div class="HomeReviewsContainer">
                <div class="HomeReviewsHeader">
                    <h1>Wat onze klanten zeggen</h1>
                    <i class='bx bxs-quote-alt-left'></i>
                </div>
                <div class="HomeReviews">
                    <div class="ReviewCard">
                        <p>"De BBQ Kar heeft ons bedrijfsfeest naar een hoger niveau getild. De kwaliteit van
                            het vlees was uitzonderlijk en de presentatie vanuit de kar is echt een spektakel
                            om te zien."</p>
                        <h3 class="ReviewName">- Sophie Jansen</h3>
                    </div>
                </div>
                <div class="HomeReviews">
                    <div class="ReviewCard">
                        <p>"Voor onze bruiloft zochten we iets informeels maar wel van hoge kwaliteit. De
                            passie van de pitmasters spatte er vanaf. Een absolute aanrader!"</p>
                        <h3 class="ReviewName">- Mark en Saskia</h3>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include '../classes/footer.php'; ?>
</body>

</html>