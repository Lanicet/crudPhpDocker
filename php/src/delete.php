<?php
    require_once("./helpers/func.php");
    require_once("./config/Database.php");
    require_once("./class/Contact.php");
    require_once("./class/Addresse.php");
    $database = new Database();
    $conn = $database->getConnection();
    $contacts = new Contact($conn);
    $addresse = new Addresse($conn);
    $id = checkInput($_GET['id']);
    $deleteContact=$contacts->deleteContact($id);
    $deleteAdresse=$addresse->deleteAddresse($id);
    header("Location: index.php");
?>