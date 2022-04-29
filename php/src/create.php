<?php

$pageTitle = "New contact";
require_once("./helpers/func.php");
require_once("./config/Database.php");
require_once("./class/Contact.php");
require_once("./class/Addresse.php");
$database = new Database();
$conn = $database->getConnection();
$firstNameErr = $lastNameErr = $emailErr = $phoneErr = $birthdayErr = $numberErr = $streetErr = $cityErr = $zipErr = $countryErr = "";
$firstName = $lastName = $email = $phone = $birthday = $number = $street = $city = $zip = $country = "";
if (isset($_GET['id'])) {
    $editId = checkInput($_GET['id']);
}
if (isset($editId)) {
    $pageTitle = "Edit contact";
    $contact = new Contact($conn);
    $edit = $contact->readSingleContact(intval($editId));
    foreach ($edit as $row) {
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $email = $row['email'];
        $phone = $row['phone'];
        $birthday = $row['birthday'];
        $number = $row['number'];
        $street = $row['street'];
        $city = $row['city'];
        $zip = $row['zip'];
        $country = $row['country'];
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["firstName"])) {
        $firstNameErr = "First name is required";
    } else {
        $firstName = checkInput($_POST["firstName"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/", $firstName)) {
            $firstNameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["lastName"])) {
        $lastNameErr = "Last name is required";
    } else {
        $lastName = checkInput($_POST["lastName"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/", $lastName)) {
            $lastNameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = checkInput($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["phone"])) {

        $phoneErr = "Phone is required";
    } else {

        $phone = checkInput($_POST["phone"]);
        if (!preg_match("/\d[0-9]{10,13}/", $phone)) {
            $phoneErr = "Only numbers between 10 and 13 allowed";
        }
    }

    if (empty($_POST["birthday"])) {

        $birthdayErr = "Birthday is required";
    } else {

        $birthday = checkInput($_POST["birthday"]);
        if (!preg_match("/\d[0-9]{0,2}.\d[0-9].\d[0-9]{0,5}/", $birthday)) {
            $birthdayErr = "Invalid birthday format";
        }
    }

    if (empty($_POST["number"])) {

        $numberErr = "number is required";
    } else {

        $number = checkInput($_POST["number"]);
        if (!preg_match("/\d[0-9]{1,700}/", $number)) {
            $numberErr = "Only numbers between 1 and 700 allowed";
        }
    }

    if (empty($_POST["street"])) {

        $streetErr = "Street is required";
    } else {

        $street = checkInput($_POST["street"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $street)) {
            $streetErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["city"])) {

        $cityErr = "City is required";
    } else {
        $city = checkInput($_POST["city"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $city)) {
            $cityErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["zip"])) {

        $zipErr = "Zip is required";
    } else {

        $zip = checkInput($_POST["zip"]);
        if (!preg_match("/^\d{5}$/", $zip)) {
            $zipErr = "Invalid zip";
        }
    }

    if (empty($_POST["country"])) {

        $countryErr = "Country is required";
    } else {

        $country = checkInput($_POST["country"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $country)) {
            $countryErr = "Only letters and white space allowed";
        }
    }

    if (empty($firstNameErr) && empty($lastNameErr) && empty($emailErr) && empty($phoneErr) && empty($birthdayErr) && empty($numberErr) && empty($streetErr) && empty($cityErr) && empty($zipErr) && empty($countryErr)) {
        $contact = new Contact($conn);
        $contact->setFirstName($firstName);
        $contact->setLastName($lastName);
        $contact->setEmail($email);
        $contact->setPhone($phone);
        $contact->setBirthday($birthday);

        $addresse = new Addresse($conn);
        $addresse->setNumber($number);
        $addresse->setStreet($street);
        $addresse->setCity($city);
        $addresse->setZip($zip);
        $addresse->setCountry($country);


        if (isset($editId)) {
            $contactUpdated = $contact->updateContact($editId);

            $addresse->setContactId($editId);
            $addresseUpdated =  $addresse->updateAddresse();
            
        } else {
            $id = $contact->createContact();
            $addresse->setContactId($id);
            $addresse->createAddresse();
        }
        header("Location: index.php");
    } else {
        $pageTitle = "Error";
    }
}



require('./templates/addressBook/create.html.php');
$pageContent = ob_get_clean();
require('./templates/layout.html.php');
