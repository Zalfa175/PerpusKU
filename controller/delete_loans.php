<?php

//menambahkan class database
require('../db/database.php');
$db = new Database();

//mengambil data no menggunakan GET
$id = $_GET['id'];

//query delete
$db->query('DELETE FROM loans WHERE id = :id');

//binding
$db->bind(':id', $id);

$db->execute();

header("Location:../data_loans.php");