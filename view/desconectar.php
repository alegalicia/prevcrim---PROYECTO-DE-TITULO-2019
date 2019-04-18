<?php
session_start();
if ($_SESSION['login']) {
    session_destroy();
    echo "<meta http-equiv='refresh' content='0;url=../index.html'>";
} else {
   echo "<meta http-equiv='refresh' content='0;url=../index.html'>";
}

?>