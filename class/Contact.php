<?php

class Contact
{
    public $id;
    public $name;
    public $surname;
    public $email;
    public $phone;
    public $note;

    public function __construct($name, $surname, $email, $phone, $note)
    {

        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->phone = $phone;
        $this->note = $note;

    }
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getSurname()
    {
        return $this->surname;
    }
    public function getEmail()
    {
        return $this->email;

    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getNote()
    {
        return $this->note;
    }

}