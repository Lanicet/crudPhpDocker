<?php
$pageTitle = "Startseite";
require_once("./config/Database.php");
require_once("./class/Contact.php");
$database = new Database();
$conn = $database->getConnection();
$contacts = new Contact($conn);
$contacts=$contacts->readAllContacts();

     if (isset($_SESSION['message'])) : ?>

        <div class="alert alert-<?php echo $_SESSION['message']['type']; ?>" role="alert">
            <?php echo $_SESSION['message']['msg']; ?>
        </div>


    <?php endif; 
require_once('./templates/addressBook/index.html.php');
$pageContent = ob_get_clean();
require_once('./templates/layout.html.php');
