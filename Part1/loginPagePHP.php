<?php
session_start();
session_unset();
session_destroy();
session_start();
$aerrors = "";
$uerrors = "";
$errors = "";
function checkText($text)
{
    if (strlen($text) == 0) {
        return 0;
    }
    return 1;
}
function checkPassword($pass)
{
    if (strlen($pass) < 8  || !(preg_match("/[A-Z]/", $pass))) {
        return 0;
    }
    return 1;
}
if (isset($_GET['logout']) and !empty($_GET['logout'])) {
    $logout = "you have logged out!";
    session_unset();
    session_destroy();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../connect.php';
    if (isset($_POST['username'])) {
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['upass']);
        $fname = addslashes($_POST['ufname']);
        $minit = addslashes($_POST['uminit']);
        $lname = addslashes($_POST['ulname']);
        if (checkText($username) == 0 || !preg_match("/@/", $username)||preg_match("/ /", $username)) {
            $uerrors .= "<br /> please enter valid username should contain @ character";
        }
        if (checkText($fname) == 0 || (strlen($minit) != 1) || checkText($lname) == 0) {
            $uerrors .= "<br /> please enter valid name";
        }
        if (checkPassword($password) == 0) {
            $uerrors .= "<br /> please enter valid password at least from 8 characters and 1 uppercase letter";
        }
        if (strlen($uerrors) == 0) {
            $sql = "insert into users (username,fname,minit,lname,password) values
            ('$username','$fname','$minit','$lname','$password')";
            $Insertion = mysqli_query($connect, $sql);
            if ($Insertion) {
                $_SESSION['username'] = $username;
                header('Location:../Part2/homepage.php');
                #header('Location:bookPage.php?book=12344');
            }
            $uerrors .= "<br /> This username already exists";
        }
    } else if (isset($_POST['username/handle'])) {
        $username_handle = addslashes($_POST['username/handle']);
        $password = addslashes($_POST['password']);
        $sqlAuthor = "SELECT * FROM author WHERE handle='$username_handle' and password='$password'";
        $selectFromAuthors = mysqli_query($connect, $sqlAuthor);
        $data = mysqli_fetch_assoc($selectFromAuthors);
        if ($data) {
            $_SESSION['handle'] = $username_handle;
            header('Location:../Part2/homepage.php');
            #header('Location:bookPage.php?book=12344');
        }
        $sqlUser = "SELECT * FROM users WHERE username='$username_handle' and password='$password'";
        $selectFromUsers = mysqli_query($connect, $sqlUser);
        $data = mysqli_fetch_assoc($selectFromUsers);
        if ($data) {
            $_SESSION['username'] = $username_handle;
            header('Location:../Part2/homepage.php?T='.$username_handle);
        }
    }
}
