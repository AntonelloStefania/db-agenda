<?php

class ContactDAO
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM contact
                ORDER BY name
        ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        $contacts = [];
        while ($contact = $result->fetch_assoc()) {
            $contacts[] = $contact;
        }
        $stmt->close();
        return $contacts;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM contact
                WHERE id = ?
            ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $contact = $result->fetch_assoc();
        $stmt->close();
        return $contact;
    }

    public function create(Contact $contact)
    {
        $name = $contact->getName();
        $surname = $contact->getSurname();
        $email = $contact->getEmail();
        $phone = $contact->getPhone();
        $note = $contact->getNote();

        $sql = "INSERT INTO contact (name, surname, mail, phone, note) VALUES (?,?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("sssis", $name, $surname, $email, $phone, $note);
        $stmt->execute();
        $stmt->close();

    }
}