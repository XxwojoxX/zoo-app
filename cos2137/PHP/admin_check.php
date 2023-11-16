<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once "connect.php";

mysqli_report(MYSQLI_REPORT_STRICT);

if (isset($_SESSION['userId']) && $_SESSION['userId'] == 1) {
    header("Location: ../admin/admin_panel.php");
} else {
    header("Location: ../index.php");
}
?>