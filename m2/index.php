<?php
require 'config.php';
$result = mysqli_query($conn, "SELECT * FROM mhs");


// Bikin pagination
$jumlahDataPerHalaman = 4;
$jumlahData = $result->num_rows;
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$allMhs = mysqli_query($conn, "SELECT * FROM mhs  ORDER BY nim DESC LIMIT $awalData, $jumlahDataPerHalaman");

// echo "<pre>";
// var_dump($allMhs);
// echo "</pre>";
// die;

?>

<!doctype html>
<html lang="en">

<head>
  <title>Dipa</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.css" />
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script> -->

</head>

<body>
  <div class="container my-5">
    <div class="row">
      <div class="col">
        <a class="btn btn-primary" href="tambah.php">Tambah</a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="table-responsive">
          <table class="table" id="myTable">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              while ($row = mysqli_fetch_assoc($allMhs)) { ?>
                <tr>
                  <td scope="row"><?= $no; ?></td>
                  <td><?= $row['nim']; ?></td>
                  <td><?= $row['nama']; ?></td>
                  <td><?= $row['kelas']; ?></td>
                  <td><a class="btn btn-success" href="ubah.php?nim=<?= $row['nim']; ?>">Ubah</a>
                    <a class="btn btn-secondary" href="detail.php?nim=<?= $row['nim']; ?>">Detail</a>
                    <a class="btn btn-danger" href="hapus.php?nim=<?= $row['nim']; ?>">Hapus</a>
                  </td>
                </tr>
              <?php
                $no++;
              } ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

  <!-- Navigasi -->
  <section class="halaman mb-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <nav aria-label="...">
            <ul class="pagination">
              <?php if ($halamanAktif > 1) : ?>
                <li class="page-item ">
                  <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>">Previous</a>
                </li>
              <?php endif; ?>
              <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if ($i == $halamanAktif) : ?>
                  <li class="page-item active" aria-current="page">
                    <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a>
                  </li>
                <?php else : ?>
                  <li class="page-item">
                    <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a>
                  </li>
                <?php endif; ?>
              <?php endfor; ?>

              <?php if ($halamanAktif < $jumlahHalaman) : ?>
                <li class="page-item">
                  <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">Next</a>
                </li>
              <?php endif; ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir navigasi -->



  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>


  <!-- <script>
      $('#myTable').DataTable();
  </script> -->
</body>

</html>