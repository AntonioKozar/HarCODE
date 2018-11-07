<?php

session_start();
$proizvod = $_SESSION['proizvod'];
print(json_encode($proizvod));

?>