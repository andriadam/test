<?php
require 'config.php';

$mhs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM mhs,krs WHERE mhs.nim=krs.mhs_nim AND nim=$_GET[nim]"));

// echo "<pre>";
// var_dump($mhs);
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
</head>

<body>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-5">
        <table class="table">
          <thead>
            <tr class="text-center">
              <th colspan="2">Detail</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($mhs) { ?>
              <tr>
                <td>NIM</td>
                <td><?= $mhs['nim']; ?></td>
              </tr>
              <tr>
                <td>Nama</td>
                <td><?= $mhs['nama']; ?></td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td><?= $mhs['kelas']; ?></td>
              </tr>
              <tr>
                <td>Semester</td>
                <td><?= $mhs['semester']; ?></td>
              </tr>
              <tr>
                <td>Jumlah_sks</td>
                <td><?= $mhs['jumlah_sks']; ?></td>
              </tr>
            <?php } else { ?>
              <tr>
                <td colspan="2">Tidak Ada KRS</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
  </div>



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