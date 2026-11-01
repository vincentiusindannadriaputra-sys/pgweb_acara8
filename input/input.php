<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Mengambil nilai input dari form
    $kecamatan       = trim($_POST['kecamatan'] ?? '');
    $longitude       = $_POST['longitude'] ?? 0;
    $latitude        = $_POST['latitude'] ?? 0;
    $luas            = $_POST['luas'] ?? 0;
    $jumlah_penduduk = $_POST['jumlah_penduduk'] ?? 0;

    // Konversi tipe data
    $longitude       = (float) str_replace(',', '.', $longitude);
    $latitude        = (float) str_replace(',', '.', $latitude);
    $luas            = (float) str_replace(',', '.', $luas);
    $jumlah_penduduk = (int) $jumlah_penduduk;

    // Konfigurasi Database
    $servername = "localhost";
    $username   = "root";
    $password   = ""; 
    $dbname     = "kecamatan";

    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Mengisi kolom kecamatan, longitude, latitude, luas, dan jumlah_penduduk
    $sql = "INSERT INTO penduduk (kecamatan, longitude, latitude, luas, jumlah_penduduk)
            VALUES ('$kecamatan', $longitude, $latitude, $luas, $jumlah_penduduk)";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        // Kembali ke halaman index.php di luar folder input
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>