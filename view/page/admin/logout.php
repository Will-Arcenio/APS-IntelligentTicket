<?php
session_start();

unset($_SESSION['painel-logged']);
header('Location: login.php');