<!DOCTYPE html>
<html>
<head>
    <title>Menschen Tabelle</title>
    <style>
        table {
            border-collapse: collapse; /* Zellengrenzen zusammenführen */
            width: 50%; /* Tabelle auf 50% der Breite zentrieren */
            margin: auto; /* Zentrieren auf der Seite */
        }

        th, td {
            border: 1px solid black; /* Schwarzer Rand um Zellen */
            padding: 8px; /* Innenabstand der Zellen */
            text-align: left; /* Text linksbündig ausrichten */
        }

        th {
            background-color: #f2f2f2; /* Hintergrundfarbe der Überschriftenzelle */
        }
    </style>
</head>
<body>

<h2>Menschen Tabelle</h2>

<?php
try {

    $db = new SQLite3('Kuchen.sqlite'); // SQLite-Datenbank erstellen oder verbinden

    $query = 'SELECT * FROM Menschen'; // Abfrage für alle Einträge in der Tabelle Menschen

    $result = $db->query($query); // Abfrage ausführen

    echo '<table>';
    echo '<tr><th>ID</th><th>Name</th><th>Einträger</th></tr>'; // Überschriftenzeile der Tabelle

    while ($row = $result->fetchArray()) {
        $id = $row['id'];
        $name = $row['name'];
        $eintraeger = $row['eintraeger'];

        echo "<tr><td>$id</td><td>$name</td><td>$eintraeger</td></tr>"; // Datenzeile der Tabelle
    }

    echo '</table>';

    $db->close(); // Datenbankverbindung schließen
} catch (Exception $e) {

    echo 'Ein Fehler ist aufgetreten: ' . $e->getMessage();
}
?>

</body>
</html>
