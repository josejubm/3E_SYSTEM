<?php

if (isset( $_SESSION["user"]) &&  $_SESSION["user"] = $user){
    header("Location: Escritorio.php");
} else {
 header("Location: Login.php");
}

?>