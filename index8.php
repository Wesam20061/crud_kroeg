<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style8.css">
</head>
<body>

<div class='center-button'><a href='toevoegen8.php'> Kroeg toevoegen</a></div>";
   
</body>
</html> 

 
 
 
<?php
//conect database
include "kroeg.php";
 
//maak een query
$sql = "SELECT * FROM Kroeg";
//prepare  query
$stmt = $conn->prepare($sql);
//uitvoeren
$stmt->execute();
//ophalen alle data
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
 
echo "<br>";
echo "<h1 class='center-text2'>Kroeg</h1>";
 
//print de data in een rij
echo "<table border=1px class='center-table'>";

 
echo "<tr>
<th>naam</th>
<th>adres</th>
<th>plaats</th>
<th>edit</th>
<th>kroegcode</th>
<th>delete</th>
</tr>
";
 
foreach ($result as $row) {
    echo "<tr>";
    echo "<td>" . $row['naam'] . "</td>";
    echo "<td>" . $row['adres'] . "</td>";
    echo "<td>" . $row['plaats'] . "</td>";
    echo "<td><a href='wijzig8.php?kroegcode=" . $row['kroegcode'] . "'>" . "wijzig</a></td>";
    echo "<td>". $row['kroegcode'] . "</td>";
    echo "<td><a href='verwijder8.php?kroegcode=" . $row['kroegcode'] . "'>" . "verwijder</a></td>";
    echo "</tr>"; // Add the missing closing </tr> tag
}
echo "</table>";


?>


