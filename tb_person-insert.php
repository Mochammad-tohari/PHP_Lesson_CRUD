<?php

include "connection.php";

// Megambil data dari tb_alamat yang ada di database
$data_alamat = queryku("SELECT * FROM tb_alamat");

// var_dump($data_alamat);

if (isset($_POST['person_submit_button'])) {
    $person_nama = $_POST['nama_txt'];
    $person_ktp = $_POST['ktp_txt'];
    $person_alamat = $_POST['alamat_option'];
    $person_tanggal = $_POST['date_txt'];

    var_dump($_POST);


    //memformat tanggal
    $tanggal_baru = new DateTime($person_tanggal);
    $format_penanggalan = $tanggal_baru->format('Y-m-d');

    //insert
    $insert_query = "INSERT INTO tb_person
    VALUE (null, '$person_nama', '$person_ktp', $person_alamat, '$format_penanggalan')";


    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        //jika berhasil
        header("Location: ./Page_1.php");
        exit();
    } else {
        // gagal
        $error = "Data gagal dimasukan";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert tb_person</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <h3 class="mt-4 mb-2">Formulir</h3>
                    <a href="./Page_1.php" class="d-block mb-4">Kembali</a>

                    <?php if (isset($error)): ?>
                        <p>
                            <?php echo $error ?>
                        </p>
                    <?php endif; ?>

                    <!-- Card -->
                    <div class="card">

                        <form method="POST">

                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="nama_txt">Nama : </label>
                                    <input class="form-control" type="text" name="nama_txt" id="nama_txt"
                                        placeholder="Nama Anda" autocomplete="off">
                                </div>

                                <div class="mb-3">
                                    <label for="ktp_txt">Nomor KTP : </label>
                                    <input class="form-control" type="text" name="ktp_txt" id="ktp_txt"
                                        placeholder="ktp Anda" autocomplete="off">
                                </div>

                                <div class="mb-3">
                                    <label for="date_txt">Tanggal </label>
                                    <input class="form-control" type="date" name="date_txt" id="date_txt"
                                        autocomplete="off">
                                </div>

                                <div class="mb-3">
                                    <label for="alamat_option">Pilih Alamat</label>
                                    <select class="form-select" name="alamat_option" id="alamat_option" required>
                                        <option value="" selected disabled>Silahkan pilih alamat</option>
                                        <?php foreach ($data_alamat as $alamat_option): ?>
                                            <option value="<?php echo $alamat_option['id']; ?>">
                                                <?php echo $alamat_option['alamat']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary"
                                        name="person_submit_button">Simpen</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- End Card -->

                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

<footer>

</footer>

</html>