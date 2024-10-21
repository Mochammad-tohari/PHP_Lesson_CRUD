<?php

include "connection.php";



if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    switch ($action) {

        case 'delete':
            delete_data($id);
            break;
        case 'edit_data':
            echo "";
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


// ?fungsi edit

function edit_data($data_edit)
{

    global $conn;
    $id = $data_edit["id_person"];
    $person_nama = $conn->real_escape_string($data_edit['nama_txt']); //utk memasukan nama yg mengandung kutip contoh "Mu'adz"
    $person_ktp = $data_edit['ktp_txt'];
    $person_alamat = $data_edit['alamat_option'];
    $person_tanggal = $data_edit['date_txt'];


    //memformat tanggal
    $tanggal_baru = new DateTime($person_tanggal);
    $format_penanggalan = $tanggal_baru->format('Y-m-d');

    $query_edit = "UPDATE tb_person SET 
    nama = '$person_nama',
    ktp = '$person_ktp',
    alamat = $person_alamat,
    tgl_daftar = '$format_penanggalan'
    WHERE id = $id
    ";

    mysqli_query($conn, $query_edit);
    return mysqli_affected_rows($conn);

}

// ?fungsi edit


?>