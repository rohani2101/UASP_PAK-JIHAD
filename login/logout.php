<?php
session_start();
session_destroy();
header("Location:registrasi.php");
exit();
?>
