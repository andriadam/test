<?php
$conn = mysqli_connect("localhost", "root", "", "test");

$mhs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM mhs where id=$_GET[id]"));

if ($_POST) {
  mysqli_query($conn, "UPDATE mhs set nama='$_POST[nama]', email='$_POST[email]' WHERE id = $_POST[id]");
  header("Location: index.php");
  die;
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.css" />

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>

  <div class="container my-5">
    <div class="row text-center mb-3">
      <div class="col">
        <h1>Ubah Data</h1>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-8">
        <form action="" method="post">
          <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs['nama']; ?>">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email </label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $mhs['email']; ?>">
          </div>
          <button type="submit" class="btn btn-primary">Ubah Data</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>