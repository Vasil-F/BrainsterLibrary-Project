<?php 
require_once __DIR__ . '/../functions.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/../db/db.php';

    if($_POST['login'] == 'admin') {

    $username = $_POST['adminUsername'];
    $password = $_POST['adminPassword'];

    $sql = "SELECT * FROM admins WHERE username = :username LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);

    if ($stmt->rowCount() == 1) {
        $admin = $stmt->fetch();

        if (password_verify($password, $admin['password'])) {
            $_SESSION['username'] = $admin['username'];

            echo 'Success';
            // header(`Location:`.  base_url() . `admins.php`);
        } else {
            // $_SESSION['error'] = 'Wrong username and password combination!';

            echo 'Wrong combination';
            // header('Location: login.php');
            // die();
        }
    } else {
        // $_SESSION['error'] = 'Wrong credentials!';

        echo 'Wrong credentials';
        // header('Location: login.php');
        // die();
    }

} elseif ($_POST['login'] == 'user') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    if ($stmt->rowCount() == 1) {
        $user = $stmt->fetch();

        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['surname'] = $user['surname'];

            echo 'Success';
            // header('Location: clients.php');
        } else {
            // $_SESSION['error'] = 'Wrong email and password combination!';

            echo 'Wrong combination';
            // header('Location: login.php');
            // die();
        }
    } else {
        // $_SESSION['error'] = 'Wrong credentials!';

        echo 'Wrong credentials';
        // header('Location: login.php');
        // die();
    }
}
};

?>
