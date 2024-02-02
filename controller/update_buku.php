<?php

require('../db/database.php');
$db = new Database();

$no = $_POST['no_induk'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$subject = $_POST['subject'];
$photo = null;

//mengambil data gambar
//cek apakah gambar ada atau tidak
if (isset($_FILES['image'])) {

    //mengambil fata dari input image ke dalam variable $file
    $file = $_FILES['image']['tmp_name'];

    if ($file) {
        $photo = @base64_encode(file_get_contents($file));
    }
}

if ($photo) {
    $db->query('UPDATE books SET judul = :judul, penulis = :penulis, penerbit = :penerbit,  tahun = :tahun, subjek = :subjek, photo = :photo WHERE no_induk = :no_induk');

    $db->bind(':no_induk', $no);
    $db->bind(':judul', $judul);
    $db->bind(':penulis', $penulis);
    $db->bind(':penerbit', $penerbit);
    $db->bind(':tahun', $tahun);
    $db->bind(':subjek', $subject);
    $db->bind(':photo', $photo);
} else {
    $db->query('UPDATE books SET judul = :judul, penulis = :penulis, penerbit = :penerbit,  tahun = :tahun, subjek = :subjek WHERE no_induk = :no_induk');

    $db->bind(':no_induk', $no);
    $db->bind(':judul', $judul);
    $db->bind(':penulis', $penulis);
    $db->bind(':penerbit', $penerbit);
    $db->bind(':tahun', $tahun);
    $db->bind(':subjek', $subject);
}

$db->execute();

header("Location:../data_buku.php");