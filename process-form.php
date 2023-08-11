<!DOCTYPE html>
<html>
<head>
    <title>Kuchenliste submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #000428, #800080);
            padding: 50px;
            color: #fff;
        }

        h1 {
            color: #fff;
        }

    </style>
</head>
<body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$name = $_POST["Name"];

$database = new SQLite3('Kuchen.sqlite');

$sql = "CREATE TABLE IF NOT EXISTS Menschen (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    )";

$database->exec($sql);

$stmt = $database->prepare("INSERT INTO Menschen (name) VALUES (?)");
$stmt->bindValue(1, $name);

if ($stmt->execute()) {
    echo "<h1>" . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . " muss Kuchen mitbringen</h1>";
}

$database->close();
?>
</body>
</html>