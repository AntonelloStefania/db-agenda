<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_agenda";

$connection = new mysqli($servername, $username, $password, $dbname);
//verifica connessione
if ($connection->connect_error) {
    die("Connessione fallita:" . $connection->connect_error);
}



$sql = "CREATE TABLE IF NOT EXISTS obligation (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
        description TEXT,
        start DATE,
        end DATE
    )";

$sql_contact = "CREATE TABLE IF NOT EXISTS contact(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        surname VARCHAR(30),
        note TEXT(300),
        mail VARCHAR(36),
        phone INT 

    )";
// esegui la query 
$connection->query($sql);
$connection->query($sql_contact);

// $sql_insert_obligation = "INSERT INTO obligation (name) VALUES ('Impegno di prova')";
// if ($connection->query($sql_insert_obligation) === TRUE) {
//     echo "dato inserito correttamente";

// } else {
//     echo "errore nell'inserimento" . $connection->error;
// }

// $sql_insert_contact = "INSERT INTO contact (name) VALUES ('Gianmai')";
// $connection->query($sql_insert_contact);
