<?php
session_start();
require 'includes/db.php';
session_destroy();

header('location:login.php');

?>