<?php

// variable yang wajib (penting) pada connection
$hostname = 'localhost';
$user = 'root';
$password = '';
$database_name = 'db_warga';

// membuat global variable bernama $conn
$conn = mysqli_connect($hostname, $user, $password, $database_name);

// Mengecek koneksi database
// var_dump($conn);


// mengambil data (fetching)
/** ada beberapa jenis fetch
 * mysqli_fetch_row()
 * mysqli_fetch_assoc()
 * mysqli_fetch_array()
 * mysqli_fetch_object()
 */

function queryku($query)
{

    global $conn;
    $res = mysqli_query($conn, $query);
    $returns = [];

    while ($data = mysqli_fetch_assoc($res)) {

        $returns[] = $data;

    }

    return $returns;

}

if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}




?>