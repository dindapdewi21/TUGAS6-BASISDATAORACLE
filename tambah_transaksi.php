<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
  $id = $_POST['ID_TRANSAKSI'];
  $idkasr = $_POST['ID_KASIR'];
  $idkust= $_POST['ID_KUSTOMER'];
  $tgltrns = $_POST['TGL_TRANSAKSI'];
  $namatrns = $_POST['NAMA_TRANSAKSI'];
  $hargatrns = $_POST['HARGA_TRANSAKSI'];
  $jmlhbrg = $_POST['JMLH_BRG'];
  $totalbyr = $_POST['TOTAL_PEMBAYARAN'];
 
  
  // update data berdasarkan id_produk yg dikirimkan
  
	$query = "INSERT INTO transaksi (ID_TRANSAKSI,ID_KASIR,ID_KUSTOMER,TGL_TRANSAKSI,NAMA_TRANSAKSI,HARGA_TRANSAKSI,JMLH_BRG,TOTAL_PEMBAYARAN) VALUES ('".$id."','".$idkasr."','".$idkust."','".$tgltrns."','".$namatrns."','".$hargatrns."','".$jmlhbrg."','".$totalbyr."')";
	$statement = oci_parse($koneksi,$query);
	$r = oci_execute($statement,OCI_DEFAULT);
	 $res = oci_commit($koneksi);
  if ($res) {
    // pesan jika data berubah
    echo "<script>alert('Data Transaksi berhasil ditambah'); 
	window.location.href='Transaksi.php'</script>";
  } else {
    // pesan jika data gagal diubah
    echo "<script>alert('Data Transaksi gagal ditambah'); 
	window.location.href='Transaksi.php'</script>";
  }
} else {
  // jika coba akses langsung halaman ini akan diredirect ke halaman index
  header('Location: Transaksi.php'); 
}