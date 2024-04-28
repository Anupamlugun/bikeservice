<?php
session_start();
unset($_SESSION["mechanic_id"]);
header("location: index.php");