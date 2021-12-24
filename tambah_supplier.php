<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
   $id = $_POST['ID_SUPPLIER'];
  $namasupp = $_POST['NAMA_SUPP'];
  $almtsupp= $_POST['ALMT_SUPP'];
  $tlpsupp = $_POST['TLP_SUPP'];
  $tgldtg = $_POST['TGL_DATANG'];
 
  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "INSERT INTO supplier (ID_SUPPLIER,NAMA_SUPP,ALMT_SUPP,TLP_SUPP,TGL_DATANG) VALUES ('".$id."','".$namasupp."','".$almtsupp."','".$tlpsupp."','".$tgldtg."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Supplier berhasil ditambah'); 
	window.location.href='Supplier.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Supplier gagal ditambah');
	window.location.href='Supplier.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: Supplier.php'); 
  
}