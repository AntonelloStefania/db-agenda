<?php
class ContactController
{

    private $contactDao;

    public function __construct(ContactDao $contactDao)
    {
        $this->contactDao = $contactDao;
    }
    public function index()
    {
        $contacts = $this->contactDao->getAll();
        return $contacts;
    }
    public function getById($id)
    {
        return $this->contactDao->getById($id);
    }
    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $note = $_POST["note"];

            $contact = new Contact($name, $surname, $email, $phone, $note);
            $this->contactDao->create($contact);
            header("Location: contact_book.php");
            exit();


        }

    }
}

?>