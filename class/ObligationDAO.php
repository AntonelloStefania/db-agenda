<?php

class ObligationDAO
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function getAll()
    {
        $sql = "SELECT *,YEAR(start) AS year, MONTH(start) AS month, DAY(start) AS day FROM obligation              
                ORDER BY day
            ";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result();

        $obligations = [];
        while ($obligation = $result->fetch_assoc()) {
            $obligations[] = $obligation;
        }

        // Chiudi solo il result set, non la connessione o lo statement
        $stmt->close();

        return $obligations;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM obligation
                WHERE id = ?
            ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $obligation = $result->fetch_assoc();
        $stmt->close();
        return $obligation;
    }

    public function create(Obligation $obligation)
    {
        $name = $obligation->getName();
        $description = $obligation->getDescription();
        $start = $obligation->getStart();
        $end = $obligation->getEnd();

        $sql = "INSERT INTO obligation (name, description, start, end) VALUES (?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssss", $name, $description, $start, $end);
        $stmt->execute();
        $stmt->close();



    }

    public function update(Obligation $obligation, $id)
    {
        $name = $obligation->getName();
        $description = $obligation->getDescription();
        $start = $obligation->getStart();
        $end = $obligation->getEnd();

        $sql = "UPDATE obligation
                SET name=?,
                    description=?,
                    start=?,
                    end=?
                WHERE id= $id
            ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("ssss", $name, $description, $start, $end);
        $stmt->execute();
        $stmt->close();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM obligation
            WHERE id= ?
        ";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
