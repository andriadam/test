<?php
require 'config.php';

if (mysqli_query($conn, "DELETE FROM mhs WHERE nim=$_GET[nim]")) {
  echo "<script>
  alert('Mahasiswa berhasil dihapus!')
  document.location.href='index.php'
</script>";
} else {
  echo "<script>
  alert('Mahasiswa Gagal dihapus!')
  document.location.href='index.php'
</script>";
}
