<!DOCTYPE html>
<html>
<head>
    <title>Kuchenliste Eintrag</title>
    <style>
        body {
            font-family: Arial, sans-serif; /* Text in Arial oder ähnlich */
            background: linear-gradient(to right, #000428, #800080); /* Schicker Farbverlauf */
            padding: 50px; /* Abstand zum Rand */
            color: #fff; /* Textfarbe ist weiß */
        }

        h1 {
            color: #fff; /* Überschriftstext ebenfalls weiß */
        }

    </style>
</head>
<body>
<?php
ini_set('display_errors', 1); // Fehler auf der Seite anzeigen
ini_set('display_startup_errors', 1); // Startfehler auf der Seite anzeigen
error_reporting(E_ALL); // Alle Arten von Fehlern anzeigen

$name = $_POST["Name"]; // "Name" aus Formular erhalten
$currentTime = time(); // Aktuelle Zeit in Sekunden erhalten

$database = new SQLite3('Kuchen.sqlite'); // SQLite-Datenbank erstellen oder verbinden, wenn vorhanden

$sql = "CREATE TABLE IF NOT EXISTS Menschen (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    timestamp INTEGER
    )";

$database->exec($sql); // SQL-Anweisung ausführen

$stmt = $database->prepare("INSERT INTO Menschen (name, timestamp) VALUES (?,?)"); // SQL-Anweisung für Einfügen vorbereiten
$stmt->bindValue(1, $name); // Name an Parameter binden
$stmt->bindValue(2, $currentTime, SQLite3_INTEGER); // Aktuelle Zeit an Parameter binden

if ($stmt->execute()) { // Wenn Anweisung erfolgreich ausgeführt wird
    echo "<h1>" . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . " muss Kuchen mitbringen</h1>"; // Nachricht mit Name anzeigen
}

$database->close(); // Datenbankverbindung schließen
?>
</body>
</html>
