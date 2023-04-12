<?php
session_start();
session_reset();
session_destroy();

header("location:register2.php");
exit;
?>