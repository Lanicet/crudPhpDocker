<?php

class Contact
{
    private $table = "contact";
    private $conn;
    private $firstName;
    private $lastName;
    private $email;
    private $phone;
    private $birthday;

    public function __construct($conn)
    {

        $this->conn = $conn;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    public function setBirthday($birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getContact(): string
    {
        return $this->firstName . " " . $this->lastName . " " . $this->email . " " . $this->phone . " " . $this->birthday;
    }

    public function createContact(): ?int
    {

        $db = $this->conn;
        $query = "INSERT INTO " . $this->table . " (firstName, lastName, email, phone, birthday) VALUES (:firstName, :lastName, :email, :phone, :birthday)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":firstName", $this->firstName);
        $stmt->bindParam(":lastName", $this->lastName);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":birthday", $this->birthday);


        if ($stmt->execute()) {

            return intval($db->lastInsertId());
        }
        return false;
    }

    public function readAllContacts(): array
    {

        $db = $this->conn;
        $query = "SELECT c.id, c.firstName, c.lastName, c.email, c.phone,
        c.birthday, a.number, a.street, a.city, a.country, a.zip, a.contact_id
        FROM " . $this->table . " as c JOIN addresse as a ON c.id = a.contact_id";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function readSingleContact(int $id): array
    {

        $db = $this->conn;
        $query = "SELECT * FROM " . $this->table . " as c JOIN addresse as a ON c.id = a.contact_id WHERE c.id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateContact(int $id): bool
    {

        $db = $this->conn;
        $query = "UPDATE " . $this->table . " SET firstName = :firstName, lastName = :lastName, email = :email, phone = :phone, birthday = :birthday WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":firstName", $this->firstName);
        $stmt->bindParam(":lastName", $this->lastName);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone", $this->phone);
        $stmt->bindParam(":birthday", $this->birthday);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deleteContact(int $id): bool
    {

        $db = $this->conn;
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
