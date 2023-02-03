<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once __DIR__ . '/../db/db.php';

    $sqlUsers = "SELECT email FROM users WHERE 1";
    $stmtUsers= $pdo->prepare($sqlUsers);
    $stmtUsers->execute();

    $flag = true;

    $name = $_POST['nameRegister'];
    $surname = $_POST['surnameRegister'];
    $email = $_POST['emailRegister'];
    $password = password_hash($_POST['passwordRegister'], PASSWORD_BCRYPT);

    if (
        empty($_POST['nameRegister']) || empty($_POST['surnameRegister']) || empty($_POST['emailRegister']) || empty($_POST['passwordRegister'])
    ) {
        $flag = false;
        // $_SESSION['error'] = 'All fields are required!';
        echo 'All fields required';
        // header('Location: login.php');
        // die();
    };

    while ($users = $stmtUsers->fetch()) {
        if ($_POST['emailRegister'] == $users['email']) {
            $flag = false;
            // $_SESSION['error'] = 'A user with that email already exists';
            echo 'User already exists';
            // header('Location: login.php');
            // die();
        }
    };

    if ($flag) {

    $sql = "INSERT INTO users (name, surname, email, password) VALUES (:name, :surname, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(
        [
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'password' => $password
        ]
    );
    // $_SESSION['success'] = 'Registration successful. You can now log in!';
        echo 'Success';
            // header('Location: login.php');
};

};
