<?php
echo "HLO";
session_start();
$_SESSION['userName'] = 'kubus';
$_SESSION['fullName'] = 'Kubus Puchatek';
$_SESSION['email'] = 'kubus@stumilowylas.pl';
$_SESSION['status'] = 'ADMIN';

session_id()
?>