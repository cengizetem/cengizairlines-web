<?php

session_start();
if($_SESSION["admin"] == "1") {
    echo("<script>window.location.href ='../../dashboard/';</script>");
}
?>