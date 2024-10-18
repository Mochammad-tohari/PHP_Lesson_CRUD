<?php

include "connection.php";

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    switch ($action) {

        case 'delete':
            delete_data($id);
            break;
        default:
            echo "Aksi tidak didefinisikan";
    }

} else {
    echo "Aksi dan ID Tidak didefinisikan";
}

// ! Fungsi Delete

function delete_data($id)
{
    // echo "Ini akan menghapus data dengan ID : " . $id; mengecek id yg akan dihapus

    global $conn;
    $res = mysqli_query($conn, "DELETE FROM tb_person WHERE id = " . $id);

    if ($res) {
        // jika true
        header("Location: Page_1.php?messages=Data Berhasil Dihapus");
    } else {
        // jika false
        header("Location: Page_1.php?messages=Gagal Dihapus");
        exit();
    }
}

// ! END Fungsi Delete



?>