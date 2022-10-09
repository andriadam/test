<?php
require 'config.php';

$mhs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM mhs WHERE nim=$_GET[nim]"));

// echo "<pre>";
// var_dump($mhs);
// echo "</pre>";
// die;

if ($_POST) {
  if (mysqli_query($conn, "UPDATE mhs SET nama='$_POST[nama]', kelas='$_POST[kelas]' WHERE nim='$_GET[nim]'")) {
    echo "<script>
            alert('Mahasiswa Berhasil diubah')
            document.location.href='index.php'
          </script>";
  } else {
    echo "<script>
            alert('Mahasiswa Gagal diubah')
            document.location.href='index.php'
          </script>";
  }
  // header('Location: index.php');
  // die;
}

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
        <form action="" method="post">
          <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" name="nim" id="" value="<?= $mhs['nim']; ?>" aria-describedby="helpId" placeholder="" disabled readonly>
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="" value="<?= $mhs['nama']; ?>" aria-describedby="helpId" placeholder="" autofocus>
          </div>
          <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" class="form-control" name="kelas" id="" value="<?= $mhs['kelas']; ?>" aria-describedby="helpId" placeholder="">
          </div>
          <button type="submit" class="btn btn-primary">Ubah Data</button>
        </form>
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