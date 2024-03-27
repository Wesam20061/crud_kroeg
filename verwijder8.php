<?php
// Inclusief de configuratiebestanden
require_once 'kroeg.php';

try {
    // Verkrijg de kroegcode die je wilt verwijderen
    $kroegcode = $_GET['kroegcode']; // Je moet de kroegcode op de een of andere manier verkrijgen

    // Verwijder eerst gerelateerde rijen in de tabel "schenkt"
    $stmt = $conn->prepare("DELETE FROM schenkt WHERE kroegcode IN (SELECT kroegcode FROM kroeg WHERE kroegcode = :kroegcode)");
    $stmt->bindParam(':kroegcode', $kroegcode);
    $stmt->execute();

    // Verwijder daarna de gerelateerde rijen in de tabel "kroeg"
    $stmt = $conn->prepare("DELETE FROM kroeg WHERE kroegcode = :kroegcode");
    $stmt->bindParam(':kroegcode', $kroegcode);
    $stmt->execute();

    // Verwijder tenslotte de rij in de tabel "Kroeg"
    $stmt = $conn->prepare("DELETE FROM Kroeg WHERE kroegcode = :kroegcode");
    $stmt->bindParam(':kroegcode', $kroegcode);
    $stmt->execute();

    echo "Kroeg succesvol verwijderd<br><br>. <a href='index8.php'>Terug naar homepagina</a>";
} catch(PDOException $e) {
    echo "Fout bij het verwijderen van de Kroeg: " . $e->getMessage();
}

// Sluit de verbinding
$conn = null;
?>
