# TheCakeProject

!Achtung Datenschutztechnisch ganz schwierig!

WebServer zur Führung der Kuchenliste, wenn mal wieder jemand vergisst seinen Computer zu sperren

Getestet auf Apache2.
Benötigt php und sqlite3 damit es funktioniert.

input.html dient zu HTML Eingabe, die Eingabe wir anschließend an process-form.php übergeben.
process-form erstellt eine SQLite Datenbank und die benötigte Tabelle, sofern noch keine existiert.
output.php loopt einfach durch alle Datenbankeinträge und zeigt diese in Tabellenform an.
