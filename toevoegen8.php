<?php
// Auteur: Wesam

// Controleer of het een POST-verzoek is
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Maak verbinding met de database
        $conn = new PDO("mysql:host=localhost;dbname=bieren", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Bereid de SQL-query voor invoegen voor
        $sql = "INSERT INTO Kroeg (naam, adres, plaats) VALUES (:naam, :adres, :plaats)";

        // Bereid de query voor
        $stmt = $conn->prepare($sql);

        // Bind parameters en voer de query uit
        $stmt->bindParam(":naam", $_POST["naam"]);
        $stmt->bindParam(":adres", $_POST["adres"]);
        $stmt->bindParam(":plaats", $_POST["adres"]);

        $status = $stmt->execute();

        // Controleer of het invoegen succesvol was
        if ($status) {
            echo "Kroeg is succesvol toegevoegd";
        } else {
            echo "Fout: Kroeg toevoegen mislukt";
        }
    } catch (PDOException $e) {
        die("Error!: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style8.css">
    <title>Kroeg Toevoegen</title>
</head>
<body>
    <h2>Kroeg Toevoegen</h2>
    <form action="toevoegen8.php" method="post">
        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam" required><br>

        <label for="adres">Adres:</label>
        <input type="text" id="adres" name="adres" required><br>

        <label for="plaats">Plaats:</label>
        <input type="text" id="plaats" name="plaats" required><br>

        <input type="submit" value="Voeg Toe">
    </form>
    <br>
    <a href="index8.php">Terug naar de lijst</a>
</body>
</html>
