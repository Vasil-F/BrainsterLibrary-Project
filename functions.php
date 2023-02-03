<?php
require_once __DIR__ . '/consts.php';

function admin() {
    if(isset($_SESSION['username'])) {
        header('Location:' . base_url() . 'admins/admins.php');
    }
}

function notadmin() {
    if(!isset($_SESSION['username'])) {
        header('Location:' . base_url() . 'dashboard.php');
    }
}

function user() {
    if(isset($_SESSION['email'])) {
        header('Location:' . base_url() . 'users/users.php');
    }
}

function notuser() {
    if(!isset($_SESSION['email']) && !isset($_SESSION['id'])) {
        header('Location:' . base_url() . 'dashboard.php');
    }
}

function base_url() {
    return APP_URL;
}