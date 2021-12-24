<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['ID_BARANG'];
  $idsupp = $_POST['ID_SUPPLIER'];
  $namabrg = $_POST['NAMA_BRG'];
  $jenisbrg = $_POST['JENIS_BRG'];
  $hargabrg = $_POST['HARGA_BRG'];
  $jmlhstok = $_POST['JMLH_STOK'];
  $tglkadaluarsa = $_POST['TGL_KADALUARSA'];
  
   // update data berdasarkan id_produk yg dikirimkan
  
	$query = "INSERT INTO barang (ID_BARANG,ID_SUPPLIER,NAMA_BRG,JENIS_BRG,HARGA_BRG,JMLH_STOK,TGL_KADALUARSA) VALUES ('".$id."','".$idsupp."','".$namabrg."','".$jenisbrg."','".$hargabrg."','".$jmlhstok."','".$tglkadaluarsa."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Barang berhasil ditambah'); 
	window.location.href='Barang.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Barang gagal ditambah'); 
	window.location.href='Barang.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: Barang.php'); 
}