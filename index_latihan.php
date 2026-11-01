<?php

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "kecamatan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1px' cellpadding='6' cellspacing='0'>
    <tr>
        <th>ID</th>
        <th>Kecamatan</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Luas</th>
        <th>Jumlah Penduduk</th>
    </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>"
        . $row["id"] . 
        "</td><td>" 
        . $row["kecamatan"] . 
        "</td><td>" 
        . $row["longitude"] . 
        "</td><td>" 
        . $row["latitude"] . 
        "</td><td>" 
        . $row["luas"] . 
        "</td><td align='right'>" 
        . number_format($row["jumlah_penduduk"]) . 
        "</td></tr>";
    }
    
    echo "</table>";

} else {
    echo "0 results";
}

$conn->close();
?>