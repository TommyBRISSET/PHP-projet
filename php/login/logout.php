<?php
session_start();
session_destroy();
$_SESSION['IsLog'] = False;
header('location: ../index.php');