<?php
// koneksi.php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['speed']) && isset($_GET['direction'])) {
        // Terima data dari NodeMCU
        $speed = $_GET['speed'];
        $direction = $_GET['direction'];

        // Contoh penyimpanan data ke database (misalnya MySQL)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "angin";

        // Buat koneksi ke database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Periksa koneksi
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query untuk memasukkan data ke dalam tabel
        $sql = "INSERT INTO wind_logs (speed, direction) VALUES ('$speed', '$direction')";

        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Parameters not set correctly";
    }
} else {
    echo "Method not allowed";
}
?>
