<?php
   
require('../db/database.php');
$db = new Database();

$no = $_POST['no_induk'];
$id_cus = $_POST['id_cus'];

$db->query('INSERT INTO loans(no_induk, id_cus, start_date) VALUES (:no_induk, :id_cus, now())');

$db->bind(':no_induk', $no);
$db->bind(':id_cus', $id_cus);

$db->execute();

header("Location:../data_loans.php");