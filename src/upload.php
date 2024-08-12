<?php
require_once 'FileHandler.php';
require_once 'OscarData.php';
require_once 'OscarTableRenderer.php';

$maleFile = FileHandler::uploadFile($_FILES['maleFile'], 'uploads/');
$femaleFile = FileHandler::uploadFile($_FILES['femaleFile'], 'uploads/');

if ($maleFile && $femaleFile) {
    $maleData = FileHandler::parseCsv($maleFile);
    $femaleData = FileHandler::parseCsv($femaleFile);

    if ($maleData !== false && $femaleData !== false) {
        $oscarData = new OscarData($maleData, $femaleData);
        $overviewData = $oscarData->getOscarOverviewByYear();
        $moviesWithBothAwards = $oscarData->getMoviesWithBothAwards();
    } else {
        die("Chyba při zpracování CSV souborů.");
    }
} else {
    die("Nahrání souborů selhalo.");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Oscar Awards Results</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Oscar Awards Results</h1>
    <h2 class="mb-3">Oscar Overview by Year</h2>
    <?php 
    if (!empty($overviewData)) {
        OscarTableRenderer::renderOverviewTable($overviewData); 
    } else {
        echo "<p>Žádná data k zobrazení.</p>";
    }
    ?>

    <h2 class="mb-3 mt-5">Movies with Both Male and Female Awards</h2>
    <?php 
    if (!empty($moviesWithBothAwards)) {
        OscarTableRenderer::renderMoviesWithBothAwardsTable($moviesWithBothAwards); 
    } else {
        echo "<p>Žádné filmy s oběma oceněními.</p>";
    }
    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
