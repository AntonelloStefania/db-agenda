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
}