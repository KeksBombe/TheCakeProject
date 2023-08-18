<!DOCTYPE html>
<html>
<head>
    <title>Kuchenliste Eintrag</title>
</head>
<body>
<?php
ini_set('display_errors', 1); // Fehler auf der Seite anzeigen
ini_set('display_startup_errors', 1); // Startfehler auf der Seite anzeigen
error_reporting(E_ALL); // Alle Arten von Fehlern anzeigen

$name = $_POST["Name"]; // "Name" aus Formular erhalten
$eintrager = $_POST["eintraeger"];
$currentTime = time(); // Aktuelle Zeit in Sekunden erhalten

$database = new SQLite3('Kuchen.sqlite'); // SQLite-Datenbank erstellen oder verbinden, wenn vorhanden

$sql = "CREATE TABLE IF NOT EXISTS Menschen (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    eintrager TEXT NOT NULL,
    timestamp INTEGER
    )";

$database->exec($sql); // SQL-Anweisung ausführen

$stmt = $database->prepare("INSERT INTO Menschen (name, eintrager, timestamp) VALUES (?,?,?)"); // SQL-Anweisung für Einfügen vorbereiten
$stmt->bindValue(1, $name); // Name an Parameter binden
$stmt->bindValue(2, $eintrager); //Einträger wird ebenfalls gespeichert
$stmt->bindValue(3, $currentTime, SQLite3_INTEGER); // Aktuelle Zeit an Parameter binden

if ($stmt->execute()) { // Wenn Anweisung erfolgreich ausgeführt wird
    echo "<h1>" . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . " muss Kuchen mitbringen</h1>"; // Nachricht mit Name anzeigen
}

$database->close(); // Datenbankverbindung schließen
?>
</body>
</html>
