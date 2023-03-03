<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM branches where id = " . $_GET['id'])->fetch_array();
// $qry2 = $conn->query("SELECT firstname, lastname, email, password FROM users where branch_id = " . $_GET['id'])->fetch_array();
// $arr = array_merge($qry1, $qry2);
foreach ($qry as $k => $v) {
    $$k = $v;
}
include 'new_franchise.php';
?>