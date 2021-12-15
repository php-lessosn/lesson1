<?php
require_once "login.php";

if (!$_GET["token"]) {
    echo "Hello guest";
} else {
    echo "Hello: " . $user["name"];
}

