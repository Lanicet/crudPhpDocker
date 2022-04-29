<?php

class Addresse
{
    private $table = "addresse";
    private $conn;
    private $number;
    private $street;
    private $city;
    private $country;
    private $zip;
    private $contact_id;

    public function __construct($conn)
    {

        $this->conn = $conn;
    }
    public function getNumber(): string
    {
        return $this->number;
    }
    public function getStreet(): string
    {
        return $this->street;
    }
    public function getCity(): string
    {
        return $this->city;
    }
    public function getCountry(): string
    {
        return $this->country;
    }
    public function getZip(): int
    {
        return $this->zip;
    }
    public function getContactId(): int
    {
        return $this->contact_id;
    }
    public function setNumber($number): void
    {
        $this->number = $number;
    }
    public function setStreet($street): void
    {
        $this->street = $street;
    }
    public function setCity($city): void
    {
        $this->city = $city;
    }
    public function setCountry($country): void
    {
        $this->country = $country;
    }


    public function setZip($zip): void
    {
        $this->zip = $zip;
    }
    public function setContactId($contact_id)
    {
        $this->contact_id = $contact_id;
    }
    public function getAddresse()
    {
        return $this->number . " " . $this->street . " " . $this->city . " " . $this->country . " " . $this->zip;
    }


    public function createAddresse(): bool
    {
        $sql = "INSERT INTO " . $this->table . " (number, street, city, country, zip, contact_id) VALUES (:number, :street, :city, :country, :zip, :contact_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":number", $this->number);
        $stmt->bindParam(":street", $this->street);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":country", $this->country);
        $stmt->bindParam(":zip", $this->zip);
        $stmt->bindParam(":contact_id", $this->contact_id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function updateAddresse(): bool
    {
        $sql = "UPDATE " . $this->table . " SET number = :number, street = :street, city = :city, country = :country, zip = :zip WHERE contact_id = :contact_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":number", $this->number);
        $stmt->bindParam(":street", $this->street);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":country", $this->country);
        $stmt->bindParam(":zip", $this->zip);
        $stmt->bindParam(":contact_id", $this->contact_id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function deleteAddresse(int $id): bool
    {
        $sql = "DELETE FROM " . $this->table . " WHERE contact_id = :contact_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":contact_id", $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getAddresseById(): array
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
