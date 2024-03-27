<?php
if (isset($_GET['kroegcode'])) {
    echo " kroegcode is gezet <br>";

    // Maak verbinding met de database
    include "kroeg.php";

    // Controleer of het formulier is ingediend
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Werk het record bij
        $sql = "UPDATE Kroeg SET naam = :naam, adres = :adres, plaats = :plaats WHERE kroegcode = :kroegcode";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ":naam" => $_POST['naam'],
            ":adres" => $_POST['adres'],
            ":plaats" => $_POST['plaats'],
            ":kroegcode" => $_GET['kroegcode']
        ]);
        echo "Record succesvol bijgewerkt!";
    }

    // Haal de gegevens op
    $sql = "SELECT * FROM kroeg WHERE kroegcode = :kroegcode";
    $stmt = $conn->prepare($sql);
    $stmt->execute([":kroegcode" => $_GET['kroegcode']]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Toon het formulier
    ?>
    <form method="POST">
        <label for="naam">naam:</label>
        <input type="text" name="naam" value="<?php echo $result['naam']; ?>"><br>

        <label for="adres">Adres:</label>
        <input type="text" name="adres" value="<?php echo $result['adres']; ?>"><br>


        <label for="plaats">land:</label>
        <input type="text" name="plaats" value="<?php echo $result['plaats']; ?>"><br>

        <input type="submit" value="Update">
    </form>
    <a href="index8.php">Terug naar de lijst</a>
    <?php
}
?>