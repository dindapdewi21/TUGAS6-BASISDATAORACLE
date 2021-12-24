<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['ID_KUSTOMER'];
  $namakust = $_POST['NAMA_KUST'];
  $almtkust= $_POST['ALMT_KUST'];
  $tlpkust= $_POST['TLP_KUST'];

  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "INSERT INTO Kustomer (ID_KUSTOMER,NAMA_KUST,ALMT_KUST,TLP_KUST) VALUES ('".$id."','".$namakust."','".$almtkust."','".$tlpkust."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Kustomer berhasil ditambah'); window.location.href='Kustomer.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Kustomer gagal ditambah'); window.location.href='Kustomer.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: Kustomer.php'); 
}