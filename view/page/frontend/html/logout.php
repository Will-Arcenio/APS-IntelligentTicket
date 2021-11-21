<?php
session_start();

unset($_SESSION['logged_front']);
unset($_SESSION['carrinho']);
header('Location: login.php');