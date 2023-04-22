<?php


if(isset($_POST['username']) === true && isset($_POST['passwd']) ===  true ) {

$user = trim($_POST['username']);
$password = trim($_POST['passwd']);


require 'connect.php';

$user = $connection->query("SELECT * FROM `felhasznalok` WHERE username = '$user' AND passwd = '$password';");
$viszgalat = mysqli_fetch_array($user);


if(isset($viszgalat)){
    session_start();
    $_SESSION["admin"] = "1";
    echo("<script>window.location.href ='../../dashboard/';</script>");
}
else{
    echo("Rossz felhasználó és jelszót adott meg!");
}

} else {
    echo("Rossz felhasználó és jelszót adott meg!");
}

?>