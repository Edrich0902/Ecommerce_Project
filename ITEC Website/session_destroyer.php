<?php
/**
 * This class is only to be used for ending the session of a user.
 */
session_start();
unset($_SESSION["username"]);
unset($_SESSION["welcome"]);
session_destroy();
header("Location: index.php");