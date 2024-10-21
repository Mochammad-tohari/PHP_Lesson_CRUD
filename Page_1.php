<?php
include "connection.php";

/**
 *  $data = queryku("SELECT per.id, per.nama, per.ktp, per.tgl_daftar, adr.alamat 
* FROM tb_person as per 
* JOIN tb_alamat as adr 
* ON per.alamat = adr.id");
*tb_person as per 'as' adalah alias utk mempersingkat nama table

 */

$data = queryku("SELECT per.id, per.nama, per.ktp, per.tgl_daftar, adr.alamat 
FROM tb_person as per 
JOIN tb_alamat as adr 
ON per.alamat = adr.id");

// var_dump($data);

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <section>


        <!-- Container -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- table data -->

                    <h3 class="mb-4">Data RW Bajuri</h3>

                    <a href="tb_person-insert.php" class="btn btn-success">Tambah Data + </a>

                    <?php if (isset($_GET['messages'])): ?>
                        <p color="red">
                            <?php echo $_GET['messages']; ?>
                        </p>
                    <?php endif; ?>

                    <table class="table">

                        <thead>
                            <tr>
                                <th scope="col">Nomor</th>

                                <th scope="col">Nama</th>
                                <th scope="col">KTP</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tanggal Daftar</th>

                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <!-- $data diambil dari $data di tag php atas
                             ($data as $row) $data di aliaskan sebagai $row
                             $row nanti akan dipanggil di bawah row table
                            -->
                            <?php

                            $nomor_urut = 1;

                            foreach ($data as $row):

                                ?>


                                <tr>
                                    <td> <?php echo $nomor_urut++ . "." ?> </td>

                                    <td><?php echo $row["nama"] ?></td>
                                    <td><?php echo $row["ktp"] ?></td>
                                    <td><?php echo $row["alamat"] ?></td>
                                    <td><?php echo $row["tgl_daftar"] ?></td>

                                    <td>
                                        <a href="tb_person-edit.php?id=<?php echo $row["id"] ?>"
                                            class="btn btn-primary">Edit</a>
                                        <a href="function.php?action=delete&id=<?php echo $row["id"] ?>"
                                            class="btn btn-outline-danger"
                                            onClick="return confirm ('Hapus Ga nih ?')">Hapus</a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>


                    </table>


                    <!-- end table data -->
                </div>
            </div>
        </div>
        <!-- End Container -->


    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

<footer>

</footer>

</html>