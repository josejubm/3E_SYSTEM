<?php
if(!isset($_COOKIE['LOG']) || $_COOKIE['LOG'] != 1){
    header("Location: Login.php");
}