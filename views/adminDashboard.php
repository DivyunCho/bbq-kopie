<?php
require_once '../db/database.php';
/** @var PDO $conn */

// ── UPLOAD IMAGES ──────────────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (isset($_FILES['gallery_image']) || isset($_FILES['page_image']))) {
    $fileKey   = isset($_FILES['gallery_image']) ? 'gallery_image' : 'page_image';
    $targetDir = '../assets/images/';
    $fileCount  = count($_FILES[$fileKey]['name']);
    $isMultiple = $fileCount > 1;

    $uploadedCount = 0;
    $uploadErrors  = [];

    try {
        $stmt = $conn->prepare("INSERT INTO gallery (image) VALUES (:image)");

        for ($i = 0; $i < $fileCount; $i++) {
            $fileName = basename($_FILES[$fileKey]['name'][$i]);
            $tmpName  = $_FILES[$fileKey]['tmp_name'][$i];
            $error    = $_FILES[$fileKey]['error'][$i];

            if ($error !== UPLOAD_ERR_OK || empty($fileName)) {
                if ($error !== UPLOAD_ERR_NO_FILE) {
                    $uploadErrors[] = "Fout bij '$fileName' (Code: $error)";
                }
                continue;
            }

            $newFileName    = uniqid() . '_' . preg_replace('/[^a-zA-Z0-9.-]/', '_', $fileName);
            $targetFilePath = $targetDir . $newFileName;

            if (move_uploaded_file($tmpName, $targetFilePath)) {
                $stmt->bindValue(':image', $newFileName);
                $stmt->execute();
                $uploadedCount++;
            } else {
                $uploadErrors[] = "Kon '$fileName' niet verplaatsen.";
            }
        }

        if ($uploadedCount > 0) {
            header('Location: adminDashboard.php?status=upload_success');
        } else {
            $msg = !empty($uploadErrors) ? urlencode(implode(', ', $uploadErrors)) : 'Geen geldige bestanden.';
            header("Location: adminDashboard.php?status=upload_error&msg=$msg");
        }
        exit;

    } catch (PDOException $e) {
        header('Location: adminDashboard.php?status=db_error');
        exit;
    }
}

// ── DELETE IMAGE ───────────────────────────────────────────────────────────────
if (isset($_POST['delete_image'], $_POST['image_id'])) {
    $id = $_POST['image_id'];

    try {
        $stmt = $conn->prepare("SELECT image FROM gallery WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $img = $stmt->fetch();

        if ($img) {
            $filePath = '../assets/images/' . $img['image'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $stmt = $conn->prepare("DELETE FROM gallery WHERE id = :id");
            $stmt->execute(['id' => $id]);
        }

        header('Location: adminDashboard.php?status=delete_success');
        exit;

    } catch (PDOException $e) {
        header('Location: adminDashboard.php?status=db_error');
        exit;
    }
}

// ── STATUS MESSAGES ────────────────────────────────────────────────────────────
$message = $error = null;

if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'upload_success':
            $message = 'Afbeelding(en) succesvol geüpload!';
            break;
        case 'delete_success':
            $message = 'Afbeelding veilig verwijderd!';
            break;
        case 'upload_error':
            $extra = isset($_GET['msg']) ? ' ' . htmlspecialchars($_GET['msg']) : '';
            $error = 'Er is een fout opgetreden bij het uploaden.' . $extra;
            break;
        case 'db_error':
            $error = 'Er is een database fout opgetreden.';
            break;
    }
}

// ── FETCH GALLERY IMAGES ───────────────────────────────────────────────────────
try {
    $images = $conn->query("SELECT * FROM gallery ORDER BY id DESC")->fetchAll();
} catch (PDOException $e) {
    $images = [];
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - De BBQ Kar Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Barlow:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/adminDashboard.css">
</head>
<body>

<!-- ── SIDEBAR ──────────────────────────────────────────────────────────────── -->
<aside class="sidebar">
    <div class="sidebar-logo">De BBQ Kar</div>

    <div class="sidebar-user">
        <div class="sidebar-avatar">👤</div>
        <div class="sidebar-user-info">
            <strong>Admin Panel</strong>
            <small>Pitmaster Access</small>
        </div>
    </div>

    <ul class="sidebar-nav">
        <li><a href="dashboard.html" class="active"><span class="nav-icon">▦</span> Dashboard</a></li>
        <li><a href="gallery.php"><span class="nav-icon">🖼</span> Gallery</a></li>
        <li><a href="pakketten.php"><span class="nav-icon">✂</span> Packages</a></li>
        <li><a href="bestellingen.html"><span class="nav-icon">📋</span> Bookings</a></li>
    </ul>

    <button class="btn-new-package">+ New Package</button>

    <div class="sidebar-bottom">
        <a href="#">⚙ Settings</a>
        <a href="index.html">↪ Logout</a>
    </div>
</aside>

<!-- ── MAIN ─────────────────────────────────────────────────────────────────── -->
<div class="main">

    <!-- Topbar -->
    <div class="topbar">
        <h1>Dashboard Overview</h1>
        <div class="topbar-right">
            <span class="topbar-bell">🔔</span>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="content-grid">

            <!-- LEFT COLUMN ─────────────────────────────────────────────────── -->
            <div>

                <!-- Populaire Pakketten -->
                <div class="card">
                    <h2 class="card-title">Populaire Pakketten</h2>
                    <div class="stats-row">
                        <div class="stat-item">
                            <div class="stat-label">Pitmaster<br>Special</div>
                            <span class="stat-num">42</span>
                            <span class="stat-sub">boeking</span>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Slow &amp; Low</div>
                            <span class="stat-num">28</span>
                            <span class="stat-sub">boeking</span>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Butchers Cut</div>
                            <span class="stat-num">15</span>
                            <span class="stat-sub">boeking</span>
                        </div>
                    </div>
                </div>

                <!-- Recente Aanvragen -->
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Recente Aanvragen</h2>
                        <button class="filters-btn">⚙ Filters</button>
                    </div>
                    <p class="card-sub">Beheer je laatste binnenkomende boekingen.</p>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Klant</th>
                                <th>Datum</th>
                                <th>Pakket</th>
                                <th>Status</th>
                                <th>Actie</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class="client-name">Jeroen van Dijk</span>
                                    <span class="client-email">jeroen@example.com</span>
                                </td>
                                <td>14 Aug, 2024</td>
                                <td><span class="pkg-tag">Pitmaster Special</span></td>
                                <td>
                                    <div class="status">
                                        <span class="status-dot nieuw"></span>
                                        <span class="status-text nieuw">Nieuw</span>
                                    </div>
                                </td>
                                <td><button class="action-btn">⋮</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="client-name">Lisa Bakker</span>
                                    <span class="client-email">lisa.b@company.nl</span>
                                </td>
                                <td>22 Aug, 2024</td>
                                <td><span class="pkg-tag">Slow &amp; Low</span></td>
                                <td>
                                    <div class="status">
                                        <span class="status-dot behandeling"></span>
                                        <span class="status-text behandeling">In Behandeling</span>
                                    </div>
                                </td>
                                <td><button class="action-btn">⋮</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="client-name">Bruiloft Catering</span>
                                    <span class="client-email">events@wedding.com</span>
                                </td>
                                <td>05 Sep, 2024</td>
                                <td><span class="pkg-tag">Custom Event</span></td>
                                <td>
                                    <div class="status">
                                        <span class="status-dot bevestigd"></span>
                                        <span class="status-text bevestigd">Bevestigd</span>
                                    </div>
                                </td>
                                <td><button class="action-btn">⋮</button></td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="bestellingen.html" class="view-all">Bekijk alle aanvragen</a>
                </div>

            </div>

            <!-- RIGHT COLUMN ────────────────────────────────────────────────── -->
            <div>

                <!-- Hidden Upload Forms -->
                <form id="uploadGalForm" action="adminDashboard.php" method="POST" enctype="multipart/form-data" hidden>
                    <input type="file" id="galInput" name="gallery_image[]" accept="image/*" multiple
                           onchange="handleUpload(this, 'uploadGalForm')">
                </form>

                <form id="uploadPageForm" action="adminDashboard.php" method="POST" enctype="multipart/form-data" hidden>
                    <input type="file" id="pageInput" name="page_image[]" accept="image/*" multiple
                           onchange="handleUpload(this, 'uploadPageForm')">
                </form>

                <!-- Quick Actions -->
                <div class="action-card" onclick="document.getElementById('galInput').click();">
                    <span class="action-icon">📷</span>
                    <span class="action-title">Foto toevoegen</span>
                    <span class="action-sub">Upload naar de galerij</span>
                </div>

                <div class="action-card" onclick="window.location.href='pakketten.php'">
                    <span class="action-icon">📝</span>
                    <span class="action-title">Pakket bewerken</span>
                    <span class="action-sub">Wijzig prijzen of inhoud</span>
                </div>

                <!-- Status Messages -->
                <?php if ($message): ?>
                    <p class="status-msg success"><?= htmlspecialchars($message) ?></p>
                <?php endif; ?>
                <?php if ($error): ?>
                    <p class="status-msg error"><?= $error ?></p>
                <?php endif; ?>

                <!-- Recent Photos -->
                <?php if (!empty($images)): ?>
                    <div class="recent-photos">
                        <span class="recent-photos-label">Recente Foto's</span>
                        <div class="photo-grid">
                            <?php foreach (array_slice($images, 0, 6) as $img): ?>
                                <div class="photo-item">
                                    <img src="../assets/images/<?= htmlspecialchars($img['image']) ?>" alt="Gallery afbeelding">
                                    <form action="adminDashboard.php" method="POST"
                                          class="photo-overlay"
                                          onsubmit="return confirm('Deze foto verwijderen?');">
                                        <input type="hidden" name="image_id" value="<?= $img['id'] ?>">
                                        <button type="submit" name="delete_image" class="btn-delete" title="Verwijderen">&times;</button>
                                    </form>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-brand">
            <span class="footer-brand-name">De BBQ Kar</span>
            <p>Artisan Pitmasters.</p>
            <p>Professioneel BBQ beheer paneel voor de moderne ambachtsman.</p>
        </div>

        <div class="footer-nav">
            <h4>Navigatie</h4>
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </div>

        <div class="footer-status">
            <h4>Systeem Status</h4>
            <p><span class="system-status-dot"></span>Alle systemen operationeel.</p>
            <p>© 2024 De BBQ Kar, Artisan Pitmasters.</p>
        </div>
    </footer>

</div>

<script>
    function handleUpload(input, formId) {
        if (input.files.length > 6) {
            alert('Maximaal 6 afbeeldingen tegelijk');
            input.value = '';
        } else {
            document.getElementById(formId).submit();
        }
    }
</script>

</body>
</html>