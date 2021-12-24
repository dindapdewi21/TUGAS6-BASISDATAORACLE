<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['ID_KASIR'];
  $namakasir = $_POST['NAMA_KASIR'];
  $ttlkasir = $_POST['TTL_KASIR'];
  $almtkasir = $_POST['ALMT_KASIR'];
  $tlpkasir = $_POST['TLP_KASIR'];
  
   // update data berdasarkan id_produk yg dikirimkan
  
	$query = "INSERT INTO kasir (ID_KASIR,NAMA_KASIR,TTL_KASIR,ALMT_KASIR,TLP_KASIR) VALUES ('".$id."','".$namakasir."','".$ttlkasir."','".$almtkasir."','".$tlpkasir."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Kasir berhasil ditambah'); window.location.href='Kasir.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Kasir gagal ditambah'); window.location.href='Kasir.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: Kasir.php'); 
}