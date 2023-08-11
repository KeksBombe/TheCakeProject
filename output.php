<!DOCTYPE html>
<html>
<head>
    <title>Menschen Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Menschen Table</h2>

<?php
try {

    $db = new SQLite3('Kuchen.sqlite');

    $query = 'SELECT * FROM Menschen';

    $result = $db->query($query);

    echo '<table>';
    echo '<tr><th>ID</th><th>Name</th></tr>';

    while ($row = $result->fetchArray()) {
        $id = $row['id'];
        $name = $row['name'];

        echo "<tr><td>$id</td><td>$name</td></tr>";
    }

    echo '</table>';

    $db->close();
} catch (Exception $e) {

    echo 'An error occurred: ' . $e->getMessage();
}
?>

</body>
</html>
