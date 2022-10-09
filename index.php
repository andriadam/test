<?php
$conn = mysqli_connect("localhost", "root", "", "test");
$result = mysqli_query($conn, "SELECT * FROM mhs ORDER BY id DESC");



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
    <div class="row text-end mb-3">
      <div class="col">
        <a href="tambah.php" class="btn btn-primary">Tambah</a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <td><?= $no; ?>.</td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['email']; ?></td>
                <td>
                  <a href="ubah.php?id=<?= $row['id']; ?>" class="btn btn-warning">Ubah</a>
                  <a href="hapus.php?id=<?= $row['id']; ?>" onclick="confirm('Are You Sure?')" class="btn btn-danger">Hapus</a>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>