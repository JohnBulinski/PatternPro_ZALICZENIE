<?php
// Łączenie z bazą danych
require_once '../backend/config/db.php';

// pobieranie formacji z bazy danych
$sql = "SELECT * FROM patterns";
$result = $conn->query($sql);

// Dzielenie formacji na (bullish) i (bearish)
$bullishPatterns = [];
$bearishPatterns = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if ($row["type"] == "bullish") {
            $bullishPatterns[] = $row;
        } else {
            $bearishPatterns[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PatternPro - Formacje Cenowe</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo-container">
                <img src="images/logo.png" alt="PatternPro Chart Guide" class="site-logo">
            </div>
            <div class="description-container">
                <h2 class="description-header">EKSPERCKIE ROZPOZNAWANIE FORMACJI CENOWYCH</h2>
                <div class="description">
                    Odkryj najpotężniejsze formacje analizy technicznej zebrane w jednym profesjonalnym narzędziu! 
                    PatternPro to starannie wyselekcjonowana biblioteka wzorców cenowych stosowanych przez 
                    doświadczonych traderów na globalnych rynkach.
                </div>
                <div class="description-features">
                    <div class="feature-item">
                        <i class="fas fa-chart-line feature-icon"></i>
                        <span>Precyzyjna identyfikacja wzorców</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-graduation-cap feature-icon"></i>
                        <span>Strategie dla wszystkich poziomów</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-database feature-icon"></i>
                        <span>Biblioteka formacji</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container">
        <section class="controls">
            <div class="search-section">
                <input type="text" id="pattern-search" placeholder="Wyszukaj formację po nazwie">
                <div id="search-error" class="error-message"></div>
            </div>
            <div class="filter-section">
                <button id="bullish-btn" class="filter-btn">Bullish</button>
                <button id="bearish-btn" class="filter-btn">Bearish</button>
                <button id="all-btn" class="filter-btn active">Wszystkie</button>
            </div>
        </section>

        <section class="patterns-grid" id="patterns-container">
            <?php foreach ($bullishPatterns as $pattern): ?>
            <div class="pattern-card bullish">
                <div class="pattern-img">
                    <?php
                    $image_path = str_replace(['.jpg', '.jpeg'], '.png', $pattern['image_path']);
                    ?>
                    <!-- Zabezpieczenie przed cyberprzestępcami (XSS) -->
                    <img src="<?php echo htmlspecialchars($image_path); ?>" alt="<?php echo htmlspecialchars($pattern['name']); ?>">
                </div>
                <h3 class="pattern-name"><?php echo htmlspecialchars($pattern['name']); ?></h3>
                <div class="pattern-description-preview">Kliknij, aby zobaczyć pełny opis formacji...</div>
                <div class="pattern-description-full">
                    <p><?php echo htmlspecialchars($pattern['description']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>

            <?php foreach ($bearishPatterns as $pattern): ?>
            <div class="pattern-card bearish">
                <div class="pattern-img">
                    <?php
                    $image_path = str_replace(['.jpg', '.jpeg'], '.png', $pattern['image_path']);
                    ?>
                    <img src="<?php echo htmlspecialchars($image_path); ?>" alt="<?php echo htmlspecialchars($pattern['name']); ?>">
                </div>
                <h3 class="pattern-name"><?php echo htmlspecialchars($pattern['name']); ?></h3>
                <div class="pattern-description-preview">Kliknij, aby zobaczyć pełny opis formacji...</div>
                <div class="pattern-description-full">
                    <p><?php echo htmlspecialchars($pattern['description']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </section>
        <div class="more-btn-container">
            <a href="more-patterns.php" class="more-btn">Więcej</a>
        </div>
    </main>

    <footer>
        <div class="container footer-container">
            <div class="footer-left">
                <a href="kontakt.php" class="footer-link">Kontakt</a>
            </div>
            <div class="footer-center">
                <p>&copy; 2025 PatternPro. Wszystkie prawa zastrzeżone.</p>
            </div>
            <div class="footer-right">
                <a href="regulamin.php" class="footer-link">Regulamin</a>
            </div>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>
