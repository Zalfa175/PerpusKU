<?php

//menambahkan class database
require('../db/database.php');
$db = new Database();

//mengambil data no menggunakan GET
$id_cus = $_GET['id_cus'];

//query delete
$db->query('DELETE FROM customers WHERE id_cus = :id_cus');

//binding
$db->bind(':id_cus', $id_cus);

$db->execute();

header("Location:../data_customer.php");