<?php

//menambahkan class database
require('../db/database.php');
$db = new Database();

//mengambil data no menggunakan GET
$username = $_GET['username'];

//query delete
$db->query('DELETE FROM admins WHERE username = :username');

//binding
$db->bind(':username', $username);

$db->execute();

header("Location:../data_admin.php");