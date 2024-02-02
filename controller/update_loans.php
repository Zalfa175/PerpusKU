<?php

require('../db/database.php');
$db = new Database();

$id = $_POST['id'];
$no = $_POST['no_induk'];
$id_cus = $_POST['id_cus'];

$db->query('UPDATE loans SET no_induk = :no_induk, id_cus = :id_cus WHERE id = :id');

$db->bind(':id', $id);
$db->bind(':no_induk', $no);
$db->bind(':id_cus', $id_cus);

$db->execute();

header("Location:../data_loans.php");