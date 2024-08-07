<?php

require_once(__DIR__ . "/../middlewares/session_start.php");
session_destroy();
header("Location: /");

?>