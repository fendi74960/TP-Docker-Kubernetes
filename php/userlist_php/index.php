<?php
// database name
$mydatabase = 'userlist';
// check the mysql connection status

// Connexion à la base de données
// $conn = new PDO('mysql:host=db;dbname='.$mydatabase.';charset=UTF8;','root', 'MYSQL_PASSWORD');
// $conn = new PDO('mysql:host=mysql;dbname='.$mydatabase.';charset=UTF8;','root', 'MYSQL_PASSWORD');
$conn = new PDO('mysql:host=mysql;dbname='.$mydatabase.';charset=UTF8;','root', file_get_contents('/run/secrets/mysql/password'));

// select all users and fetch the result
$sql = 'SELECT * FROM users';
if ($result = $conn->query($sql)) {
    while ($data = $result->fetch()) {
        $users[] = $data;
    }
}

// Then print the list of the users
echo "<h2 style=\"font-weight: bold;\">Liste des identifiant des étudiants:</h2><br>";
echo '<table><tr><th>Username</th><th>Password</th></tr>';

foreach ($users as $user) {
    echo "<tr>";
    echo "<td>".$user['username']."</td><td>".$user['password']."</td>";
    echo "</tr>";
}
echo '</table>';