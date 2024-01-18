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
}

?>