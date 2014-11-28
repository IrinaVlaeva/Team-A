<?php
session_start();
//require("/code/config.php"); TODO: Fix config.php
$action = isset($_GET['action']) ? $_GET['action'] : "";
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$new_username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";

if (!empty($new_username)) {
    $username = $new_username;
}

if ($action != "login" && $action != "logout" && $username == "") {
    header("Location: login.php");
}
switch ($action) {
  case 'login':
    login($username, $password);
    header("Location: user.php");
    break;
  case 'logout':
    logout();
    break;
  default:
    listTests();
    break;
}

function CheckLoginInDB ($username, $password) {
    return true; // TODO: check if user in DB and password is correct
}

function login($username, $password) {
    $username = trim($username);
    $password = trim($password);
    if(!CheckLoginInDB($username,$password)) {
        return false;
    }
    $_SESSION["username"] = $username;
    return true;
}

function logout() {
    unset($_SESSION['username']);
    header("Location: login.php");
}

function listTests() {
    include "header.php";
    echo "You've logged as " . $_SESSION['username'];
}

?>

<?php include "footer.php"; ?>