<?php
// Konfigurasi Database
$servername = "localhost";
$username   = "root";
$password   = ""; 
$dbname     = "kecamatan";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

// Tombol/Link untuk menuju halaman Form Input
echo "<p><a href='input/index.html' style='padding: 8px 15px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 4px;'>[+] Input Data Baru</a></p>";

if ($result && $result->num_rows > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr bgcolor='#f2f2f2'>
            <th>Kecamatan</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Luas (km²)</th>
            <th>Jumlah Penduduk</th>
          </tr>";

    // Output data dari database
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["kecamatan"]) . "</td>";
        echo "<td>" . $row["longitude"] . "</td>";
        echo "<td>" . $row["latitude"] . "</td>";
        echo "<td>" . $row["luas"] . "</td>";
        echo "<td align='right'>" . number_format($row["jumlah_penduduk"], 0, ',', '.') . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>