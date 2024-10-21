<?php

$_GET["action"] ="edit_data";

include "function.php";

$id_person = $_GET['id'];

$data_person = queryku("SELECT * FROM tb_person WHERE id = $id_person");

// var_dump($data_person);

// Megambil data dari tb_alamat yang ada di database
$data_alamat = queryku("SELECT * FROM tb_alamat");

// var_dump($data_alamat);

if(isset($_POST["submit_edit_button"])){ 

    if(edit_data($_POST) > 0){
        echo 
        "<script> alert('Data Berhasil Diubah');
        document.location.href = './Page_1.php';
        </script>";
    } else {
        "<script> alert('Data Gagal Diubah');
        </script>";
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

                    <h3 class="mt-4 mb-2">Formulir Edit</h3>
                    <a href="./Page_1.php" class="d-block mb-4">Kembali</a>

                    <?php if (isset($error)): ?>
                        <p>
                            <?php echo $error ?>
                        </p>
                    <?php endif; ?>

                    <!-- Card -->
                    <div class="card">

                        <form method="POST">

                        <input type="hidden" value="<?php echo $id_person ?>" name="id_person" />

                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="nama_txt" style="mb-2" >Nama : </label>
                                    <input class="form-control" type="text" name="nama_txt" id="nama_txt"
                                        placeholder="Nama Anda" autocomplete="off"
                                        value="<?php echo $data_person[0]['nama'] ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="ktp_txt" style="mb-2" >Nomor KTP : </label>
                                    <input class="form-control" type="text" name="ktp_txt" id="ktp_txt"
                                        placeholder="ktp Anda" autocomplete="off"
                                        value="<?php echo $data_person[0]['ktp'] ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="date_txt" style="mb-2" >Tanggal </label>
                                    <input class="form-control" type="date" name="date_txt" id="date_txt"
                                        autocomplete="off" value="<?php echo $data_person[0]['tgl_daftar'] ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="alamat_option" style="mb-2" >Pilih Alamat</label>
                                    <select class="form-select" name="alamat_option" id="alamat_option" required>
                                        <option value="" selected disabled>Silahkan pilih alamat</option>
                                        <?php foreach ($data_alamat as $alamat_option): ?>
                                            <option
                                                value="<?= $alamat_option['id'] ?>" <?php echo ($data_person[0]['alamat'] === $alamat_option['id'] ? 'selected' : ''); ?>>
                                                <?php echo $alamat_option['alamat']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary"
                                        name="submit_edit_button">Simpen</button>
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
        crossorigin="anonymous"></>

</body>

<footer>

</footer>

</html>