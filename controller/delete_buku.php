<?php

//menambahkan class database
require('../db/database.php');
$db = new Database();

//mengambil data no menggunakan GET
$no = $_GET['no'];

//query delete
$db->query('DELETE FROM books WHERE no_induk = :no_induk');

//binding
$db->bind(':no_induk', $no);

$db->execute();

header("Location:../data_buku.php");