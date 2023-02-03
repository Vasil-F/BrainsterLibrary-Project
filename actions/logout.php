<?php 
require_once __DIR__ . '/../functions.php';
session_start();
notadmin();
notuser();
session_destroy();
header('Location:' . base_url() . 'dashboard.php');