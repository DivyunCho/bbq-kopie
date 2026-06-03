<?php
require_once '../db/database.php';
/** @var PDO $conn */
try {
    $images = $conn->query("SELECT * FROM gallery ORDER BY id DESC")->fetchAll();
}
catch (PDOException $e) {
    $images = []; // Fallback empty array als database nog niet bestaat
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotogalerij</title>
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/gallery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" referrerpolicy="no-referrer">
</head>
<body>
    <?php include '../classes/nav.php'; ?>
    
    <main class="site-content">
        <section class="gallery-hero">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1>Onze Beleving in Beeld</h1>
                <p>Geniet van de rauwe, ambachtelijke en vuurrijke beleving die de BBQ Kar te bieden heeft.</p>
            </div>
        </section>

        <section class="gallery-section">
            <div class="gallery-grid">
                <?php if (count($images) > 0): ?>
                    <?php 
                    $classes = ['large-left', 'tall-right', 'small', 'small', 'wide-bottom'];
                    $classIndex = 0;
                    foreach ($images as $img): 
                        $class = $classes[$classIndex % count($classes)];
                        $classIndex++;
                    ?>
                        <div class="gallery-item <?= $class ?>">
                            <img src="../assets/images/<?= htmlspecialchars($img['image']) ?>" alt="Galerij foto">
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Row 1 -->
                    <div class="gallery-item large-left">
                        <img src="../assets/images/bbq-vlees.png" alt="vlees">
                    </div>
                    <div class="gallery-item tall-right">
                        <img src="../assets/images/bbq-kip.png" alt="kip">
                    </div>
                    <!-- Row 2 -->
                    <div class="gallery-item small">
                        <img src="../assets/images/bbq-kip2.png" alt="Grill">
                    </div>
                    <div class="gallery-item small">
                        <img src="../assets/images/vuur.png" alt="vuurkorf">
                    </div>
                    <!-- Row 3 -->
                    <div class="gallery-item wide-bottom">
                        <img src="../assets/images/bbq-tafel.png" alt="tafel">
                    </div>
                    <div class="gallery-item small-bottom">
                        <img src="../assets/images/bbq-vlees2.png" alt="bbqvlees">
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <?php include '../classes/footer.php'; ?>
</body>
</html>
