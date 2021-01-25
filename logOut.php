

<?php
/**Thi Hoai An Le 000798006
December 10 2020
This file when user log out */
session_start();
session_unset();
session_destroy();
include 'index.html';
?>